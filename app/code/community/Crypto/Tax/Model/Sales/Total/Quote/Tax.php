<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_Tax
 * @copyright   Copyright (c) 2014 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Tax totals calculation model
 */
class Crypto_Tax_Model_Sales_Total_Quote_Tax extends Mage_Tax_Model_Sales_Total_Quote_Tax
{
    /**
     * Round the total amounts in address
     *
     * @param Mage_Sales_Model_Quote_Address $address
     * @return Mage_Tax_Model_Sales_Total_Quote_Tax
     */
    protected function _roundTotals(Mage_Sales_Model_Quote_Address $address)
    {
        // initialize the delta to a small number to avoid non-deterministic behavior with rounding of 0.5
        $totalDelta = 0.00000001;
        $baseTotalDelta = 0.00000001;
        /*
         * The order of rounding is import here.
         * Tax is rounded first, to be consistent with unit based calculation.
         * Hidden tax and shipping_hidden_tax are rounded next, which are really part of tax.
         * Shipping is rounded before subtotal to minimize the chance that subtotal is
         * rounded differently because of the delta.
         * Here is an example: 19.2% tax rate, subtotal = 49.95, shipping = 9.99, discount = 20%
         * subtotalExclTax = 41.90436, tax = 7.7238, hidden_tax = 1.609128, shippingPriceExclTax = 8.38087
         * shipping_hidden_tax = 0.321826, discount = -11.988
         * The grand total is 47.952 ~= 47.95
         * The rounded values are:
         * tax = 7.72, hidden_tax = 1.61, shipping_hidden_tax = 0.32,
         * shipping = 8.39 (instead of 8.38 from simple rounding), subtotal = 41.9, discount = -11.99
         * The grand total calculated from the rounded value is 47.95
         * If we simply round each value and add them up, the result is 47.94, which is one penny off
         */
        $totalCodes = array('tax', 'hidden_tax', 'shipping_hidden_tax', 'shipping', 'subtotal', 'weee', 'discount');
        foreach ($totalCodes as $totalCode) {
            $exactAmount = $address->getTotalAmount($totalCode);
            $baseExactAmount = $address->getBaseTotalAmount($totalCode);
            if (!$exactAmount && !$baseExactAmount) {
                continue;
            }
            $roundedAmount = $this->_calculator->round($exactAmount + $totalDelta);
            $baseRoundedAmount = $this->_calculator->round($baseExactAmount + $baseTotalDelta);
            $address->setTotalAmount($totalCode, $roundedAmount);
            $address->setBaseTotalAmount($totalCode, $baseRoundedAmount);
            $totalDelta = $exactAmount + $totalDelta - $roundedAmount;
            $baseTotalDelta = $baseExactAmount + $baseTotalDelta - $baseRoundedAmount;
        }
        return $this;
    }

    /**
     * Round price based on previous rounding operation delta
     *
     * @param float $price
     * @param string $rate
     * @param bool $direction price including or excluding tax
     * @param string $type
     * @return float
     */
    protected function _deltaRound($price, $rate, $direction, $type = 'regular')
    {
        if ($price) {
            $rate = (string)$rate;
            $type = $type . $direction;
            // initialize the delta to a small number to avoid non-deterministic behavior with rounding of 0.5
            $delta = isset($this->_roundingDeltas[$type][$rate]) ? $this->_roundingDeltas[$type][$rate] : 0.00000001;
            $price += $delta;
            $this->_roundingDeltas[$type][$rate] = $price - $this->_calculator->round($price);
            $price = $this->_calculator->round($price);
        }
        return $price;
    }
}
