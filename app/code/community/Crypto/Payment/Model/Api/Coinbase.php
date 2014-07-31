<?php

class Crypto_Payment_Model_Api_Coinbase extends Crypto_Payment_Model_Api_Abstract
{
	protected $_apiUrl = 'https://coinbase.com/api/v1/';
	protected $_http;

	public function getCallbackSecret()
	{
		return Mage::getStoreConfig('payment/coinbase/callback_secret', Mage::app()->getStore()->getId());
	}

	public function setCallbackSecret()
	{
		$_callbackSecret = md5('secret_' . mt_rand());
		Mage::getModel('core/config')->saveConfig('payment/coinbase/callback_secret', $_callbackSecret, 'stores', Mage::app()->getStore()->getId())->cleanCache();
		Mage::app()->getStore()->resetConfig();
	}

	public function getApiKey() {
		return Mage::getStoreConfig('payment/coinbase/api_key', Mage::app()->getStore()->getId());
	}

	public function getApiSecret() {
		return Mage::getStoreConfig('payment/coinbase/api_secret', Mage::app()->getStore()->getId());
	}

	public function getCurl()
	{
		if (!$this->_http) {
			$this->_http = new Varien_Http_Adapter_Curl();
		}

		return $this->_http;
	}

	public function _construct()
	{
		if ((!$this->getApiKey() || is_null($this->getApiKey())) ||
			(!$this->getApiSecret() || is_null($this->getApiSecret()))) {
			Mage::throwException(Mage::helper('cryptopayment')->__('A valid Coinbase API Key and Secret must be provided in order to use this method.'));
		}

		if($this->getCallbackSecret() == "generate") {
			$this->setCallbackSecret();
		}
	}

	public function request($path, $method = Zend_Http_Client::GET, $params = array())
	{
		/**
		 * Setup some values
		 */
		$queryString = http_build_query($params);
		$url = $this->_apiUrl . $path;
		$microseconds = sprintf('%0.0f',round(microtime(true) * 1000000));

		/**
		 * Figure out what way we're going to submit the data
		 */
		if (strtolower($method) == 'get') {
			if ($queryString) {
				$url = $url . "?" . $queryString;
			}
		} else if (strtolower($method) == 'delete') {
			$this->getCurl()->addOption(CURLOPT_CUSTOMREQUEST, "DELETE");
			if ($queryString) {
				$url = $url . "?" . $queryString;
			}
		} else if (strtolower($method) == 'put') {
			$this->getCurl()->addOption(CURLOPT_CUSTOMREQUEST, "PUT");
		}

		/**
		 * Create secret hash to verify transaction
		 */
		$dataToHash =  $microseconds . $url;
        if ($queryString) {
            $dataToHash .= $queryString;
        }
        $signature = hash_hmac("sha256", $dataToHash, $this->getApiSecret());

		$headers = array(
			'User-Agent: CoinbasePHP/v1',
			'ACCESS_KEY: ' . $this->getApiKey(),
			'ACCESS_SIGNATURE: ' . $signature,
			'ACCESS_NONCE: ' . $microseconds
		);

		$this->getCurl()->addOption(CURLOPT_CAINFO, Mage::getModuleDir('', 'Crypto_Payment') . DS . 'additional/coinbase/ca-coinbase.crt');

		try {
			$this->getCurl()->write($method, $url, '1.1', $headers, $queryString);
			$result = $this->getCurl()->read();

			$response = preg_split('/^\r?$/m', $result, 2);
			$response = trim($response[1]);

			return new Varien_Object(json_decode($response, true));
		} catch (Exception $e) {
			Mage::logException($e);
		}

		return false;
	}

	public function createButton($name, $price, $currency, $custom=null, $options=array())
	{
		$params = array(
            "name" => $name,
            "price_string" => $price,
            "price_currency_iso" => $currency
        );
        if($custom !== null) {
            $params['custom'] = $custom;
        }
        foreach($options as $option => $value) {
            $params[$option] = $value;
        }

        return $this->createButtonWithOptions($params);
	}

	public function createButtonWithOptions($options=array())
    {
        return $this->request("buttons", Zend_Http_Client::POST, array( "button" => $options ));
    }
}