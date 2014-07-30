<?php
/**
 * @author Daniel Kenney <admin@danielkenney.codes>
 * Need to provide greater decimal precision to cover most cryptocurrencies
 */
class Crypto_Adminhtml_Block_Widget_Grid_Column_Renderer_Price
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Price
{
    /**
     * Renders grid column
     *
     * @param   Varien_Object $row
     * @return  string
     */
    public function render(Varien_Object $row)
    {
        if ($data = $row->getData($this->getColumn()->getIndex())) {
            $currency_code = $this->_getCurrencyCode($row);

            if (!$currency_code) {
                return $data;
            }

            $data = floatval($data) * $this->_getRate($row);
            $data = sprintf("%f", $data);

            /**
             * TODO: Make the precision of this configurable
             */
            $data = Mage::app()->getLocale()->currency($currency_code)->toCurrency($data, array('precision' => 8));
            return $data;
        }
        return $this->getColumn()->getDefault();
    }
}
