<?php
/**
 *  xpro Woo Products Description
 *
 *  @package xpro Woo Products Description
 */

//desc typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'description_typography',
		'selector'     => ".fl-node-$id .xpro-woo-product-desc-cls",
	)
);

//desc alignment
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'align',
		'selector'     => ".fl-node-$id .fl-module-content.fl-node-content",
		'prop'         => 'text-align',
	)
);

//desc color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-product-desc-cls",
		'props'    => array(
			'color' => $settings->product_desc_color,
		),
	)
);

//desc padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'desc_padding',
		'selector'     => ".fl-node-$id .xpro-woo-product-desc-cls",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'desc_padding_top',
			'padding-right'  => 'desc_padding_right',
			'padding-bottom' => 'desc_padding_bottom',
			'padding-left'   => 'desc_padding_left',
		),
	)
);

//desc margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'desc_margin',
		'selector'     => ".fl-node-$id .xpro-woo-product-desc-cls",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'desc_margin_top',
			'margin-right'  => 'desc_margin_right',
			'margin-bottom' => 'desc_margin_bottom',
			'margin-left'   => 'desc_margin_left',
		),
	)
);
