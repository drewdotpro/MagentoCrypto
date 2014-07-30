<?php
/**
 * @author Daniel Kenney <admin@danielkenney.codes>
 * Implementation of Coinbase API for Bitcoin
 */
class Crypto_Payment_Model_Method_Coinbase extends Mage_Payment_Model_Method_Abstract
{
	const INTERFACE_IFRAME = 0;
	const INTERFACE_BUTTON = 1;
	const INTERFACE_PAGE = 0;
	/**
	 * Payment method code
	 */
	protected $_code = 'coinbase';

	/**
	 * Form Details
	 */
    protected $_formBlockType = 'cryptopayment/form_coinbase';
    protected $_infoBlockType = 'cryptopayment/info_coinbase';

	/**
	 * Availability Options
	 */
	protected $_isGateway               = true;
	protected $_canAuthorize            = true;
	protected $_canCapture              = false;
	protected $_canCapturePartial       = false;
	protected $_canRefund               = false;
	protected $_canVoid                 = false;
	protected $_canUseInternal          = true;
	protected $_canUseCheckout          = true;
	protected $_canUseForMultishipping  = true;
	protected $_canSaveCc               = false;

	/**
	 * API Information
	 */
	private $_successUrl;

	/**
	 * Button object
	 */
	protected $_button;

	/**
	 * Api link
	 */
	private $_api;

	public function __construct() {
		if (is_null($this->_successUrl)) {
			$this->_successUrl = Mage::getUrl('crypto_payment') . 'redirect/success';
		}

		if (is_null($this->_cancelUrl)) {
			$this->_cancelUrl = Mage::getUrl('crypto_payment') . 'redirect/cancel';
		}
	}

	public function getApi() {
		if (!$this->_api) {
			$this->_api = Mage::getModel('cryptopayment/api_coinbase');
		}

		return $this->_api;
	}

	public function createButton() {
		$amount = Mage::getSingleton('checkout/cart')->getQuote()->getGrandTotal();
		$reservedId = Mage::getSingleton('checkout/session')->getQuote()->getReservedOrderId();
		$name = Mage::app()->getStore()->getName() . " - Order #" . $reservedId;
		$currency = Mage::app()->getStore()->getCurrentCurrencyCode();
		$custom = $reservedId;
		$params = array(
			'description' => Mage::app()->getStore()->getName() . " - Order #" . $reservedId,
			'callback_url' => Mage::getUrl('cryptopayment/coinbase/callback', array('secret' => $this->getApi()->getCallbackSecret())),
			'success_url' => $this->_successUrl,
			'cancel_url' => $this->_cancelUrl,
			'info_url' => Mage::app()->getStore()->getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK)
		);

		try {
			$this->_button = $this->getApi()->createButton($name, $amount, $currency, $custom, $params);
		} catch (Exception $e) {
			Mage::logException($e);
			Mage::throwException(Mage::helper('cryptopayment')->__('Unable to initiate Coinbase payment. Please try again later.'));
		}

		return $this->_button;
	}

	public function authorize(Varien_Object $payment, $amount) {
		$order = $payment->getOrder();
		$currency = $order->getBaseCurrencyCode();

		return $this;
	}
}