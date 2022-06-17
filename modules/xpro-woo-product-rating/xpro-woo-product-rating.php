<?php
/**
 * @class XproWooProductRating
 */

if (class_exists('WooCommerce')) {
	class XproWooProductRating extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Rating', 'xpro-addons'),
				'description' 	  => __('Displays the star rating for the current product', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-rating/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-rating/',
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
	class XproWooProductRatingNotExist extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Products Rating', 'xpro-addons'),
				'description' 	  => __('Displays the star rating for the current product', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-rating/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-rating/',
				'partial_refresh' 	=> true,
			));
		}
	}
}

if (class_exists('WooCommerce')) {
	FLBuilder::register_module('XproWooProductRating', array(
		'general' => array(
			'title'    => __('General', 'xpro'),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'select_layout'    => array(
							'type'              => 'select',
							'label'             => __('Select Layout', 'xpro'),
							'default'           => 'row',
							'help'              => __('Select Layout', 'xpro'),
							'options'           => array(
								'row'   => __('Row', 'xprowoo'),
								'column'   => __('Column', 'xprowoo'),
							),
						),
						'align'     => array(
							'type'    => 'align',
							'label'   => __('Alignment', 'xpro'),
							'default' => 'left',
							'options' => array(
								'left'   => __('Left', 'xpro'),
								'center' => __('Center', 'xpro'),
								'right'  => __('Right', 'xpro'),
							),
						),
						'show_stars'    => array(
							'type'              => 'select',
							'label'             => __('Display Starts?', 'xpro'),
							'default'           => 'yes',
							'help'              => __('Display Stars?', 'xpro'),
							'options'           => array(
								'yes'   => __('Yes', 'xprowoo'),
								'no'   => __('No', 'xprowoo'),
							),
						),
						'show_count'    => array(
							'type'              => 'select',
							'label'             => __('Display Count?', 'xpro'),
							'default'           => 'yes',
							'help'              => __('Display Count?', 'xpro'),
							'options'           => array(
								'yes'   => __('Yes', 'xprowoo'),
								'no'   => __('No', 'xprowoo'),
							),
						),
						'xpro-widget-seprator1' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Color</h2>',
						),
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
						'count_color'  => array(
							'type'       => 'color',
							'label'      => __('Count Text Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.woocommerce-rating-count',
								'property' => 'color',
							),
						),
						'xpro-widget-seprator2' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Spacing</h2>',
						),
						'rating_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Rating Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xprowoo-product-rating-wrapper',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'rating_space_bw' => array(
							'type'       => 'unit',
							'label'      => __('Rating Space Between', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xprowoo-product-rating-wrapper .woocommerce-rating-count',
								'property'  => 'padding-left',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'rating_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Rating Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xprowoo-product-rating-wrapper',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'stars_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Star Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xprowoo-product-rating-wrapper .star-rating',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'count_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Count Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xprowoo-product-rating-wrapper .woocommerce-rating-count',
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
					'title'         => __('Typography', 'xpro-addons'),
					'fields'        => array(
						'count_typography' => array(
							'type'       => 'typography',
							'label'      => 'Count Typo',
							'responsive' => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xprowoo-product-rating-wrapper .woocommerce-rating-count',
							),
						),
						'rating_stars_size' => array(
							'type'       => 'unit',
							'label'      => __('Rating Stars Size', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'responsive'            => true,
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xprowoo-product-rating-wrapper .star-rating',
								'property'  => 'font-size',
								'unit'      => 'px',
								'important' => true,
							),
						),
					)
				),
			)
		),
	));
} else {
	FLBuilder::register_module('XproWooProductRatingNotExist', array(
		'general-info' => array(
			'title' => __('General', 'xpro'),
			'description'	=> __('Please Install Woocommerce Plugin to use this Module.', 'xpro'),
		),
	));
}
