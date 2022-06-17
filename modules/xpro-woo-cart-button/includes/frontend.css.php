<?php
/**
 *  xpro Woo Cart Button Module
 *
 *  @package XproWooCartButtonModule
 */


if ( 'bg-color' === $settings->btn_bg_type ) {
	$btn_background = $settings->button_bg_color;
} elseif ( 'bg-gradient' === $settings->btn_bg_type ) {
	$btn_background_gradient = FLBuilderColor::gradient( $settings->btn_background_gradient );
}

// btn color/gradient
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-btn-add-to-cart .woocommerce-variation-add-to-cart .single_add_to_cart_button.button, .fl-node-$id .xprowoo-product-action button.button, .fl-node-$id .woocommerce-variation-add-to-cart button",
		'props'    => array(
			'color'            => $settings->button_color,
			'background-color' => $btn_background,
			'background-image' => $btn_background_gradient,
		),
	)
);

if ( 'bg-color' === $settings->btn_bg_hv_type ) {
	$btn_background_hover = $settings->button_bg_color_hover;
} elseif ( 'bg-gradient' === $settings->btn_bg_hv_type ) {
	$btn_background_gradient_hover = FLBuilderColor::gradient( $settings->btn_hv_background_gradient );
}

// btn color/gradient
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-btn-add-to-cart .woocommerce-variation-add-to-cart .single_add_to_cart_button:hover.button:hover, .fl-node-$id .xprowoo-product-action button.button:hover, .fl-node-$id .woocommerce-variation-add-to-cart button:hover",
		'props'    => array(
			'color'            => $settings->button_color_hover,
			'background-color' => $btn_background_hover,
			'background-image' => $btn_background_gradient_hover,
		),
	)
);

//btn padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'btn_padding',
		'selector'     => ".fl-node-$id .xpro-btn-add-to-cart .woocommerce-variation-add-to-cart .single_add_to_cart_button.button, .fl-node-$id .xprowoo-product-action button.button, .fl-node-$id .woocommerce-variation-add-to-cart button",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'btn_padding_top',
			'padding-right'  => 'btn_padding_right',
			'padding-bottom' => 'btn_padding_bottom',
			'padding-left'   => 'btn_padding_left',
		),
	)
);

//btn margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'btn_margin',
		'selector'     => ".fl-node-$id .xpro-btn-add-to-cart .woocommerce-variation-add-to-cart .single_add_to_cart_button.button, .fl-node-$id .xprowoo-product-action button.button, .fl-node-$id .woocommerce-variation-add-to-cart button",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'btn_margin_top',
			'margin-right'  => 'btn_margin_right',
			'margin-bottom' => 'btn_margin_bottom',
			'margin-left'   => 'btn_margin_left',
		),
	)
);

//btn border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'btn_border',
		'selector'     => ".fl-node-$id .xpro-btn-add-to-cart .woocommerce-variation-add-to-cart .single_add_to_cart_button.button, .fl-node-$id .xprowoo-product-action button.button, .fl-node-$id .woocommerce-variation-add-to-cart button",
	)
);

//color variation size
if ( $settings->color_variation_size ) {
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .attribute-pa_color .xpro-woo-varation-color-type",
			'props'    => array(
				'min-width'  => $settings->color_variation_size . 'px',
				'max-width'  => $settings->color_variation_size . 'px',
				'min-height' => $settings->color_variation_size . 'px',
				'max-height' => $settings->color_variation_size . 'px',
			),
		)
	);
}

//color variation border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'color_variation_border',
		'selector'     => ".fl-node-$id .attribute-pa_color .xpro-woo-varation-color-type, .fl-node-$id .attribute-pa_color .xpro-woo-varation-color-type input",
	)
);

//size variation color/bg color
if ( $settings->size_variation_bg_color ) {
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .attribute-pa_size .xpro-woo-varation-select-type, .fl-node-$id .attribute-logo .xpro-woo-varation-select-type",
			'props'    => array(
				'color'            => $settings->size_variation_color,
				'background-color' => $settings->size_variation_bg_color,
			),
		)
	);
}

//size variation padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'size_variation_padding',
		'selector'     => ".fl-node-$id .attribute-pa_size .xpro-woo-varation-select-type, .fl-node-$id .attribute-logo .xpro-woo-varation-select-type",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'size_variation_padding_top',
			'padding-right'  => 'size_variation_padding_right',
			'padding-bottom' => 'size_variation_padding_bottom',
			'padding-left'   => 'size_variation_padding_left',
		),
	)
);

//size variation border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'size_variation_border',
		'selector'     => ".fl-node-$id .attribute-pa_size .xpro-woo-varation-select-type, .fl-node-$id .attribute-logo .xpro-woo-varation-select-type",
	)
);

//input color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xprowoo-themer-module-wrapper .quantity .qty",
		'props'    => array(
			'color' => $settings->input_color,
		),
	)
);
//input bg color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xprowoo-themer-module-wrapper .quantity .qty",
		'props'    => array(
			'background-color' => $settings->input_bg_color,
		),
	)
);
//clear btn color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-custom-variation .xpro-woo-variation-inner-cls-2 .reset_variations",
		'props'    => array(
			'color' => $settings->clear_btn_color,
		),
	)
);
//clear btn bg color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-custom-variation .xpro-woo-variation-inner-cls-2 .reset_variations",
		'props'    => array(
			'background-color' => $settings->clear_btn_bg_color,
		),
	)
);

//btn typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_typography',
		'selector'     => ".fl-node-$id .xpro-btn-add-to-cart .woocommerce-variation-add-to-cart .single_add_to_cart_button.button, .fl-node-$id .xprowoo-product-action button.button, .fl-node-$id .woocommerce-variation-add-to-cart button",
	)
);

//label typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'label_typography',
		'selector'     => ".fl-node-$id .xpro-woo-varation-select-type label",
	)
);
