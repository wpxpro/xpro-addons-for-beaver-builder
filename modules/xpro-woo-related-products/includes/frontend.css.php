<?php
/**
 *  xpro Woo Related Product
 *
 *  @package xpro Woo Related Product
 */

//heading typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .related h2:first-child",
	)
);

//price typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_typography',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .price",
	)
);

//sale price typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'sale_price_typography',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product del .woocommerce-Price-amount",
	)
);

//badge typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'badge_typography',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .onsale",
	)
);

//btn typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'btn_typography',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .button, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button",
	)
);

//title typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_typography',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-loop-product__title",
	)
);


if ( 'no' === $settings->show_heading ) :
	//show heading
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related h2:first-child",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

if ( 'no' === $settings->show_title ) :
	//show title
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related .products .woocommerce-loop-product__title",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

if ( 'no' === $settings->show_img ) :
	//show img
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related .products .attachment-woocommerce_thumbnail",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

if ( $settings->img_width ) :
	//img width
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related .products .attachment-woocommerce_thumbnail",
			'props'    => array(
				'width' => $settings->img_width . 'px',
			),
		)
	);
endif;

//img width
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_border_settings',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .related .products .attachment-woocommerce_thumbnail",
	)
);

//img padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_padding',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .related .products .attachment-woocommerce_thumbnail",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'img_padding_top',
			'padding-right'  => 'img_padding_right',
			'padding-bottom' => 'img_padding_bottom',
			'padding-left'   => 'img_padding_left',
		),
	)
);
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_margin',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .related .products .attachment-woocommerce_thumbnail",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'img_margin_top',
			'margin-right'  => 'img_margin_right',
			'margin-bottom' => 'img_margin_bottom',
			'margin-left'   => 'img_margin_left',
		),
	)
);

if ( 'no' === $settings->show_price ) :
	//show price
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related .products .price",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

if ( 'no' === $settings->show_rating ) :
	//show rating
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related .products .star-rating",
			'props'    => array(
				'display' => 'none !important',
			),
		)
	);
endif;

if ( 'no' === $settings->display_sale_badge ) :
	//show add to cart
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related .products .onsale",
			'props'    => array(
				'display' => 'none !important',
			),
		)
	);
endif;

if ( 'no' === $settings->show_add_to_cart ) :
	//show add to cart
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related .products a.add_to_cart_button",
			'props'    => array(
				'display' => 'none !important',
			),
		)
	);
endif;

//heading color/bg color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .related h2:first-child",
		'props'    => array(
			'color'            => $settings->heading_text_color,
			'background-color' => $settings->heading_bg_color,
		),
	)
);

// heading padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_padding',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .related h2:first-child",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'heading_padding_top',
			'padding-right'  => 'heading_padding_right',
			'padding-bottom' => 'heading_padding_bottom',
			'padding-left'   => 'heading_padding_left',
		),
	)
);

// heading margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_margin',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .related h2:first-child",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'heading_margin_top',
			'margin-right'  => 'heading_margin_right',
			'margin-bottom' => 'heading_margin_bottom',
			'margin-left'   => 'heading_margin_left',
		),
	)
);


//heading btn border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'heading_btn_border',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .related h2:first-child",
	)
);

if ( 'left' === $settings->content_alignment ) :
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-LoopProduct-link .star-rating",
			'props'    => array(
				'margin-left'  => '0',
				'margin-right' => 'auto',
			),
		)
	);
	//content alignment
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .up-sells .products h2.star-rating.price.button",
			'props'    => array(
				'text-align' => 'left',
			),
		)
	);
	//alignment left
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-loop-product__title, .fl-node-$id .xpro-woo-related-product-cls .products .product .price, .fl-node-$id .xpro-woo-related-product-cls .products .product .price, .fl-node-$id .xpro-woo-related-product-cls .products .product a.button, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button",
			'props'    => array(
				'text-align' => 'left !important',
			),
		)
	);
endif;

if ( 'center' === $settings->content_alignment ) :
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-LoopProduct-link .star-rating",
			'props'    => array(
				'margin-left'  => 'auto',
				'margin-right' => 'auto',
			),
		)
	);
endif;

