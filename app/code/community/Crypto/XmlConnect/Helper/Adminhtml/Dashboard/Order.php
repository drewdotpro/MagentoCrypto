<?php
/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */
class Crypto_XmlConnect_Helper_Adminhtml_Dashboard_Order extends Mage_XmlConnect_Helper_Adminhtml_Dashboard_Order
{
    /**
     * Prepare price to display
     *
     * @param null|string $price
     * @param null|string $storeId
     * @return string
     */
    public function preparePrice($price, $storeId)
    {
        $baseCurrencyCode = (string)Mage::app()->getStore($storeId)->getBaseCurrencyCode();
        return Mage::app()->getLocale()->currency($baseCurrencyCode)->toCurrency($price, array('precision' => 8));
    }
}
