<?php
/**
 * @class XproWooProductUpsellsModule
 */

if (class_exists('WooCommerce')) {
	class XproWooProductUpsellsModule extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Upsells', 'xpro-addons'),
				'description' 	  => __('Displays upsells for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-upsells/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-upsells/',
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
	class XproWooProductUpsellsModuleNotExist extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Upsells', 'xpro-addons'),
				'description' 	  => __('Displays upsells for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-upsells/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-upsells/',
				'partial_refresh' 	=> true,
			));
		}
	}
}

if (class_exists('WooCommerce')) {
	FLBuilder::register_module('XproWooProductUpsellsModule', array(
		'general_tab' => array(
			'title'    => __('General', 'xpro'),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'show_heading' => array(
							'type'    => 'select',
							'label'   => __('Show Heading', 'xpro'),
							'default' => 'yes',
							'options' => array(
								'yes' => __('Yes', 'xpro'),
								'no'  => __('No', 'xpro'),
							),
							'toggle'  => array(
								'yes'     => array(
									'sections' => array('heading_section'),
									'fields'   => array('heading_typography'),
								),
							),
						),
						'show_title' => array(
							'type'    => 'select',
							'label'   => __('Show Product Title', 'xpro'),
							'default' => 'yes',
							'options' => array(
								'yes' => __('Yes', 'xpro'),
								'no'  => __('No', 'xpro'),
							),
							'toggle'  => array(
								'yes'     => array(
									'sections' => array('title_section'),
									'fields'   => array('title_typography'),
								),
							),
						),
						'show_img' => array(
							'type'    => 'select',
							'label'   => __('Show Product Image', 'xpro'),
							'default' => 'yes',
							'options' => array(
								'yes' => __('Yes', 'xpro'),
								'no'  => __('No', 'xpro'),
							),
							'toggle'  => array(
								'yes'     => array(
									'sections' => array('img_section'),
								),
							),
						),
						'show_price' => array(
							'type'    => 'select',
							'label'   => __('Show Product Price', 'xpro'),
							'default' => 'yes',
							'options' => array(
								'yes' => __('Yes', 'xpro'),
								'no'  => __('No', 'xpro'),
							),
							'toggle'  => array(
								'yes'     => array(
									'sections' => array('price_section'),
									'fields'   => array('price_typography'),
								),
							),
						),
						'show_rating' => array(
							'type'    => 'select',
							'label'   => __('Show Product Rating', 'xpro'),
							'default' => 'yes',
							'options' => array(
								'yes' => __('Yes', 'xpro'),
								'no'  => __('No', 'xpro'),
							),
							'toggle'  => array(
								'yes'     => array(
									'sections' => array('rating_section'),
								),
							),
						),
						'display_sale_badge' => array(
							'type'    => 'select',
							'label'   => __('Show Sales Badge', 'xpro'),
							'default' => 'yes',
							'options' => array(
								'yes' => __('Yes', 'xpro'),
								'no'  => __('No', 'xpro'),
							),
							'toggle'  => array(
								'yes'     => array(
									'sections' => array('badge_section'),
									'fields'   => array('badge_typography'),
								),
							),
						),
						'show_add_to_cart' => array(
							'type'    => 'select',
							'label'   => __('Show Add To Cart Button(s)', 'xpro'),
							'default' => 'yes',
							'options' => array(
								'yes' => __('Yes', 'xpro'),
								'no'  => __('No', 'xpro'),
							),
							'toggle'  => array(
								'yes'     => array(
									'sections' => array('button_section'),
									'fields'   => array('btn_typography'),
								),
							),
						),
					),
				),
				'heading_section' => array(
					'title'  => 'Heading',
					'fields' => array(
						'heading_text_color' => array(
							'type'       => 'color',
							'label'      => __('Heading Text Color', 'xpro'),
							'show_reset' => true,
						),
						'heading_bg_color' => array(
							'type'       => 'color',
							'label'      => __('Heading Background Color', 'xpro'),
							'show_reset' => true,
						),
						'heading_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Heading Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'heading_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Heading Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'heading_btn_border' => array(
							'type'       => 'border',
							'label'      => 'Heading Button Border',
							'responsive' => true,
						),
					),
				),
				'title_section' => array(
					'title'  => 'Title',
					'fields' => array(
						'title_color' => array(
							'type'       => 'color',
							'label'      => __('Title Text Color', 'xpro'),
							'show_reset' => true,
						),
						'title_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Title Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'title_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Title Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
					),
				),
				'img_section' => array(
					'title'  => 'Image',
					'fields' => array(
						'img_width' => array(
							'type'       => 'unit',
							'label'      => __('Image Width', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
						),
						'img_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Image Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'img_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Image Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'img_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Image Border',
							'responsive' => true,
						),
					),
				),
				'rating_section' => array(
					'title'  => 'Rating',
					'fields' => array(
						'fg_color'  => array(
							'type'       => 'color',
							'label'      => __('Rating Front Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-module-content .star-rating span:before',
								'property' => 'color',
							),
						),
						'bg_color'  => array(
							'type'       => 'color',
							'label'      => __('Rating Background Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.fl-module-content .star-rating:before',
								'property' => 'color',
							),
							'help'       => __('Controls the background color of the rating symbols.', 'xpro'),
						),
						'rating_size' => array(
							'type'       => 'unit',
							'label'      => __('Rating Size', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product .star-rating',
								'property'  => 'font-size',
								'unit'      => 'px',
								'important' => true,
							),
						),
					),
				),
				'price_section' => array(
					'title'  => 'Price',
					'fields' => array(
						'price_color' => array(
							'type'       => 'color',
							'label'      => __('Price Text Color', 'xpro'),
							'show_reset' => true,
						),
						'sale_price_color' => array(
							'type'       => 'color',
							'label'      => __('Sale Price Color', 'xpro'),
							'show_reset' => true,
						),
						'price_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Price Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'price_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Price Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
					),
				),
				'badge_section' => array(
					'title'  => 'Badge',
					'fields' => array(
						'badge_color' => array(
							'type'       => 'color',
							'label'      => __('Badge Text Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-upsells-cls .products .product .onsale',
								'property' => 'color',
							),
						),
						'badge_bg_color' => array(
							'type'       => 'color',
							'label'      => __('Badge Background Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-upsells-cls .products .product .onsale',
								'property' => 'background-color',
							),
						),
						'badge_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Badge Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product .onsale',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'badge_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Badge Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product .onsale',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'badge_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Badge Button Border',
							'responsive' => true,
						),
					),
				),
				'button_section' => array(
					'title'  => 'Button',
					'fields' => array(
						'button_color' => array(
							'type'       => 'color',
							'label'      => __('Button Text Color', 'xpro'),
							'show_reset' => true,
						),
						'button_bg_color' => array(
							'type'       => 'color',
							'label'      => __('Button Background Color', 'xpro'),
							'show_reset' => true,
						),
						'button_hv_color' => array(
							'type'       => 'color',
							'label'      => __('Button Hover Text Color', 'xpro'),
							'show_reset' => true,
						),
						'button_bg_hv_color' => array(
							'type'       => 'color',
							'label'      => __('Button Background Hover Color', 'xpro'),
							'show_reset' => true,
						),
						'button_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Button Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'button_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Button Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
						),
						'btn_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Button Border',
							'responsive' => true,
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
						'heading_typography' => array(
							'type'       => 'typography',
							'label'      => 'Heading Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .upsells h2:first-child',
							),
						),
						'title_typography' => array(
							'type'       => 'typography',
							'label'      => 'Title Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product .woocommerce-loop-product__title',
							),
						),
						'price_typography' => array(
							'type'       => 'typography',
							'label'      => 'Price Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product .price',
							),
						),
						'sale_price_typography' => array(
							'type'       => 'typography',
							'label'      => 'Sale Price Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product del .woocommerce-Price-amount',
							),
						),
						'badge_typography' => array(
							'type'       => 'typography',
							'label'      => 'Badge Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product .onsale',
							),
						),
						'btn_typography' => array(
							'type'       => 'typography',
							'label'      => 'Button Typography',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-upsells-cls .products .product .button',
							),
						),
					)
				),
			)
		),
	));
} else {
	FLBuilder::register_module('XproWooProductUpsellsModuleNotExist', array(
		'general-info' => array(
			'title' => __('General', 'xpro'),
			'description'	=> __('Please Install Woocommerce Plugin to use this Module.', 'xpro'),
		),
	));
}
