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
 * @package     Mage_Catalog
 * @copyright   Copyright (c) 2014 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Algorithm for layer price filter
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Crypto_Catalog_Model_Layer_Filter_Price_Algorithm extends Mage_Catalog_Model_Layer_Filter_Price_Algorithm
{
    /**
     * Find max rounding factor with given price range
     *
     * @param float $lowerPrice
     * @param float $upperPrice
     * @param bool $returnEmpty whether empty result is acceptable
     * @param null|float $roundingFactor if given, checks for range to contain the factor
     * @return false|array
     */
    protected function _findRoundPrice($lowerPrice, $upperPrice, $returnEmpty = true, $roundingFactor = null)
    {
        $lowerPrice = round($lowerPrice, 8);
        $upperPrice = round($upperPrice, 8);

        if (!is_null($roundingFactor)) {
            // Can't separate if prices are equal
            if ($lowerPrice >= $upperPrice) {
                if ($lowerPrice > $upperPrice || $returnEmpty) {
                    return false;
                }
            }
            // round is used for such examples: (1194.32 / 0.02) or (5 / 100000)
            $lowerDivision = ceil(round($lowerPrice / $roundingFactor, self::TEN_POWER_ROUNDING_FACTOR + 8));
            $upperDivision = floor(round($upperPrice / $roundingFactor, self::TEN_POWER_ROUNDING_FACTOR + 8));

            $result = array();
            if ($upperDivision <= 0 || $upperDivision - $lowerDivision > 10) {
                return $result;
            }

            for ($i = $lowerDivision; $i <= $upperDivision; ++$i) {
                $result[] = round($i * $roundingFactor, 8);
            }

            return $result;
        }

        $result = array();
        $tenPower = pow(10, self::TEN_POWER_ROUNDING_FACTOR);
        $roundingFactorCoefficients = array(10, 5, 2);
        while ($tenPower >= Mage_Catalog_Model_Resource_Layer_Filter_Price::MIN_POSSIBLE_PRICE) {
            if ($tenPower == Mage_Catalog_Model_Resource_Layer_Filter_Price::MIN_POSSIBLE_PRICE) {
                $roundingFactorCoefficients[] = 1;
            }
            foreach ($roundingFactorCoefficients as $roundingFactorCoefficient) {
                $roundingFactorCoefficient *= $tenPower;
                $roundPrices = $this->_findRoundPrice(
                    $lowerPrice, $upperPrice, $returnEmpty, $roundingFactorCoefficient
                );
                if ($roundPrices) {
                    $index = round($roundingFactorCoefficient
                        / Mage_Catalog_Model_Resource_Layer_Filter_Price::MIN_POSSIBLE_PRICE);
                    $result[$index] = $roundPrices;
                }
            }
            $tenPower /= 10;
        }

        return empty($result) ? array(1 => array()) : $result;
    }
}
