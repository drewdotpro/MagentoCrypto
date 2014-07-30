<?php

class Crypto_Directory_Model_Currency extends Mage_Directory_Model_Currency {
	/**
     * Format price to currency format
     *
     * @param float $price
     * @param array $options
     * @param bool $includeContainer
     * @param bool $addBrackets
     * @return string
     */
    public function format($price, $options = array(), $includeContainer = true, $addBrackets = false)
    {
    	/**
    	 * TODO: Make precision configurable
    	 */
        return $this->formatPrecision($price, 8, $options, $includeContainer, $addBrackets);
    }
}