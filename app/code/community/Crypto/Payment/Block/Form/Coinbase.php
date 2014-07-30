<?php

class Crypto_Payment_Block_Form_Coinbase extends Mage_Payment_Block_Form
{
    protected $_button;
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('cryptopayment/form/coinbase.phtml');
    }

    public function getPaymentButton() {
        $method = $this->getMethod();
        if (!$this->_button) {
            $this->_button = $method->createButton();
        }

        return $this->_button;
    }

    public function getPaymentType() {
        return Mage::getStoreConfig('payment/coinbase/interface', Mage::app()->getStore()->getId());
    }

    public function isIframe() {
        return ($this->getPaymentType() == Crypto_Payment_Model_Method_Coinbase::INTERFACE_IFRAME);
    }

    public function isButton() {
        return ($this->getPaymentType() == Crypto_Payment_Model_Method_Coinbase::INTERFACE_BUTTON);
    }

    public function isPage() {
        return ($this->getPaymentType() == Crypto_Payment_Model_Method_Coinbase::INTERFACE_PAGE);
    }

    public function getPaymentMessage() {
        return Mage::getStoreConfig('payment/coinbase/message', Mage::app()->getStore()->getId());
    }
}
