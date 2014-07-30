<?php
/**
 * Increase precision
 *
 * @author     Daniel Kenney <admin@danielkenney.codes>
 */

class Crypto_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Option extends Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Options_Option
{
    public function getPriceValue($value, $type)
    {
        if ($type == 'percent') {
            return number_format($value, 8, null, '');
        } elseif ($type == 'fixed') {
            return number_format($value, 8, null, '');
        }
    }
}
