<?php
/**
 * @author Daniel Kenney <admin@danielkenney.codes>
 * Need to provide greater decimal precision to cover most cryptocurrencies
 */

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$connection = $installer->getConnection();

/**
 * We need to update all the prices for Magento to allow greater decimal precision
 */
/**
 * Catalog Tables
 */
$connection->changeColumn($this->getTable('catalog_product_entity_decimal'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_option_price'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_option_type_price'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_entity_tier_price'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_entity_group_price'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_bundle_selection_price'), 'selection_price_value', 'selection_price_value', 'DECIMAL(12,8) NULL DEFAULT NULL');


$connection->changeColumn($this->getTable('catalog_product_bundle_price_index'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_bundle_price_index'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_bundle_selection'), 'selection_price_value', 'selection_price_value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_eav_decimal'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_eav_decimal_idx'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_eav_decimal_tmp'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_group_price'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price'), 'final_price', 'final_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'special_price', 'special_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'orig_price', 'orig_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'base_tier', 'base_tier', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_idx'), 'base_group_price', 'base_group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_idx'), 'alt_price', 'alt_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_idx'), 'alt_tier_price', 'alt_tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_idx'), 'alt_group_price', 'alt_group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_tmp'), 'alt_price', 'alt_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_tmp'), 'alt_tier_price', 'alt_tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_opt_tmp'), 'alt_group_price', 'alt_group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_sel_idx'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_sel_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_sel_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_sel_tmp'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_sel_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_sel_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'special_price', 'special_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'orig_price', 'orig_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'base_tier', 'base_tier', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'base_group_price', 'base_group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_bundle_tmp'), 'group_price_percent', 'group_price_percent', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_agr_idx'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_agr_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_agr_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_agr_tmp'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_agr_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_agr_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_cfg_opt_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_downlod_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_downlod_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_downlod_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_downlod_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'orig_price', 'orig_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'base_tier', 'base_tier', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_idx'), 'base_group_price', 'base_group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'orig_price', 'orig_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'base_tier', 'base_tier', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_final_tmp'), 'base_group_price', 'base_group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_idx'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_idx'), 'final_price', 'final_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_agr_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_opt_idx'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_idx'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_idx'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_idx'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_opt_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_opt_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_price_tmp'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_tmp'), 'final_price', 'final_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_tmp'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_tmp'), 'max_price', 'max_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_tmp'), 'tier_price', 'tier_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalog_product_index_price_tmp'), 'group_price', 'group_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_index_tier_price'), 'min_price', 'min_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_link_attribute_decimal'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalog_product_super_attribute_pricing'), 'pricing_value', 'pricing_value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('customer_address_entity_decimal'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'subtotal', 'subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_subtotal', 'base_subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'subtotal_with_discount', 'subtotal_with_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_subtotal_with_discount', 'base_subtotal_with_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'shipping_amount', 'shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_shipping_amount', 'base_shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'shipping_tax_amount', 'shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_shipping_tax_amount', 'base_shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'shipping_discount_amount', 'shipping_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_shipping_discount_amount', 'base_shipping_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'subtotal_incl_tax', 'subtotal_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_subtotal_total_incl_tax', 'base_subtotal_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'shipping_hidden_tax_amount', 'shipping_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_shipping_hidden_tax_amnt', 'base_shipping_hidden_tax_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'shipping_incl_tax', 'shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address'), 'base_shipping_incl_tax', 'base_shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('shipping_tablerate'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('shipping_tablerate'), 'cost', 'cost', 'DECIMAL(12,8) NULL DEFAULT NULL');

