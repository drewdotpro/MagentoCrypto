<?php

class Crypto_CoinbaseController extends Mage_Core_Controller_Front_Action
{
	public function callbackAction() {
		$secretKey = $this->getRequest()->getParam('secret');
		$correctSecret = Mage::getStoreConfig('payment/coinbase/callback_secret');

		$apiKey = Mage::getStoreConfig('payment/coinbase/api_key');
		$apiSecret = Mage::getStoreConfig('payment/coinbase/api_secret');
		$coinbase = Coinbase_Coinbase::withApiKey($apiKey, $apiSecret);

		$orderInfo = $this->getRequest()->getParam('order');
		$cbOrderId = $orderInfo['id'];
		$cbOrderData = $coinbase->getOrder($cbOrderId);

		if (!$cbOrderData) {
			Mage::log("Coinbase: incorrect callback with incorrect Coinbase order ID $cbOrderId.");
			header("HTTP/1.1 500 Internal Server Error");
			return;
		}

		$orderId = $cbOrderData->custom;
		$order = Mage::getModel('sales/order')->load($orderId);

		if(!$order) {
			Mage::log("Coinbase: incorrect callback with incorrect order ID $orderId.");
			header("HTTP/1.1 500 Internal Server Error");
			return;
		}

		if($secret !== $correctSecret) {
			Mage::log("Coinbase: incorrect callback with incorrect secret parameter $secret.");
			header("HTTP/1.1 500 Internal Server Error");
			return;
		}

		$payment = $order->getPayment();
		$payment->setTransactionId($cbOrderId)
				->setPreparedMessage("Paid with Coinbase (Bitcoin) - Order #" . $cbOrderId)
				->setShouldCloseParentTransaction(true)
				->setIsTransactionClosed(0);

		if ($cbOrderData->status == "completed") {
			Mage::log($cbOrderData);
			$payment->registerCaptureNotification($cbOrderData->total_native->cents / 100);
		} else {
			$cancelReason = $this->getRequest()->getParam('cancellation_reason');
			$order->registerCancellation("Coinbase Order " . $cbOrderId . " cancelled: " . $cancelReason);
		}

		Mage::dispatchEvent('coinbase_callback_received', array('params' => $this->getRequest()->getParams(), 'order' => $order));
    	$order->save();
	}
}