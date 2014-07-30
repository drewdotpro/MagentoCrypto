<?php

class Crypto_Payment_Model_Api_Abstract extends Varien_Object
{
	protected $_apiUrl;

	public function _construct()
	{
	}

	public function request($path, $type = 'GET', $params = array())
	{
	}

}