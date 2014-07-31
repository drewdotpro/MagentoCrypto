<?php

class Crypto_Sales_Model_Order_Invoice extends Mage_Sales_Model_Order_Invoice
{
    /**
     * Check invoice refund action availability
     *
     * @return bool
     */
    public function canRefund()
    {
        if ($this->getState() != self::STATE_PAID) {
            return false;
        }
        if (abs($this->getBaseGrandTotal() - $this->getBaseTotalRefunded()) < .00000001) {
            return false;
        }
        return true;
    }
}
