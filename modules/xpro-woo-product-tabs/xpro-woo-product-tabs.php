<?php
/**
 * @class XproWooProductTabsModule
 */

if (class_exists('WooCommerce')) {
	class XproWooProductTabsModule extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Product Tabs', 'xpro-addons'),
				'description' 	  => __('Displays the data tabs for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-tabs/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-tabs/',
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
	class XproWooProductTabsModuleNotExist extends FLBuilderModule
	{
		/**
		 * @return void
		 */
		public function __construct()
		{
			parent::__construct(array(
				'name'            => __('Woo Products Tabs', 'xpro-addons'),
				'description' 	  => __('Displays the data tabs for the current product.', 'xpro-addons'),
				'group'           => XPRO_Plugins_Helper::$branding_modules,
				'category'        => XPRO_Plugins_Helper::$themer_modules,
				'dir'             => XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-product-tabs/',
				'url'             => XPRO_ADDONS_FOR_BB_URL . 'modules/xpro-woo-product-tabs/',
				'partial_refresh' 	=> true,
			));
		}
	}
}

if (class_exists('WooCommerce')) {
	FLBuilder::register_module('XproWooProductTabsModule', array(
		'general' => array(
			'title'    => __('General', 'xpro'),
			'sections' => array(
				'tabs-settings' => array(
					'title'  => 'Nav',
					'fields' => array(
						'xpro-widget-seprator1' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Nav</h2>',
						),
						'nav_tabs_bg_color'  => array(
							'type'       => 'color',
							'label'      => __('Nav Background Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li a',
								'property' => 'background-color',
							),
						),
						'nav_tabs_color'  => array(
							'type'       => 'color',
							'label'      => __('Nav Text Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li a',
								'property' => 'color',
							),
						),
						'nav_tabs_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Nav Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li a',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'nav_tabs_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Nav Border',
						),
						'xpro-widget-seprator2' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Active Nav</h2>',
						),
						'nav_active_tab_bg_color'  => array(
							'type'       => 'color',
							'label'      => __('Active Nav Background Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li.active a',
								'property' => 'background-color',
							),
						),
						'nav_active_tab_color'  => array(
							'type'       => 'color',
							'label'      => __('Active Nav Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li.active a',
								'property' => 'color',
							),
						),
						'nav_active_tab_border_color'  => array(
							'type'       => 'color',
							'label'      => __('Nav Active Border Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li.active a',
								'property' => 'border-color',
							),
						),
					),
				),
				'tab-style' => array(
					'title'  => 'Tabs',
					'fields' => array(
						'xpro-widget-seprator3' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Tabs</h2>',
						),
						'tabs_box_heading_color'  => array(
							'type'       => 'color',
							'label'      => __('Tabs Box Heading Color', 'xpro'),
							'show_reset' => true,
						),
						'tabs_box_content_color'  => array(
							'type'       => 'color',
							'label'      => __('Tabs Box Content Color', 'xpro'),
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab',
								'property' => 'color',
							),
						),
						'tabs_box_bg_color'  => array(
							'type'       => 'color',
							'label'      => __('Tabs Box Background Color', 'xpro'),
							'show_reset' => true,
							'default'	 => 'f7f7f7',
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab',
								'property' => 'background-color',
							),
						),
						'tabs_box_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Spacing Around Content', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'default'	 => '40',
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab',
								'property'  => 'padding',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'tabs_box_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Content Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
							'preview'    => array(
								'type'      => 'css',
								'selector'  => '.xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab',
								'property'  => 'margin',
								'unit'      => 'px',
								'important' => true,
							),
						),
						'tabs_box_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Box Border Settings',
						),
						'xpro-widget-seprator4' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Tab: Additional Information </h2>',
						),
						'tabs_box_border_color'  => array(
							'type'       => 'color',
							'label'      => __('Tabs Box Table Border Color', 'xpro'),
							'show_reset' => true,
						),
						'xpro-widget-seprator5' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Tab: Reviews</h2>',
						),
						'tabs_comments_border_color'  => array(
							'type'       => 'color',
							'label'      => __('Tabs Comment Border Color', 'xpro'),
							'show_reset' => true,
						),
						'author_color'  => array(
							'type'       => 'color',
							'label'      => __('Author Color', 'xpro'),
							'show_reset' => true,
						),
						'rating_color'  => array(
							'type'       => 'color',
							'label'      => __('Rating Color', 'xpro'),
							'show_reset' => true,
						),
						'review_box_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Review Box Border Settings',
						),
						'xpro-widget-seprator6' => array(
							'type'    => 'raw',
							'content' => '<h2 class="xpro-widget-separator-class">Button</h2>',
						),
						'submit_btn_color'  => array(
							'type'       => 'color',
							'label'      => __('Submit button Color', 'xpro'),
							'show_reset' => true,
						),
						'submit_btn_hv_color'  => array(
							'type'       => 'color',
							'label'      => __('Submit button Hover Color', 'xpro'),
							'show_reset' => true,
						),
						'submit_btn_bg_color'  => array(
							'type'       => 'color',
							'label'      => __('Submit button Background Color', 'xpro'),
							'show_reset' => true,
						),
						'submit_btn_bg_hover_color'  => array(
							'type'       => 'color',
							'label'      => __('Submit button Background Hover Color', 'xpro'),
							'show_reset' => true,
						),
						'submit_border_settings' => array(
							'type'       => 'border',
							'label'      => 'Submit Border Settings',
						),
						'submit_btn_padding' => array(
							'type'       => 'dimension',
							'label'      => __('Submit Button Padding', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
						),
						'submit_btn_margin' => array(
							'type'       => 'dimension',
							'label'      => __('Submit Button Margin', 'xpro'),
							'slider'     => true,
							'units'      => array('px'),
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
						'nav_typography' => array(
							'type'       => 'typography',
							'label'      => 'Nav Typography',
							'responsive' => true,
						),
						'heading_typography' => array(
							'type'       => 'typography',
							'label'      => 'Heading Typography',
							'responsive' => true,
						),
						'inner_content_typography' => array(
							'type'       => 'typography',
							'label'      => 'Inner Content Typography',
							'responsive' => true,
						),
					)
				),
			)
		),
	));
} else {
	FLBuilder::register_module('XproWooProductTabsModuleNotExist', array(
		'general-info' => array(
			'title' => __('General', 'xpro'),
			'description'	=> __('Please Install Woocommerce Plugin to use this Module.', 'xpro'),
		),
	));
}
