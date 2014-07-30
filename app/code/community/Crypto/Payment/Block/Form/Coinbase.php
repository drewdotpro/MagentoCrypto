<?php

class Crypto_Payment_Block_Form_Coinbase extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('cryptopayment/form/coinbase.phtml');
    }

    public function getPaymentButton() {
    	$method = $this->getMethod();
    	$_button = $method->createButton();

    	return $_button->embedHtml;
    }

    public function getPaymentMessage() {
    	return '123';
    }
}
