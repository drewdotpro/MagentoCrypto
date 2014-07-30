<?php
/**
 * Increase precision
 *
 * @author      Daniel Kenney <admin@danielkenney.codes>
 */

class Crypto_Adminhtml_Block_Tax_Rate_Grid_Renderer_Data extends Mage_Adminhtml_Block_Tax_Rate_Grid_Renderer_Data
{
    protected function _getValue (Varien_Object $row)
    {
        $data = parent::_getValue($row);
        if (intval($data) == $data) {
            return (string) number_format($data, 8);
        }
        if (!is_null($data)) {
            return $data * 1;
        }
        return $this->getColumn()->getDefault();
    }
}
