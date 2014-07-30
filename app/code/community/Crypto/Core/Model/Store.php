<?php
/**
 * Increase Precision
 *
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Crypto_Core_Model_Store extends Mage_Core_Model_Store
{
    /**
     * Round price
     *
     * @param mixed $price
     * @return double
     */
    public function roundPrice($price)
    {
        return round($price, 8);
    }

    /**
     * Get store price filter
     *
     * @return Varien_Filter_Sprintf
     */
    public function getPriceFilter()
    {
        if (!$this->_priceFilter) {
            if ($this->getBaseCurrency() && $this->getCurrentCurrency()) {
                $this->_priceFilter = $this->getCurrentCurrency()->getFilter();
                $this->_priceFilter->setRate($this->getBaseCurrency()->getRate($this->getCurrentCurrency()));
            }
            } elseif ($this->getDefaultCurrency()) {
                $this->_priceFilter = $this->getDefaultCurrency()->getFilter();
            } else {
                $this->_priceFilter = new Varien_Filter_Sprintf('%s', 8);
            }
        return $this->_priceFilter;
    }
}
