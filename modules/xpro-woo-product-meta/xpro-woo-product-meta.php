<?php

/**
 * @class XproWooProductMetaModule
 */

if (class_exists('WooCommerce')) {
	class XproWooProductMetaModule extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Meta', 'xpro-addons'),
				'description' 	  => __('Displays the meta info for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-meta/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-meta/',
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
	class XproWooProductMetaModuleNotExist extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Meta', 'xpro-addons'),
				'description' 	  => __('Displays the meta info for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-meta/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-meta/',
				'partial_refresh' 	=> true,
			));
		}
	}
}

if (class_exists('WooCommerce')) {
	FLBuilder::register_module('XproWooProductMetaModule', array(
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
							'responsive'            => true,
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
						'show_sku' => array(
							'type'    => 'select',
							'label'   => __('Display SKU?', 'xpro-addons'),
							'default' => 'yes',
							'options' => array(
								'yes'   => __('Yes', 'xpro-addons'),
								'no'     => __('No', 'xpro-addons'),
							),
						),
						'show_taxonomy' => array(
							'type'    => 'select',
							'label'   => __('Display Taxonomy?', 'xpro-addons'),
							'default' => 'yes',
							'options' => array(
								'yes'   => __('Yes', 'xpro-addons'),
								'no'     => __('No', 'xpro-addons'),
							),
						),
						'meta_title_color' => array(
							'type'       => 'color',
							'label'      => __('Meta Title Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.product_meta .sku_wrapper, .product_meta .posted_in',
								'property' => 'color',
								'important' => true,
							),
						),
						'txt_color' => array(
							'type'       => 'color',
							'label'      => __('Meta Text Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.product_meta .sku_wrapper .sku',
								'property' => 'color',
								'important' => true,
							),
						),
						'link_color' => array(
							'type'       => 'color',
							'label'      => __('Meta Link Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.product_meta .posted_in a',
								'property' => 'color',
							),
						),
						'meta_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Meta Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.product_meta',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'meta_spacing_bw' => array(
							'type'       => 'unit',
							'label'      => __('Meta Space Between', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.product_meta .posted_in',
								'property'  => 'padding-left',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'meta_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Meta Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.product_meta',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'meta_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Meta Border Settings',
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.product_meta',
								'property' => 'border',
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
					'title'         => __('Meta', 'xpro-addons'),
					'fields'        => array(
						'meta_heading' => array(
							'type'       => 'typography',
							'label'      => 'Title',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.product_meta .sku_wrapper, .product_meta .posted_in',
							),
						),
						'meta_typography' => array(
							'type'       => 'typography',
							'label'      => 'Text',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.product_meta .sku_wrapper .sku',
							),
						),
						'meta_link_typo' => array(
							'type'       => 'typography',
							'label'      => 'Link',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.product_meta .posted_in a',
							),
						),
					)
				),
			)
		),
	));
} else {
	FLBuilder::register_module('XproWooProductMetaModuleNotExist', array(
		'general-info' => array(
			'title' => __('General', 'xpro'),
			'description'	=> __('Please Install Woocommerce Plugin to use this Module.', 'xpro'),
		),
	));
}
