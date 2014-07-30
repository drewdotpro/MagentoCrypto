<?php
/**
 * Increase pricing precision
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class  Crypto_Adminhtml_Block_Sales_Items_Abstract extends Mage_Adminhtml_Block_Sales_Items_Abstract
{
    /**
     * Retrieve price formated html content
     *
     * @param float $basePrice
     * @param float $price
     * @param bool $strong
     * @param string $separator
     * @return string
     */
    public function displayPrices($basePrice, $price, $strong = false, $separator = '<br />')
    {
        return $this->displayRoundedPrices($basePrice, $price, 8, $strong, $separator);
    }
}