if ( 'right' === $settings->content_alignment ) :
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-LoopProduct-link .star-rating",
			'props'    => array(
				'margin-left'  => 'auto',
				'margin-right' => '0',
			),
		)
	);
	//alignment right
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-loop-product__title, .fl-node-$id .xpro-woo-related-product-cls .products .product .price, .fl-node-$id .xpro-woo-related-product-cls .products .product .price, .fl-node-$id .xpro-woo-related-product-cls .products .product a.button, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button",
			'props'    => array(
				'text-align' => 'right !important',
			),
		)
	);
endif;

//title color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-loop-product__title",
		'props'    => array(
			'color' => $settings->title_color,
		),
	)
);

//title padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_padding',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-loop-product__title",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'title_padding_top',
			'padding-right'  => 'title_padding_right',
			'padding-bottom' => 'title_padding_bottom',
			'padding-left'   => 'title_padding_left',
		),
	)
);

//title margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_margin',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-loop-product__title",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'title_margin_top',
			'margin-right'  => 'title_margin_right',
			'margin-bottom' => 'title_margin_bottom',
			'margin-left'   => 'title_margin_left',
		),
	)
);

//Rating color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .star-rating span:before",
		'props'    => array(
			'color' => $settings->fg_color,
		),
	)
);

//rating bg color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .star-rating:before",
		'props'    => array(
			'color' => $settings->bg_color,
		),
	)
);

//Rating margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'rating_margin',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .star-rating",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'rating_margin_top',
			'margin-right'  => 'rating_margin_right',
			'margin-bottom' => 'rating_margin_bottom',
			'margin-left'   => 'rating_margin_left',
		),
	)
);

//rating size
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .star-rating",
		'props'    => array(
			'font-size' => $settings->rating_size . 'px',
		),
	)
);

//price color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .woocommerce-Price-amount",
		'props'    => array(
			'color' => $settings->price_color,
		),
	)
);

//sale price color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product del .woocommerce-Price-amount",
		'props'    => array(
			'color'           => $settings->sale_price_color,
			'text-decoration' => 'line-through',
		),
	)
);

//price padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_padding',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .price",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'price_padding_top',
			'padding-right'  => 'price_padding_right',
			'padding-bottom' => 'price_padding_bottom',
			'padding-left'   => 'price_padding_left',
		),
	)
);

//price margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'price_margin',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .price",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'price_margin_top',
			'margin-right'  => 'price_margin_right',
			'margin-bottom' => 'price_margin_bottom',
			'margin-left'   => 'price_margin_left',
		),
	)
);

//badge color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .onsale",
		'props'    => array(
			'color'            => $settings->badge_color,
			'background-color' => $settings->badge_bg_color,
		),
	)
);

//badge padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'badge_padding',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .onsale",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'badge_padding_top',
			'padding-right'  => 'badge_padding_right',
			'padding-bottom' => 'badge_padding_bottom',
			'padding-left'   => 'badge_padding_left',
		),
	)
);

//badge margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'badge_margin',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .onsale",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'badge_margin_top',
			'margin-right'  => 'badge_margin_right',
			'margin-bottom' => 'badge_margin_bottom',
			'margin-left'   => 'badge_margin_left',
		),
	)
);

//badge border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'badge_border_settings',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .onsale",
	)
);

//button color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .button, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button",
		'props'    => array(
			'color'            => $settings->button_color,
			'background-color' => $settings->button_bg_color,
			'border-color'     => $settings->button_border_color,
		),
	)
);

//btn hover color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xpro-woo-related-product-cls .products .product .button:hover, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button:hover",
		'props'    => array(
			'color'            => $settings->button_hv_color,
			'background-color' => $settings->button_bg_hv_color,
		),
	)
);

//button padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_padding',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .button, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'button_padding_top',
			'padding-right'  => 'button_padding_right',
			'padding-bottom' => 'button_padding_bottom',
			'padding-left'   => 'button_padding_left',
		),
	)
);

//button margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'button_margin',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .button, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'button_margin_top',
			'margin-right'  => 'button_margin_right',
			'margin-bottom' => 'button_margin_bottom',
			'margin-left'   => 'button_margin_left',
		),
	)
);

//button border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'btn_border_settings',
		'selector'     => ".fl-node-$id .xpro-woo-related-product-cls .products .product .button, .fl-node-$id .xpro-woo-related-product-cls .products .product a.add_to_cart_button",
	)
);
