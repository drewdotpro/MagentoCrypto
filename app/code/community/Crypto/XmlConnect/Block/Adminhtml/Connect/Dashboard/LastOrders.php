<?php
/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */
class Crypto_XmlConnect_Block_Adminhtml_Connect_Dashboard_LastOrders extends Mage_XmlConnect_Block_Adminhtml_Connect_Dashboard_LastOrders
{
    /**
     * Add last orders info to xml object
     *
     * @param Mage_XmlConnect_Model_Simplexml_Element $xmlObj
     * @return Mage_XmlConnect_Block_Adminhtml_Connect_Dashboard_LastOrders
     */
    public function addLastOrdersToXmlObj(Mage_XmlConnect_Model_Simplexml_Element $xmlObj)
    {
        if (!Mage::helper('core')->isModuleEnabled('Mage_Reports')) {
            return $this;
        }

        /** @var $collection Mage_Reports_Model_Resource_Order_Collection */
        $collection = Mage::getResourceModel('reports/order_collection')->addItemCountExpr()
            ->joinCustomerName('customer')->orderByCreatedAt()->setPageSize(self::LAST_ORDER_COUNT_LIMIT);

        foreach (Mage::helper('xmlconnect/adminApplication')->getSwitcherList() as $storeId) {
            if ($storeId) {
                $collection->addAttributeToFilter('store_id', $storeId);
                $collection->addRevenueToSelect();
            } else {
                $collection->addRevenueToSelect(true);
            }

            $this->setCollection($collection);
            $orderList = $this->_prepareColumns()->getCollection()->load();
            $valuesXmlObj = $xmlObj->addCustomChild('values', null, array(
                'store_id' => $storeId ? $storeId : Mage_XmlConnect_Helper_AdminApplication::ALL_STORE_VIEWS
            ));

            foreach ($orderList as $order) {
                $itemXmlObj = $valuesXmlObj->addCustomChild('item');
                $itemXmlObj->addCustomChild('customer', $order->getCustomer(), array('label' => $this->__('Customer')));
                $itemXmlObj->addCustomChild('items_count', $order->getItemsCount(), array(
                    'label' => $this->__('Items')
                ));
                $currency_code = Mage::app()->getStore($storeId)->getBaseCurrencyCode();
                $itemXmlObj->addCustomChild('currency', Mage::app()->getLocale()->currency($currency_code)
                    ->toCurrency($order->getRevenue(), array('precision' => 8)), array('label' => $this->__('Grand Total')));
            }
            $collection->clear();
        }
        return $this;
    }
}