/**
 * Sales Creditmemo Tables
 */
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'adjustment_positive', 'adjustment_positive', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_shipping_tax_amount', 'base_shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'store_to_order_rate', 'store_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_to_order_rate', 'base_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_adjustment_negative', 'base_adjustment_negative', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_subtotal_incl_tax', 'base_subtotal_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'shipping_amount', 'shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'subtotal_incl_tax', 'subtotal_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'adjustment_negative', 'adjustment_negative', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_shipping_amount', 'base_shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'store_to_base_rate', 'store_to_base_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_to_global_rate', 'base_to_global_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_adjustment', 'base_adjustment', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_subtotal', 'base_subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'subtotal', 'subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'adjustment', 'adjustment', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_adjustment_positive', 'base_adjustment_positive', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'shipping_tax_amount', 'shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'shipping_hidden_tax_amount', 'shipping_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_shipping_hidden_tax_amnt', 'base_shipping_hidden_tax_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'shipping_incl_tax', 'shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo'), 'base_shipping_incl_tax', 'base_shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_creditmemo_grid'), 'store_to_order_rate', 'store_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_grid'), 'base_to_order_rate', 'base_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_grid'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_grid'), 'store_to_base_rate', 'store_to_base_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_grid'), 'base_to_global_rate', 'base_to_global_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_grid'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_price', 'base_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_row_total', 'base_row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'row_total', 'row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'price_incl_tax', 'price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_price_incl_tax', 'base_price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_cost', 'base_cost', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_row_total_incl_tax', 'base_row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'row_total_incl_tax', 'row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'weee_tax_disposition', 'weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'weee_tax_row_disposition', 'weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_weee_tax_disposition', 'base_weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_weee_tax_row_disposition', 'base_weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_weee_tax_applied_amount', 'base_weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'base_weee_tax_applied_row_amnt', 'base_weee_tax_applied_row_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'weee_tax_applied_amount', 'weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_creditmemo_item'), 'weee_tax_applied_row_amount', 'weee_tax_applied_row_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'shipping_tax_amount', 'shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'store_to_order_rate', 'store_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_shipping_tax_amount', 'base_shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_to_order_rate', 'base_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'shipping_amount', 'shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'subtotal_incl_tax', 'subtotal_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_subtotal_incl_tax', 'base_subtotal_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'store_to_base_rate', 'store_to_base_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_shipping_amount', 'base_shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_to_global_rate', 'base_to_global_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'subtotal', 'subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_subtotal', 'base_subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'shipping_hidden_tax_amount', 'shipping_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_shipping_hidden_tax_amnt', 'base_shipping_hidden_tax_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'shipping_incl_tax', 'shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_shipping_incl_tax', 'base_shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice'), 'base_total_refunded', 'base_total_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_invoice_grid'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_grid'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_price', 'base_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_row_total', 'base_row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'row_total', 'row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'price_incl_tax', 'price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_price_incl_tax', 'base_price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_cost', 'base_cost', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_row_total_incl_tax', 'base_row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'row_total_incl_tax', 'row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_weee_tax_applied_amount', 'base_weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_weee_tax_applied_row_amnt', 'base_weee_tax_applied_row_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'weee_tax_applied_amount', 'weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'weee_tax_applied_row_amount', 'weee_tax_applied_row_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'weee_tax_disposition', 'weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'weee_tax_row_disposition', 'weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_weee_tax_disposition', 'base_weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_invoice_item'), 'base_weee_tax_row_disposition', 'base_weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_order'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_discount_canceled', 'base_discount_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_discount_invoiced', 'base_discount_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_discount_refunded', 'base_discount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_amount', 'base_shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_canceled', 'base_shipping_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_invoiced', 'base_shipping_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_refunded', 'base_shipping_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_tax_amount', 'base_shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_tax_refunded', 'base_shipping_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_subtotal', 'base_subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_subtotal_canceled', 'base_subtotal_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_subtotal_invoiced', 'base_subtotal_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_subtotal_refunded', 'base_subtotal_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_tax_canceled', 'base_tax_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_tax_invoiced', 'base_tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_tax_refunded', 'base_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_to_global_rate', 'base_to_global_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_to_order_rate', 'base_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_canceled', 'base_total_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_invoiced', 'base_total_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_invoiced_cost', 'base_total_invoiced_cost', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_offline_refunded', 'base_total_offline_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_online_refunded', 'base_total_online_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_paid', 'base_total_paid', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_refunded', 'base_total_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'discount_canceled', 'discount_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'discount_invoiced', 'discount_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'discount_refunded', 'discount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_amount', 'shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_canceled', 'shipping_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_invoiced', 'shipping_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_refunded', 'shipping_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_tax_amount', 'shipping_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_tax_refunded', 'shipping_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'store_to_base_rate', 'store_to_base_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'store_to_order_rate', 'store_to_order_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'subtotal', 'subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'subtotal_canceled', 'subtotal_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'subtotal_invoiced', 'subtotal_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'subtotal_refunded', 'subtotal_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'tax_canceled', 'tax_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'tax_invoiced', 'tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'tax_refunded', 'tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'total_canceled', 'total_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'total_invoiced', 'total_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'total_offline_refunded', 'total_offline_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'total_online_refunded', 'total_online_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'total_paid', 'total_paid', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'total_refunded', 'total_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'adjustment_negative', 'adjustment_negative', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'adjustment_positive', 'adjustment_positive', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_adjustment_negative', 'base_adjustment_negative', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_adjustment_positive', 'base_adjustment_positive', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_discount_amount', 'base_shipping_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_subtotal_incl_tax', 'base_subtotal_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_total_due', 'base_total_due', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_discount_amount', 'shipping_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'subtotal_incl_tax', 'subtotal_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'total_due', 'total_due', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_hidden_tax_amount', 'shipping_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_hidden_tax_amnt', 'base_shipping_hidden_tax_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'hidden_tax_invoiced', 'hidden_tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_hidden_tax_invoiced', 'base_hidden_tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'hidden_tax_refunded', 'hidden_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_hidden_tax_refunded', 'base_hidden_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'shipping_incl_tax', 'shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order'), 'base_shipping_incl_tax', 'base_shipping_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_order_grid'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_grid'), 'base_total_paid', 'base_total_paid', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_grid'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_grid'), 'total_paid', 'total_paid', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_cost', 'base_cost', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_price', 'base_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'original_price', 'original_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_original_price', 'base_original_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'tax_invoiced', 'tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_tax_invoiced', 'base_tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'discount_invoiced', 'discount_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_discount_invoiced', 'base_discount_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'amount_refunded', 'amount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_amount_refunded', 'base_amount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'row_total', 'row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_row_total', 'base_row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'row_invoiced', 'row_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_row_invoiced', 'base_row_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_tax_before_discount', 'base_tax_before_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'tax_before_discount', 'tax_before_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'price_incl_tax', 'price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_price_incl_tax', 'base_price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'row_total_incl_tax', 'row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_row_total_incl_tax', 'base_row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'hidden_tax_invoiced', 'hidden_tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_hidden_tax_invoiced', 'base_hidden_tax_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'hidden_tax_refunded', 'hidden_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_hidden_tax_refunded', 'base_hidden_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'tax_canceled', 'tax_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'hidden_tax_canceled', 'hidden_tax_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'tax_refunded', 'tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_tax_refunded', 'base_tax_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'discount_refunded', 'discount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_discount_refunded', 'base_discount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_weee_tax_applied_amount', 'base_weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_weee_tax_applied_row_amnt', 'base_weee_tax_applied_row_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'weee_tax_applied_amount', 'weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'weee_tax_applied_row_amount', 'weee_tax_applied_row_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'weee_tax_disposition', 'weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'weee_tax_row_disposition', 'weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_weee_tax_disposition', 'base_weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_item'), 'base_weee_tax_row_disposition', 'base_weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_shipping_captured', 'base_shipping_captured', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'shipping_captured', 'shipping_captured', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'amount_refunded', 'amount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_amount_paid', 'base_amount_paid', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'amount_canceled', 'amount_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_amount_authorized', 'base_amount_authorized', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_amount_paid_online', 'base_amount_paid_online', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_amount_refunded_online', 'base_amount_refunded_online', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_shipping_amount', 'base_shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'shipping_amount', 'shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'amount_paid', 'amount_paid', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'amount_authorized', 'amount_authorized', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_amount_ordered', 'base_amount_ordered', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_shipping_refunded', 'base_shipping_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'shipping_refunded', 'shipping_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_amount_refunded', 'base_amount_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'amount_ordered', 'amount_ordered', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_order_payment'), 'base_amount_canceled', 'base_amount_canceled', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_quote'), 'store_to_base_rate', 'store_to_base_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'store_to_quote_rate', 'store_to_quote_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'grand_total', 'grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'base_grand_total', 'base_grand_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'base_to_global_rate', 'base_to_global_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'base_to_quote_rate', 'base_to_quote_rate', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'subtotal', 'subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'base_subtotal', 'base_subtotal', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'subtotal_with_discount', 'subtotal_with_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote'), 'base_subtotal_with_discount', 'base_subtotal_with_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'discount_percent', 'discount_percent', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'base_price', 'base_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'base_cost', 'base_cost', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'price_incl_tax', 'price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'base_price_incl_tax', 'base_price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'row_total_incl_tax', 'row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'base_row_total_incl_tax', 'base_row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_address_item'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_price', 'base_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'custom_price', 'custom_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_discount_amount', 'base_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_tax_amount', 'base_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'row_total', 'row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_row_total', 'base_row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'row_total_with_discount', 'row_total_with_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_tax_before_discount', 'base_tax_before_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'tax_before_discount', 'tax_before_discount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'original_custom_price', 'original_custom_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_cost', 'base_cost', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'price_incl_tax', 'price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_price_incl_tax', 'base_price_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'row_total_incl_tax', 'row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_row_total_incl_tax', 'base_row_total_incl_tax', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'hidden_tax_amount', 'hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_hidden_tax_amount', 'base_hidden_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'weee_tax_disposition', 'weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'weee_tax_row_disposition', 'weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_weee_tax_disposition', 'base_weee_tax_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_weee_tax_row_disposition', 'base_weee_tax_row_disposition', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'weee_tax_applied_amount', 'weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'weee_tax_applied_row_amount', 'weee_tax_applied_row_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_weee_tax_applied_amount', 'base_weee_tax_applied_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_quote_item'), 'base_weee_tax_applied_row_amnt', 'base_weee_tax_applied_row_amnt', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_quote_shipping_rate'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_flat_shipment_item'), 'row_total', 'row_total', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_flat_shipment_item'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalogrule'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalogrule'), 'sub_discount_amount', 'sub_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalogrule_product'), 'sub_discount_amount', 'sub_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('catalogrule_product'), 'action_amount', 'action_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('catalogrule_product_price'), 'rule_price', 'rule_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('coupon_aggregated'), 'subtotal_amount', 'subtotal_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated'), 'total_amount', 'total_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated'), 'subtotal_amount_actual', 'subtotal_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated'), 'discount_amount_actual', 'discount_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated'), 'total_amount_actual', 'total_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('coupon_aggregated_order'), 'subtotal_amount', 'subtotal_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated_order'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated_order'), 'total_amount', 'total_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('coupon_aggregated_updated'), 'subtotal_amount', 'subtotal_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated_updated'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated_updated'), 'total_amount', 'total_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated_updated'), 'subtotal_amount_actual', 'subtotal_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated_updated'), 'discount_amount_actual', 'discount_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('coupon_aggregated_updated'), 'total_amount_actual', 'total_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('customer_entity_decimal'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('downloadable_link_price'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('eav_entity_decimal'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('product_alert_price'), 'price', 'price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('report_viewed_product_aggregated_daily'), 'product_price', 'product_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('report_viewed_product_aggregated_monthly'), 'product_price', 'product_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('report_viewed_product_aggregated_yearly'), 'product_price', 'product_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_bestsellers_aggregated_daily'), 'product_price', 'product_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_bestsellers_aggregated_monthly'), 'product_price', 'product_price', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_bestsellers_aggregated_yearly'), 'product_price', 'product_price', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_invoiced_aggregated'), 'orders_invoiced', 'orders_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_invoiced_aggregated'), 'invoiced', 'invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_invoiced_aggregated'), 'invoiced_captured', 'invoiced_captured', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_invoiced_aggregated'), 'invoiced_not_captured', 'invoiced_not_captured', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_invoiced_aggregated_order'), 'orders_invoiced', 'orders_invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_invoiced_aggregated_order'), 'invoiced', 'invoiced', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_invoiced_aggregated_order'), 'invoiced_captured', 'invoiced_captured', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_invoiced_aggregated_order'), 'invoiced_not_captured', 'invoiced_not_captured', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_income_amount', 'total_income_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_revenue_amount', 'total_revenue_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_profit_amount', 'total_profit_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_invoiced_amount', 'total_invoiced_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_canceled_amount', 'total_canceled_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_paid_amount', 'total_paid_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_refunded_amount', 'total_refunded_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_tax_amount', 'total_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_tax_amount_actual', 'total_tax_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_shipping_amount', 'total_shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_shipping_amount_actual', 'total_shipping_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_discount_amount', 'total_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_created'), 'total_discount_amount_actual', 'total_discount_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_income_amount', 'total_income_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_revenue_amount', 'total_revenue_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_profit_amount', 'total_profit_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_invoiced_amount', 'total_invoiced_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_canceled_amount', 'total_canceled_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_paid_amount', 'total_paid_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_refunded_amount', 'total_refunded_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_tax_amount', 'total_tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_tax_amount_actual', 'total_tax_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_shipping_amount', 'total_shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_shipping_amount_actual', 'total_shipping_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_discount_amount', 'total_discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_aggregated_updated'), 'total_discount_amount_actual', 'total_discount_amount_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_order_tax'), 'amount', 'amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_tax'), 'base_amount', 'base_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_order_tax'), 'base_real_amount', 'base_real_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_recurring_profile'), 'billing_amount', 'billing_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_recurring_profile'), 'shipping_amount', 'shipping_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_recurring_profile'), 'tax_amount', 'tax_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_recurring_profile'), 'init_amount', 'init_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_refunded_aggregated'), 'refunded', 'refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_refunded_aggregated'), 'online_refunded', 'online_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_refunded_aggregated'), 'offline_refunded', 'offline_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_refunded_aggregated_order'), 'refunded', 'refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_refunded_aggregated_order'), 'online_refunded', 'online_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_refunded_aggregated_order'), 'offline_refunded', 'offline_refunded', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_shipping_aggregated'), 'total_shipping', 'total_shipping', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_shipping_aggregated'), 'total_shipping_actual', 'total_shipping_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('sales_shipping_aggregated_order'), 'total_shipping', 'total_shipping', 'DECIMAL(12,8) NULL DEFAULT NULL');
$connection->changeColumn($this->getTable('sales_shipping_aggregated_order'), 'total_shipping_actual', 'total_shipping_actual', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('salesrule'), 'discount_amount', 'discount_amount', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('tax_calculation_rate'), 'rate', 'rate', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('weee_discount'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$connection->changeColumn($this->getTable('weee_tax'), 'value', 'value', 'DECIMAL(12,8) NULL DEFAULT NULL');

$installer->endSetup();