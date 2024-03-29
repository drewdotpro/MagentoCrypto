<?php
/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */
class Crypto_Catalog_Model_Resource_Product_Collection extends Mage_Catalog_Model_Resource_Product_Collection
{
    /**
     * Prepare statistics data
     *
     * @return Mage_Catalog_Model_Resource_Product_Collection
     */
    protected function _prepareStatisticsData()
    {
        $select = clone $this->getSelect();
        $priceExpression = $this->getPriceExpression($select) . ' ' . $this->getAdditionalPriceExpression($select);
        $sqlEndPart = ') * ' . $this->getCurrencyRate() . ', 8)';
        $select = $this->_getSelectCountSql($select, false);
        $select->columns(array(
            'max' => 'ROUND(MAX(' . $priceExpression . $sqlEndPart,
            'min' => 'ROUND(MIN(' . $priceExpression . $sqlEndPart,
            'std' => $this->getConnection()->getStandardDeviationSql('ROUND((' . $priceExpression . $sqlEndPart)
        ));
        $select->where($this->getPriceExpression($select) . ' IS NOT NULL');
        $row = $this->getConnection()->fetchRow($select, $this->_bindParams, Zend_Db::FETCH_NUM);
        $this->_pricesCount = (int)$row[0];
        $this->_maxPrice = (float)$row[1];
        $this->_minPrice = (float)$row[2];
        $this->_priceStandardDeviation = (float)$row[3];

        return $this;
    }
}
