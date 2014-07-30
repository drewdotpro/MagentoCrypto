<?php
/**
 * Need to provide greater decimal precision to cover most cryptocurrencies
 */

class Crypto_Adminhtml_Block_Catalog_Product_Helper_Form_Price extends Mage_Adminhtml_Block_Catalog_Product_Helper_Form_Price
{
    public function getEscapedValue($index=null)
    {
        $value = $this->getValue();

        if (!is_numeric($value)) {
            return null;
        }

        /**
         * TODO: Provide for a configurable amount of decimal places,
         * and perhaps set the precision a tad higher to allow for many possible currencies
         */
        return number_format($value, 8, null, '');
    }

}

