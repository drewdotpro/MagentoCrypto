<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Bundle
 * @copyright   Copyright (c) 2014 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/**
 * Bundle products Price indexer resource model
 *
 * @category    Mage
 * @package     Mage_Bundle
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Crypto_Bundle_Model_Resource_Indexer_Price extends Mage_Bundle_Model_Resource_Indexer_Price
{
    /**
     * Prepare temporary price index data for bundle products by price type
     *
     * @param int $priceType
     * @param int|array $entityIds the entity ids limitatation
     * @return Mage_Bundle_Model_Resource_Indexer_Price
     */
    protected function _prepareBundlePriceByType($priceType, $entityIds = null)
    {
        $write = $this->_getWriteAdapter();
        $table = $this->_getBundlePriceTable();

        $select = $write->select()
            ->from(array('e' => $this->getTable('catalog/product')), array('entity_id'))
            ->join(
                array('cg' => $this->getTable('customer/customer_group')),
                '',
                array('customer_group_id')
            );
        $this->_addWebsiteJoinToSelect($select, true);
        $this->_addProductWebsiteJoinToSelect($select, 'cw.website_id', 'e.entity_id');
        $select->columns('website_id', 'cw')
            ->join(
                array('cwd' => $this->_getWebsiteDateTable()),
                'cw.website_id = cwd.website_id',
                array()
            )
            ->joinLeft(
                array('tp' => $this->_getTierPriceIndexTable()),
                'tp.entity_id = e.entity_id AND tp.website_id = cw.website_id'
                    . ' AND tp.customer_group_id = cg.customer_group_id',
                array()
            )
            ->joinLeft(
                array('gp' => $this->_getGroupPriceIndexTable()),
                'gp.entity_id = e.entity_id AND gp.website_id = cw.website_id'
                    . ' AND gp.customer_group_id = cg.customer_group_id',
                array()
            )
            ->where('e.type_id=?', $this->getTypeId());

        // add enable products limitation
        $statusCond = $write->quoteInto('=?', Mage_Catalog_Model_Product_Status::STATUS_ENABLED);
        $this->_addAttributeToSelect($select, 'status', 'e.entity_id', 'cs.store_id', $statusCond, true);
        if (Mage::helper('core')->isModuleEnabled('Mage_Tax')) {
            $taxClassId = $this->_addAttributeToSelect($select, 'tax_class_id', 'e.entity_id', 'cs.store_id');
        } else {
            $taxClassId = new Zend_Db_Expr('0');
        }

        if ($priceType == Mage_Bundle_Model_Product_Price::PRICE_TYPE_DYNAMIC) {
            $select->columns(array('tax_class_id' => new Zend_Db_Expr('0')));
        } else {
            $select->columns(
                array('tax_class_id' => $write->getCheckSql($taxClassId . ' IS NOT NULL', $taxClassId, 0))
            );
        }

        $priceTypeCond = $write->quoteInto('=?', $priceType);
        $this->_addAttributeToSelect($select, 'price_type', 'e.entity_id', 'cs.store_id', $priceTypeCond);

        $price          = $this->_addAttributeToSelect($select, 'price', 'e.entity_id', 'cs.store_id');
        $specialPrice   = $this->_addAttributeToSelect($select, 'special_price', 'e.entity_id', 'cs.store_id');
        $specialFrom    = $this->_addAttributeToSelect($select, 'special_from_date', 'e.entity_id', 'cs.store_id');
        $specialTo      = $this->_addAttributeToSelect($select, 'special_to_date', 'e.entity_id', 'cs.store_id');
        $curentDate     = new Zend_Db_Expr('cwd.website_date');

        $specialExpr    = $write->getCheckSql(
            $write->getCheckSql(
                $specialFrom . ' IS NULL',
                '1',
                $write->getCheckSql(
                    $specialFrom . ' <= ' . $curentDate,
                    '1',
                    '0'
                )
            ) . " > 0 AND ".
            $write->getCheckSql(
                $specialTo . ' IS NULL',
                '1',
                $write->getCheckSql(
                    $specialTo . ' >= ' . $curentDate,
                    '1',
                    '0'
                )
            )
            . " > 0 AND {$specialPrice} > 0 AND {$specialPrice} < 100 ",
            $specialPrice,
            '0'
        );

        $groupPriceExpr = $write->getCheckSql(
            'gp.price IS NOT NULL AND gp.price > 0 AND gp.price < 100',
            'gp.price',
            '0'
        );

        $tierExpr       = new Zend_Db_Expr("tp.min_price");

        if ($priceType == Mage_Bundle_Model_Product_Price::PRICE_TYPE_FIXED) {
            $finalPrice = $write->getCheckSql(
                $specialExpr . ' > 0',
                'ROUND(' . $price . ' * (' . $specialExpr . '  / 100), 8)',
                $price
            );
            $tierPrice = $write->getCheckSql(
                $tierExpr . ' IS NOT NULL',
                'ROUND(' . $price . ' - ' . '(' . $price . ' * (' . $tierExpr . ' / 100)), 8)',
                'NULL'
            );
            $groupPrice = $write->getCheckSql(
                $groupPriceExpr . ' > 0',
                'ROUND(' . $price . ' - ' . '(' . $price . ' * (' . $groupPriceExpr . ' / 100)), 8)',
                'NULL'
            );
            $finalPrice = $write->getCheckSql(
                "{$groupPrice} IS NOT NULL AND {$groupPrice} < {$finalPrice}",
                $groupPrice,
                $finalPrice
            );
        } else {
            $finalPrice     = new Zend_Db_Expr("0");
            $tierPrice      = $write->getCheckSql($tierExpr . ' IS NOT NULL', '0', 'NULL');
            $groupPrice     = $write->getCheckSql($groupPriceExpr . ' > 0', $groupPriceExpr, 'NULL');
        }

        $select->columns(array(
            'price_type'          => new Zend_Db_Expr($priceType),
            'special_price'       => $specialExpr,
            'tier_percent'        => $tierExpr,
            'orig_price'          => $write->getCheckSql($price . ' IS NULL', '0', $price),
            'price'               => $finalPrice,
            'min_price'           => $finalPrice,
            'max_price'           => $finalPrice,
            'tier_price'          => $tierPrice,
            'base_tier'           => $tierPrice,
            'group_price'         => $groupPrice,
            'base_group_price'    => $groupPrice,
            'group_price_percent' => new Zend_Db_Expr('gp.price'),
        ));

        if (!is_null($entityIds)) {
            $select->where('e.entity_id IN(?)', $entityIds);
        }

        /**
         * Add additional external limitation
         */
        Mage::dispatchEvent('catalog_product_prepare_index_select', array(
            'select'        => $select,
            'entity_field'  => new Zend_Db_Expr('e.entity_id'),
            'website_field' => new Zend_Db_Expr('cw.website_id'),
            'store_field'   => new Zend_Db_Expr('cs.store_id')
        ));

        $query = $select->insertFromSelect($table);
        $write->query($query);

        return $this;
    }

    /**
     * Calculate bundle product selections price by product type
     *
     * @param int $priceType
     * @return Mage_Bundle_Model_Resource_Indexer_Price
     */
    protected function _calculateBundleSelectionPrice($priceType)
    {
        $write = $this->_getWriteAdapter();

        if ($priceType == Mage_Bundle_Model_Product_Price::PRICE_TYPE_FIXED) {

            $selectionPriceValue = $write->getCheckSql(
                'bsp.selection_price_value IS NULL',
                'bs.selection_price_value',
                'bsp.selection_price_value'
            );
            $selectionPriceType = $write->getCheckSql(
                'bsp.selection_price_type IS NULL',
                'bs.selection_price_type',
                'bsp.selection_price_type'
            );
            $priceExpr = new Zend_Db_Expr(
                $write->getCheckSql(
                    $selectionPriceType . ' = 1',
                    'ROUND(i.price * (' . $selectionPriceValue . ' / 100),8)',
                    $write->getCheckSql(
                        'i.special_price > 0 AND i.special_price < 100',
                        'ROUND(' . $selectionPriceValue . ' * (i.special_price / 100),8)',
                        $selectionPriceValue
                    )
                ) . '* bs.selection_qty'
            );

            $tierExpr = $write->getCheckSql(
                'i.base_tier IS NOT NULL',
                $write->getCheckSql(
                    $selectionPriceType .' = 1',
                    'ROUND(i.base_tier - (i.base_tier * (' . $selectionPriceValue . ' / 100)),8)',
                    $write->getCheckSql(
                        'i.tier_percent > 0',
                        'ROUND(' . $selectionPriceValue
                        . ' - (' . $selectionPriceValue . ' * (i.tier_percent / 100)),8)',
                        $selectionPriceValue
                    )
                ) . ' * bs.selection_qty',
                'NULL'
            );

            $groupExpr = $write->getCheckSql(
                'i.base_group_price IS NOT NULL',
                $write->getCheckSql(
                    $selectionPriceType .' = 1',
                    $priceExpr,
                    $write->getCheckSql(
                        'i.group_price_percent > 0',
                        'ROUND(' . $selectionPriceValue
                        . ' - (' . $selectionPriceValue . ' * (i.group_price_percent / 100)),8)',
                        $selectionPriceValue
                    )
                ) . ' * bs.selection_qty',
                'NULL'
            );
            $priceExpr = new Zend_Db_Expr(
                $write->getCheckSql("{$groupExpr} < {$priceExpr}", $groupExpr, $priceExpr)
            );
        } else {
            $priceExpr = new Zend_Db_Expr(
                $write->getCheckSql(
                    'i.special_price > 0 AND i.special_price < 100',
                    'ROUND(idx.min_price * (i.special_price / 100), 8)',
                    'idx.min_price'
                ) . ' * bs.selection_qty'
            );
            $tierExpr = $write->getCheckSql(
                'i.base_tier IS NOT NULL',
                'ROUND(idx.min_price * (i.base_tier / 100), 8)* bs.selection_qty',
                'NULL'
            );
            $groupExpr = $write->getCheckSql(
                'i.base_group_price IS NOT NULL',
                'ROUND(idx.min_price * (i.base_group_price / 100), 8)* bs.selection_qty',
                'NULL'
            );
            $groupPriceExpr = new Zend_Db_Expr(
                $write->getCheckSql(
                    'i.base_group_price IS NOT NULL AND i.base_group_price > 0 AND i.base_group_price < 100',
                    'ROUND(idx.min_price - idx.min_price * (i.base_group_price / 100), 8)',
                    'idx.min_price'
                ) . ' * bs.selection_qty'
            );
            $priceExpr = new Zend_Db_Expr(
                $write->getCheckSql("{$groupPriceExpr} < {$priceExpr}", $groupPriceExpr, $priceExpr)
            );
        }

        $select = $write->select()
            ->from(
                array('i' => $this->_getBundlePriceTable()),
                array('entity_id', 'customer_group_id', 'website_id')
            )
            ->join(
                array('bo' => $this->getTable('bundle/option')),
                'bo.parent_id = i.entity_id',
                array('option_id')
            )
            ->join(
                array('bs' => $this->getTable('bundle/selection')),
                'bs.option_id = bo.option_id',
                array('selection_id')
            )
            ->joinLeft(
                array('bsp' => $this->getTable('bundle/selection_price')),
                'bs.selection_id = bsp.selection_id AND bsp.website_id = i.website_id',
                array('')
            )
            ->join(
                array('idx' => $this->getIdxTable()),
                'bs.product_id = idx.entity_id AND i.customer_group_id = idx.customer_group_id'
                . ' AND i.website_id = idx.website_id',
                array()
            )
            ->join(
                array('e' => $this->getTable('catalog/product')),
                'bs.product_id = e.entity_id AND e.required_options=0',
                array()
            )
            ->where('i.price_type=?', $priceType)
            ->columns(array(
                'group_type'    => $write->getCheckSql(
                    "bo.type = 'select' OR bo.type = 'radio'",
                    '0',
                    '1'
                ),
                'is_required'   => 'bo.required',
                'price'         => $priceExpr,
                'tier_price'    => $tierExpr,
                'group_price'   => $groupExpr,
            ));

        $query = $select->insertFromSelect($this->_getBundleSelectionTable());
        $write->query($query);

        return $this;
    }
}
