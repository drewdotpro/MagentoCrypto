<?php

require_once((Mage::getModuleDir('controllers', 'Mage_Checkout')) . DS . 'CartController.php');

class Crypto_Checkout_CartController extends Mage_Checkout_CartController
{
    /**
     * Shopping cart display action
     */
    public function indexAction()
    {
        parent::indexAction();
        $cart = $this->_getCart();

        /**
         * Clear any possibly set notices about minimum order value, and re-adjust per increased precision
         */
        $cart->getCheckoutSession()->getMessages(true);
        if ($cart->getQuote()->getItemsCount()) {
            $cart->init();
            $cart->save();

            if (!$this->_getQuote()->validateMinimumAmount()) {
                $minimumAmount = Mage::app()->getLocale()->currency(Mage::app()->getStore()->getCurrentCurrencyCode())
                    ->toCurrency(Mage::getStoreConfig('sales/minimum_order/amount'), array('precision' => 8));

                $warning = Mage::getStoreConfig('sales/minimum_order/description')
                    ? Mage::getStoreConfig('sales/minimum_order/description')
                    : Mage::helper('checkout')->__('Minimum order amount is %s', $minimumAmount);

                $cart->getCheckoutSession()->addNotice($warning);
            }
        }
    }
}
