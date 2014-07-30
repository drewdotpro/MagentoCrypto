<?php

class Crypto_Adminhtml_Model_System_Config_Source_Coinbase_Interfaces
{
    protected $_options;

    public function toOptionArray()
    {
        return array(
            array(
                'value' => Crypto_Payment_Model_Method_Coinbase::INTERFACE_IFRAME,
                'label' => Mage::helper('cryptoadminhtml')->__('iFrame')
            ),
            array(
                'value' => Crypto_Payment_Model_Method_Coinbase::INTERFACE_BUTTON,
                'label' => Mage::helper('cryptoadminhtml')->__('Button')
            ),
            array(
                'value' => Crypto_Payment_Model_Method_Coinbase::INTERFACE_PAGE,
                'label' => Mage::helper('cryptoadminhtml')->__('Page')
            )
        );
    }
}
