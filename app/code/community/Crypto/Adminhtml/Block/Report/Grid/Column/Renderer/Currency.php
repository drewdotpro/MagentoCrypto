<?php
/**
 * Increase precision of pricing
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */

class Crypto_Adminhtml_Block_Report_Grid_Column_Renderer_Currency extends Mage_Adminhtml_Block_Report_Grid_Column_Renderer_Currency
{
    /**
     * Renders grid column
     *
     * @param   Varien_Object $row
     * @return  string
     */
    public function render(Varien_Object $row)
    {
        $data = $row->getData($this->getColumn()->getIndex());
        $currency_code = $this->_getCurrencyCode($row);

        if (!$currency_code) {
            return $data;
        }

        $data = floatval($data) * $this->_getRate($row);
        $data = sprintf("%f", $data);

        /**
         * TODO: Make precision configurable
         */
        $data = Mage::app()->getLocale()->currency($currency_code)->toCurrency($data, array('precision' => 8));
        return $data;
    }
}
