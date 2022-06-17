<?php
/**
 *  xpro Woo Products Tabs
 *
 *  @package xpro Woo Products Tabs
 */

//nav typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'nav_typography',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .woocommerce-tabs ul > li > a",
	)
);

//heading typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab h2",
	)
);


//inner content typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'inner_content_typography',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab, .fl-node-$id .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab p",
	)
);

?>

.fl-node-<?php echo esc_attr( $id ); ?> .xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li a {
color: #<?php echo $settings->nav_tabs_color; ?>;
background-color: #<?php echo $settings->nav_tabs_bg_color; ?>;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li.active a {
color: #<?php echo $settings->nav_active_tab_color; ?>;
background-color: #<?php echo $settings->nav_active_tab_bg_color; ?>;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li.active a {
border-color: #<?php echo $settings->nav_active_tab_border_color; ?> !important;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab {
color: #<?php echo $settings->tabs_box_content_color; ?>;
background-color: #<?php echo $settings->tabs_box_bg_color; ?>;
}

.fl-node-<?php echo  $id; ?> .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab h2 {
color: #<?php echo $settings->tabs_box_heading_color; ?>;
}

.fl-node-<?php echo $id; ?> .woocommerce-product-attributes-item th, .fl-node-<?php echo $id; ?> .woocommerce-product-attributes-item td {
border-color: #<?php echo $settings->tabs_box_border_color; ?> !important;
border-width: 1px !important;
border-style: solid !important;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .comment-text {
border-color: #<?php echo $settings->tabs_comments_border_color; ?> !important;
border-width: 1px !important;
border-style: solid !important;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .meta {
color: #<?php echo $settings->author_color; ?> !important;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .stars a {
color: #<?php echo $settings->rating_color; ?> !important;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .submit#submit {
color: #<?php echo $settings->submit_btn_color; ?> !important;
background-color: #<?php echo $settings->submit_btn_bg_color; ?> !important;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .submit#submit:hover {
color: #<?php echo $settings->submit_btn_hv_color; ?> !important;
background-color: #<?php echo $settings->submit_btn_bg_hover_color; ?> !important;
}

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .submit#submit {
border-radius: <?php echo $settings->submit_btn_radius; ?>px !important;
}

<?php
// custom border style

//custom box shadow
$horizontal = $settings->submit_border_settings['shadow']['horizontal'] . 'px ';
$vertical   = $settings->submit_border_settings['shadow']['vertical'] . 'px ';
$blur       = $settings->submit_border_settings['shadow']['blur'] . 'px ';
$spread     = $settings->submit_border_settings['shadow']['spread'] . 'px ';
//shadow color
$shadow_color = '#' . $settings->submit_border_settings['shadow']['color'];
?>

.fl-node-<?php echo $id; ?> .xpro-woo-product-tabs-cls .submit#submit {

border-style: <?php echo $settings->submit_border_settings['style']; ?> !important;
border-color: #<?php echo $settings->submit_border_settings['color']; ?> !important;

border-top-width: <?php echo $settings->submit_border_settings['width']['top']; ?>px !important;
border-right-width: <?php echo $settings->submit_border_settings['width']['right']; ?>px !important;
border-bottom-width: <?php echo $settings->submit_border_settings['width']['bottom']; ?>px !important;
border-left-width: <?php echo $settings->submit_border_settings['width']['left']; ?>px !important;

border-top-left-radius: <?php echo $settings->submit_border_settings['radius']['top_left']; ?>px !important;
border-top-right-radius: <?php echo $settings->submit_border_settings['radius']['top_right']; ?>px !important;
border-bottom-right-radius: <?php echo $settings->submit_border_settings['radius']['bottom_left']; ?>px !important;
border-bottom-left-radius: <?php echo $settings->submit_border_settings['radius']['bottom_right']; ?>px !important;

box-shadow: 
<?php
echo esc_attr( $horizontal );
			echo esc_attr( $vertical );
			echo esc_attr( $blur );
			echo esc_attr( $spread );
			echo esc_attr( $shadow_color );
?>
!important;
}


<?php

//nav tabs padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'nav_tabs_padding',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li a",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'nav_tabs_padding_top',
			'padding-right'  => 'nav_tabs_padding_right',
			'padding-bottom' => 'nav_tabs_padding_bottom',
			'padding-left'   => 'nav_tabs_padding_left',
		),
	)
);

//nav tabs border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'nav_tabs_border_settings',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .woocommerce-tabs ul.tabs.wc-tabs li a",
	)
);

// tabs box padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'tabs_box_padding',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'tabs_box_padding_top',
			'padding-right'  => 'tabs_box_padding_right',
			'padding-bottom' => 'tabs_box_padding_bottom',
			'padding-left'   => 'tabs_box_padding_left',
		),
	)
);

//tabs box margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'tabs_box_margin',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'tabs_box_margin_top',
			'margin-right'  => 'tabs_box_margin_right',
			'margin-bottom' => 'tabs_box_margin_bottom',
			'margin-left'   => 'tabs_box_margin_left',
		),
	)
);

// border_settings
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'tabs_box_border_settings',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls .panel.woocommerce-Tabs-panel.wc-tab",
	)
);

//review box border settings
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'review_box_border_settings',
		'selector'     => ".fl-node-$id .xpro-woo-product-tabs-cls #comment",
	)
);

//btn padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'submit_btn_padding',
		'selector'     => ".fl-node-$id .xprowoo-themer-module-wrapper .xpro-woo-product-tabs-cls .form-submit .submit#submit, .fl-node-$id .woocommerce #review_form #respond .form-submit input",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'submit_btn_padding_top',
			'padding-right'  => 'submit_btn_padding_right',
			'padding-bottom' => 'submit_btn_padding_bottom',
			'padding-left'   => 'submit_btn_padding_left',
		),
	)
);


//btn margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'submit_btn_margin',
		'selector'     => ".fl-node-$id .xprowoo-themer-module-wrapper .xpro-woo-product-tabs-cls .form-submit .submit#submit, .fl-node-$id .woocommerce #review_form #respond .form-submit input",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'submit_btn_margin_top',
			'margin-right'  => 'submit_btn_margin_right',
			'margin-bottom' => 'submit_btn_margin_bottom',
			'margin-left'   => 'submit_btn_margin_left',
		),
	)
);

?>
