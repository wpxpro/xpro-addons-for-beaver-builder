<?php

/**
 * @class XproWooCartButtonModule
 */

if (class_exists('WooCommerce')) {
	class XproWooCartButtonModule extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Add to Cart', 'xpro'),
				'description' 	  => __('Displays the cart button for the current product', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-cart-button/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-cart-button/',
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
	class XproWooCartButtonModuleNotExist extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Add to Cart', 'xpro'),
				'description' 	  => __('Displays the cart button for the current product', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-cart-button/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-cart-button/',
				'partial_refresh' 	=> true,
			));
		}
	}
}

if (class_exists('WooCommerce')) {
	FLBuilder::register_module('XproWooCartButtonModule', array(
		'general' => array(
			'title'    => __('General', 'xpro'),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'xpro-widget-seprator1' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Button Style</h2>',
						),
						'button_color'          => array(
							'type'                  => 'color',
							'label'                 => __('Button Text Color', 'xprowoo'),
							'default'               => '',
							'show_reset'            => true,
						),
						'btn_bg_type'        => array(
							'type'    => 'select',
							'label'   => __('Button Background Type', 'xpro-addons'),
							'default' => 'bg-color',
							'options' => array(
								'none'        => __('None', 'xpro-addons'),
								'bg-color'        => __('Background Color', 'xpro-addons'),
								'bg-gradient'             => __('Background Gradient', 'xpro-addons'),
							),
							'toggle'  => array(
								'bg-color'  => array(
									'fields' => array('button_bg_color'),
								),
								'bg-gradient'  => array(
									'fields' => array('btn_background_gradient'),
								),
							),
						),
						'button_bg_color'       => array(
							'type'                  => 'color',
							'label'                 => __('Button Background Color', 'xprowoo'),
							'default'               => '',
							'show_reset'            => true,
							'show_alpha'            => true,
						),
						'btn_background_gradient'       => array(
							'type'       => 'gradient',
							'label'      => __('Button Background Gradient', 'xpro'),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'button_color_hover'    => array(
							'type'                  => 'color',
							'label'                 => __('Button Text Hover Color', 'xprowoo'),
							'default'               => '',
							'show_reset'            => true,
						),
						'btn_bg_hv_type'        => array(
							'type'    => 'select',
							'label'   => __('Button Background Hover Type', 'xpro-addons'),
							'default' => 'bg-color',
							'options' => array(
								'none'        => __('None', 'xpro-addons'),
								'bg-color'        => __('Background Color', 'xpro-addons'),
								'bg-gradient'             => __('Background Gradient', 'xpro-addons'),
							),
							'toggle'  => array(
								'bg-color'  => array(
									'fields' => array('button_bg_color_hover'),
								),
								'bg-gradient'  => array(
									'fields' => array('btn_hv_background_gradient'),
								),
							),
						),
						'button_bg_color_hover' => array(
							'type'                  => 'color',
							'label'                 => __('Button Background Hover Color', 'xprowoo'),
							'default'               => '',
							'show_reset'            => true,
							'show_alpha'            => true,
						),
						'btn_hv_background_gradient'       => array(
							'type'       => 'gradient',
							'label'      => __('Button Background Hover Gradient', 'xpro'),
							'default'    => '',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'btn_padding'        => array(
							'type'              => 'dimension',
							'label'             => __('Button Padding', 'xprowoo'),
							'units'                => array('px'),
							'slider'            => true,
							'responsive'        => true,
						),
						'btn_margin'        => array(
							'type'              => 'dimension',
							'label'             => __('Button Margin', 'xprowoo'),
							'units'                => array('px'),
							'slider'            => true,
							'responsive'        => true,
						),
						'btn_border'   => array(
							'type'                      => 'border',
							'label'                     => __('Button Border', 'xprowoo'),
							'responsive'                => true,
						),
						'xpro-widget-seprator2' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Variation Style</h2>',
						),
						'color_variation_size' => array(
							'type'       => 'unit',
							'label'      => __('Color Variation Size', 'xpro'),
							'units'      => array('px'),
							'slider'     => true,
							'placeholder' => '50'
						),
						'color_variation_border'   => array(
							'type'                      => 'border',
							'label'                     => __('Color Variation Border', 'xprowoo'),
							'responsive'                => true,
						),
						'size_variation_color'    => array(
							'type'              => 'color',
							'label'             => __('Size Variation Label Color', 'xprowoo'),
							'show_reset'        => true,
						),
						'size_variation_bg_color'    => array(
							'type'              => 'color',
							'label'             => __('Size Variation Background Color', 'xprowoo'),
							'show_reset'        => true,
						),
						'size_variation_padding'        => array(
							'type'              => 'dimension',
							'label'             => __('Size Variation Padding', 'xprowoo'),
							'units'                => array('px'),
							'slider'            => true,
							'responsive'        => true,
						),
						'size_variation_border'   => array(
							'type'                      => 'border',
							'label'                     => __('Size Variation Border', 'xprowoo'),
							'responsive'                => true,
						),
						'clear_btn_color'       => array(
							'type'                  => 'color',
							'label'                 => __('Clear Button Color', 'xprowoo'),
							'default'               => '',
							'show_reset'            => true,
							'show_alpha'            => true,
						),
						'clear_btn_bg_color'       => array(
							'type'                  => 'color',
							'label'                 => __('Clear Button Background Color', 'xprowoo'),
							'default'               => '',
							'show_reset'            => true,
							'show_alpha'            => true,
						),
					),
				),
			),
		),
		'typo'       => array(
			'title'         => __('Typography', 'xpro-addons'),
			'sections'      => array(
				'title'       => array(
					'title'         => __('Typography', 'xpro-addons'),
					'fields'        => array(
						'button_typography' => array(
							'type'       => 'typography',
							'label'      => 'Button Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-btn-add-to-cart .woocommerce-variation-add-to-cart .single_add_to_cart_button.button, .xprowoo-product-action button.button, .woocommerce-variation-add-to-cart button',
							),
						),
						'label_typography' => array(
							'type'       => 'typography',
							'label'      => 'Label Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-varation-select-type label',
							),
						),
					)
				),
			)
		),
	));
} else {
	FLBuilder::register_module('XproWooCartButtonModuleNotExist', array(
		'general-info' => array(
			'title' => __('General', 'xpro'),
			'description'	=> __('Please Install Woocommerce Plugin to use this Module.', 'xpro'),
		),
	));
}
