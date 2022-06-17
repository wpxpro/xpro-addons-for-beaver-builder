<?php

/**
 * @class XproWooProductPriceModule
 */

if (class_exists('WooCommerce')) {
	class XproWooProductPriceModule extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Price', 'xpro-addons'),
				'description' 	  => __('Displays the price for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-price/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-price/',
				'partial_refresh' 	=> true,
			));
		}


		/**
		 * Get First/Current Product id
		 *
		 * @method @get_product_id
		 */
		public static function get_product_id($i)
		{
			global $woocommerce;
			global $wpdb;
			global $product;

			$type = 'product';
			$product_name = $product;

			// current post id
			$current_post = $wpdb->get_results($wpdb->prepare("
			SELECT ID FROM {$wpdb->posts}
			WHERE post_type = %s AND post_status = 'publish' AND post_name = '$product_name' limit 1", $type));

			foreach ($current_post as $c_post) {
				$curr_post_id = $c_post->ID;
			}

			// first post id
			$first_posts = $wpdb->get_results($wpdb->prepare("
			SELECT ID FROM {$wpdb->posts}
			WHERE post_type = %s AND post_status = 'publish' 
			ORDER BY post_date ASC limit 1", $type));

			foreach ($first_posts as $f_post) {
				$f_post_id = $f_post->ID;
			}

			if (!empty($product)) {
				$post_id = $curr_post_id;
			} else {
				$post_id = $f_post_id;
			}

			return $post_id;
		}
	}
} else {
	class XproWooProductPriceModuleNotExist extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Price', 'xpro-addons'),
				'description' 	  => __('Displays the price for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-price/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-price/',
				'partial_refresh' 	=> true,
			));
		}
	}
}

if (class_exists('WooCommerce')) {
	FLBuilder::register_module('XproWooProductPriceModule', array(
		'general' => array(
			'title'    => __('General', 'xpro'),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'align'      => array(
							'type'    => 'align',
							'label'   => __('Alignment', 'xpro'),
							'default' => 'left',
							'responsive'   => true,
							'options' => array(
								'left'   => __('Left', 'xpro'),
								'center' => __('Center', 'xpro'),
								'right'  => __('Right', 'xpro'),
							),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.fl-module-content',
								'property' => 'text-align',
							),
						),
						'price_color' => array(
							'type'       => 'color',
							'label'      => __('Price Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-price-cls .woocommerce-Price-amount',
								'property' => 'color',
							),
						),
						'old_price_color' => array(
							'type'       => 'color',
							'label'      => __('Sale Price Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-price-cls del .woocommerce-Price-amount',
								'property' => 'color',
							),
						),
						'price_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Price Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-price-cls',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'space_between' => array(
							'type'       => 'unit',
							'label'      => __('Space Between', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-price-cls ins',
								'property'  => 'padding-left',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'price_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Price Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-price-cls',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
			),
		),
		'typo'       => array(
			'title'         => __('Typography', 'xpro-addons'),
			'sections'      => array(
				'title'       => array(
					'title'         => __('Price', 'xpro-addons'),
					'fields'        => array(
						'price_typography' => array(
							'type'       => 'typography',
							'label'      => 'Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-price-cls .woocommerce-Price-amount',
							),
						),
						'sale_price_typography' => array(
							'type'       => 'typography',
							'label'      => 'Sale Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-price-cls del .woocommerce-Price-amount',
							),
						),
					)
				),
			)
		),
	));
} else {
	FLBuilder::register_module('XproWooProductPriceModuleNotExist', array(
		'general-info' => array(
			'title' => __('General', 'xpro'),
			'description'	=> __('Please Install Woocommerce Plugin to use this Module.', 'xpro'),
		),
	));
}
