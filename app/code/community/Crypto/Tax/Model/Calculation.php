<?php

/**
 * Increase precision of truncate method
 *
 * @author Daniel Kenney <admin@danielkenney.codes>
 */
class Crypto_Tax_Model_Calculation extends Mage_Tax_Model_Calculation
{
    /**
     * Truncate number to specified precision
     *
     * @param   float $price
     * @param   int $precision
     * @return  float
     */
    public function truncate($price, $precision = 8)
    {
        $exp = pow(10, $precision);
        $price = floor($price * $exp) / $exp;
        return $price;
    }
}
