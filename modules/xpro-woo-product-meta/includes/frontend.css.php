<?php
/**
 *  xpro Woo Products Meta
 *
 *  @package xpro Woo Products Meta
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

//meta heading typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_heading',
		'selector'     => ".fl-node-$id .product_meta .sku_wrapper, .fl-node-$id .product_meta .posted_in",
	)
);

//meta txt typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_typography',
		'selector'     => ".fl-node-$id .product_meta .sku_wrapper .sku",
	)
);

//meta typo for link
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_link_typo',
		'selector'     => ".fl-node-$id .product_meta .posted_in a",
	)
);

//show/hide sku
if ( 'no' === $settings->show_sku ) :
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .product_meta .sku_wrapper",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

//show/hide taxonomy
if ( 'no' === $settings->show_taxonomy ) :
	//display sky
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .product_meta .posted_in",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

//meta title color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .product_meta .sku_wrapper, .fl-node-$id .product_meta .posted_in",
		'props'    => array(
			'color' => $settings->meta_title_color,
		),
	)
);

//meta txt color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .product_meta .sku_wrapper .sku",
		'props'    => array(
			'color' => $settings->txt_color,
		),
	)
);

//link color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .product_meta .posted_in a",
		'props'    => array(
			'color' => $settings->link_color,
		),
	)
);

//padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_padding',
		'selector'     => ".fl-node-$id .product_meta",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'meta_padding_top',
			'padding-right'  => 'meta_padding_right',
			'padding-bottom' => 'meta_padding_bottom',
			'padding-left'   => 'meta_padding_left',
		),
	)
);

//meta space between
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .product_meta .posted_in",
		'props'    => array(
			'padding-left' => $settings->meta_spacing_bw . 'px',
		),
	)
);

//margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_margin',
		'selector'     => ".fl-node-$id .product_meta",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'meta_margin_top',
			'margin-right'  => 'meta_margin_right',
			'margin-bottom' => 'meta_margin_bottom',
			'margin-left'   => 'meta_margin_left',
		),
	)
);

//border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_border_settings',
		'selector'     => ".fl-node-$id .product_meta",
	)
);
