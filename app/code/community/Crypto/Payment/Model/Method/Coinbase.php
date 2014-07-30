<?php
/**
 * @author Daniel Kenney <admin@danielkenney.codes>
 * Implementation of Coinbase API for Bitcoin
 */
class Crypto_Payment_Model_Method_Coinbase extends Mage_Payment_Model_Method_Abstract
{
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
	private $_apiKey;
	private $_apiSecret;
	private $_callbackSecret;
	private $_successUrl;

	/**
	 * Button object
	 */
	protected $_button;

	/**
	 * Api link
	 */
	private $_apiLink;

	public function __construct() {
		$this->_apiKey = Mage::getStoreConfig('payment/coinbase/api_key', Mage::app()->getStore()->getId());
		$this->_apiSecret = Mage::getStoreConfig('payment/coinbase/api_secret', Mage::app()->getStore()->getId());

		if (is_null($this->_apiKey) || is_null($this->_apiSecret)) {
			Mage::throwException(Mage::helper('cryptopayment')->__('A valid Coinbase API Key and Secret must be provided in order to use this method.'));
		}

		$this->_apiLink = Coinbase_Coinbase::withApiKey($this->_apiKey, $this->_apiSecret);
		$this->_callbackSecret = Mage::getStoreConfig('payment/coinbase/callback_secret', Mage::app()->getStore()->getId());
		$this->_successUrl = Mage::getStoreConfig('payment/coinbase/custom_success_url', Mage::app()->getStore()->getId());
		$this->_cancelUrl = Mage::getStoreConfig('payment/coinbase/custom_cancel_url', Mage::app()->getStore()->getId());

		if($this->_callbackSecret == "generate") {
			$this->_callbackSecret = md5('secret_' . mt_rand());
			Mage::getModel('core/config')->saveConfig('payment/coinbase/callback_secret', $this->_callbackSecret, 'stores', Mage::app()->getStore()->getId())->cleanCache();
			Mage::app()->getStore()->resetConfig();
		}

		if (is_null($this->_successUrl)) {
			$this->_successUrl = Mage::getUrl('crypto_payment') . 'redirect/success';
		}

		if (is_null($this->_cancelUrl)) {
			$this->_cancelUrl = Mage::getUrl('crypto_payment') . 'redirect/cancel';
		}
	}

	public function createButton() {
		$amount = Mage::getSingleton('checkout/cart')->getQuote()->getGrandTotal();
		$reservedId = Mage::getSingleton('checkout/session')->getQuote()->getReservedOrderId();
		$name = Mage::app()->getStore()->getName() . " - Order #" . $reservedId;
		$currency = Mage::app()->getStore()->getCurrentCurrencyCode();
		$custom = $reservedId;
		$params = array(
			'description' => Mage::app()->getStore()->getName() . " - Order #" . $reservedId,
			'callback_url' => Mage::getUrl('crypto/ipn/index', array('secret' => $this->_callbackSecret)),
			'success_url' => $this->_successUrl,
			'cancel_url' => $this->_cancelUrl,
			'info_url' => Mage::app()->getStore()->getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK)
		);

		try {
			$this->_button = $this->_apiLink->createButton($name, $amount, $currency, $custom, $params);
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