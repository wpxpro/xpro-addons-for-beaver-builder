<?php

/**
 *  xpro Woo Products Price Module
 *
 *  @package XproWooProductPriceModule
 */

//alignment
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'align',
		'selector'     => ".fl-node-$id .fl-module-content.fl-node-content",
		'prop'         => 'text-align',
	)
);

//price typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_typography',
		'selector'     => ".fl-node-$id .xpro-woo-product-price-cls .woocommerce-Price-amount",
	)
);

//sale price typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sale_price_typography',
		'selector'     => ".fl-node-$id .xpro-woo-product-price-cls del .woocommerce-Price-amount",
	)
);

//color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-product-price-cls .woocommerce-Price-amount",
		'props'    => array(
			'color' => $settings->price_color,
		),
	)
);

//old price color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-product-price-cls del .woocommerce-Price-amount",
		'props'    => array(
			'color'           => $settings->old_price_color,
			'text-decoration' => 'line-through',
		),
	)
);

//padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_padding',
		'selector'     => ".fl-node-$id .xpro-woo-product-price-cls",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'price_padding_top',
			'padding-right'  => 'price_padding_right',
			'padding-bottom' => 'price_padding_bottom',
			'padding-left'   => 'price_padding_left',
		),
	)
);

if ( $settings->space_between ) {
	//space btw
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-product-price-cls ins",
			'props'    => array(
				'padding-left' => $settings->space_between . 'px',
			),
		)
	);
}

//margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_margin',
		'selector'     => ".fl-node-$id .xpro-woo-product-price-cls",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'price_margin_top',
			'margin-right'  => 'price_margin_right',
			'margin-bottom' => 'price_margin_bottom',
			'margin-left'   => 'price_margin_left',
		),
	)
);
