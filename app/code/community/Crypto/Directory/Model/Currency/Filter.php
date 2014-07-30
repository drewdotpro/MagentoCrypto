<?php
/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */
class Mage_Directory_Model_Currency_Filter implements Zend_Filter_Interface
{
    /**
     * Filter value
     *
     * @param   double $value
     * @return  string
     */
    public function filter($value)
    {
        $value = Mage::app()->getLocale()->getNumber($value);
        $value = Mage::app()->getStore()->roundPrice($this->_rate*$value);
        //$value = round($value, 2);
        $value = sprintf("%f", $value);
        return $this->_currency->toCurrency($value, array('precision' => 8));
    }
}
