<?php

/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */
class Crypto_XmlConnect_Block_Customer_Order_List extends Mage_XmlConnect_Block_Customer_Order_List
{
    /**
     * Render customer orders list xml
     *
     * @return string
     */
    protected function _toHtml()
    {
        /** @var $ordersXmlObj Mage_XmlConnect_Model_Simplexml_Element */
        $ordersXmlObj = Mage::getModel('xmlconnect/simplexml_element', '<orders></orders>');

        /** @var $orders Mage_Sales_Model_Resource_Order_Collection */
        $orders = Mage::getResourceModel('sales/order_collection')->addFieldToSelect('*')->addFieldToFilter(
            'customer_id', Mage::getSingleton('customer/session')->getCustomer()->getId()
        )->addFieldToFilter('state', array(
            'in' => Mage::getSingleton('sales/order_config')->getVisibleOnFrontStates()
        ))->setOrder('created_at', 'desc');

        /** @var $request Mage_Core_Controller_Request_Http */
        $request = $this->getRequest();
        /**
         * Apply offset and count
         */
        $count = abs((int)$request->getParam('count', 0));
        $count = $count ? $count : self::ORDERS_LIST_LIMIT;
        $offset = abs((int)$request->getParam('offset', 0));


        $ordersXmlObj->addAttribute('orders_count', $ordersXmlObj->escapeXml($orders->count()));
        $ordersXmlObj->addAttribute('offset', $ordersXmlObj->escapeXml($offset));

        $orders->clear()->getSelect()->limit($count, $offset);
        $orders->load();

        if ($orders->count()) {
            foreach ($orders as $order) {
                $item = $ordersXmlObj->addChild('item');
                $item->addChild('entity_id', $order->getId());
                $item->addChild('number', $order->getRealOrderId());
                $item->addChild('date', $this->formatDate($order->getCreatedAtStoreDate()));
                if ($order->getShippingAddress()) {
                    $item->addChild('ship_to', $ordersXmlObj->escapeXml($order->getShippingAddress()->getName()));
                }
                $item->addChild('total', $order->getOrderCurrency()->formatPrecision(
                    $order->getGrandTotal(), 8, array(), false, false
                ));
                $item->addChild('status', $order->getStatusLabel());
            }
        }
        return $ordersXmlObj->asNiceXml();
    }
}
