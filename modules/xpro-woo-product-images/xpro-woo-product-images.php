<?php

/**
 * @class XproWooProductImagesModule
 */
if (class_exists('WooCommerce')) {
	class XproWooProductImagesModule extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Images', 'xpro-addons'),
				'description' 	  => __('Displays a gallery of images for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-images/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-images/',
				'partial_refresh' 	=> true,
			));

			add_action('wp_enqueue_scripts', array($this, 'load_custom_script'), 999);
		}

		/**
		 * Enqueue/Add CSS and JS files
		 *
		 * @method @load_custom_script
		 */

		function load_custom_script()
		{
			wp_enqueue_script('zoom');
			wp_enqueue_script('flexslider');
			wp_enqueue_script('photoswipe-ui-default');
			wp_enqueue_script('wc-single-product');
			wp_enqueue_style('photoswipe-default-skin');
			add_action('wp_footer', 'woocommerce_photoswipe');
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
	class XproWooProductImagesModuleNotExist extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Images', 'xpro-addons'),
				'description' 	  => __('Displays a gallery of images for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-images/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-images/',
				'partial_refresh' 	=> true,
			));
		}
	}
}

if (class_exists('WooCommerce')) {
	FLBuilder::register_module('XproWooProductImagesModule', array(
		'general' => array(
			'title'    => __('General', 'xpro'),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'img_width' => array(
							'type'       => 'unit',
							'label'      => __('Image Width', 'xpro'),
							'slider'     => true,
							'units'      => array('%', 'px'),
							'placeholder' => '100',
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls',
								'property'  => 'width',
								'units'      => array('%', 'px'),
								'important' => true,
							),
							'responsive' => true,
						),
						'img_border' => array(
							'type'       => 'border',
							'label'      => 'Image Border',
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls',
								'property'  => 'border',
								'unit'      => 'px',
								'important' => true,
							),
							'responsive' => true,
						),
						'xpro-widget-seprator0' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Sale Flash Button</h2>',
						),
						'sale_flash' => array(
							'type'    => 'select',
							'label'   => __('Sale Flash', 'xpro'),
							'default' => '1',
							'options' => array(
								'1' => __('Show', 'xpro'),
								'0' => __('Hide', 'xpro'),
							),
							'toggle'  => array(
								'1' => array(
									'fields' => array('on_sale_color'),
								),
							),
						),
						'on_sale_btn_color'  => array(
							'type'       => 'color',
							'label'      => __('Sale button text Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-img-cls .onsale',
								'property' => 'color',
							),
						),
						'on_sale_btn_bg_color'  => array(
							'type'       => 'color',
							'label'      => __('Sale button Background Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-img-cls .onsale',
								'property' => 'background-color',
							),
						),
						'on_sale_btn_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Sale Button Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls .onsale',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
							'responsive' => true,
						),
						'on_sale_btn_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Sale Button Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls .onsale',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
							'responsive' => true,
						),
						'on_sale_btn_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Sale Button Border',
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls .onsale',
								'property'  => 'border',
								'unit'      => 'px',
								'important' => true,
							),
							'responsive' => true,
						),
						'xpro-widget-seprator1' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Group Images Style</h2>',
						),
						'group_image_width' => array(
							'type'       => 'unit',
							'label'      => __('Group Image Width', 'xpro'),
							'slider'     => true,
							'units'      => array('px', '%'),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls .flex-control-nav li img',
								'property'  => 'width',
								'important' => true,
							),
						),
						'group_image_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Group Image Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls .flex-control-nav li img',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'group_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Group Image Border',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-img-cls .flex-control-nav li img',
								'property'  => 'border',
								'unit'      => 'px',
								'important' => true,
							),
						),

					),
				),
			),
		),
	));
} else {
	FLBuilder::register_module('XproWooProductImagesModuleNotExist', array(
		'general-info' => array(
			'title' => __('General', 'xpro'),
			'description'	=> __('Please Install Woocommerce Plugin to use this Module.', 'xpro'),
		),
	));
}
