<?php
/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */
class Crypto_XmlConnect_Helper_Customer_Order extends Mage_XmlConnect_Helper_Customer_Order
{
    /**
     * Format price using order currency
     *
     * @param Mage_Core_Block_Template $renderer Product renderer
     * @param float $price
     * @return string
     */
    public function formatPrice(Mage_Core_Block_Template $renderer, $price)
    {
        return $renderer->getOrder()->getOrderCurrency()->formatPrecision($price, 8, array(), false);
    }
}
