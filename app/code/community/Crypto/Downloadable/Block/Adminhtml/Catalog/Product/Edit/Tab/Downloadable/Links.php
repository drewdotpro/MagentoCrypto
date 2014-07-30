<?php

/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */
class Crypto_Downloadable_Block_Adminhtml_Catalog_Product_Edit_Tab_Downloadable_Links
    extends Mage_Downloadable_Block_Adminhtml_Catalog_Product_Edit_Tab_Downloadable_Links
{

    /**
     * Return formated price with two digits after decimal point
     *
     * @param decimal $value
     * @return decimal
     */
    public function getPriceValue($value)
    {
        return number_format($value, 8, null, '');
    }
}
