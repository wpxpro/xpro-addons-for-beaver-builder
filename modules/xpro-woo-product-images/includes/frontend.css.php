<?php
/**
 *  xpro Woo Products Images
 *
 *  @package xpro Woo Products Images
 */

FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_width',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls",
		'prop'         => 'width',
		'unit'         => $settings->img_width_unit,
	)
);

//color/bg color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-product-img-cls .onsale",
		'props'    => array(
			'color'            => $settings->on_sale_btn_color,
			'background-color' => $settings->on_sale_btn_bg_color,
		),
	)
);

//img border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_border',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls",
	)
);

//btn padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'on_sale_btn_padding',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls .onsale",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'on_sale_btn_padding_top',
			'padding-right'  => 'on_sale_btn_padding_right',
			'padding-bottom' => 'on_sale_btn_padding_bottom',
			'padding-left'   => 'on_sale_btn_padding_left',
		),
	)
);

//btn margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'on_sale_btn_margin',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls .onsale",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'on_sale_btn_margin_top',
			'margin-right'  => 'on_sale_btn_margin_right',
			'margin-bottom' => 'on_sale_btn_margin_bottom',
			'margin-left'   => 'on_sale_btn_margin_left',
		),
	)
);

//btn border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_border',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls .onsale",
	)
);

// group images border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'group_border_settings',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls .flex-control-nav li img",
	)
);

// group images width
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'group_image_width',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls .flex-control-nav li img",
		'prop'         => 'width',
		'unit'         => $settings->group_image_unit,
		'enabled'      => 'custom' === $settings->group_image_width,
	)
);

// group images padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'group_image_padding',
		'selector'     => ".fl-node-$id .xpro-woo-product-img-cls .flex-control-nav li img",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'group_image_padding_top',
			'padding-right'  => 'group_image_padding_right',
			'padding-bottom' => 'group_image_padding_bottom',
			'padding-left'   => 'group_image_padding_left',
		),
	)
);
