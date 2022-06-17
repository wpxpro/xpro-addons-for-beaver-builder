<?php
/**
 *  xpro Woo Products Rating
 *
 *  @package xpro Woo Products Rating
 */

if ( 'column' === $settings->select_layout ) :
	if ( 'left' === $settings->align ) :
		$align_p = 'start';
	elseif ( 'center' === $settings->align ) :
		$align_p = 'center';
	elseif ( 'right' === $settings->align ) :
		$align_p = 'end';
	endif;
	//layout type column
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper.woocommerce-product-rating",
			'props'    => array(
				'display'        => 'flex',
				'flex-direction' => 'column',
				'align-items'    => $align_p,
			),
		)
	);
endif;

if ( $settings->align ) :
	//display
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper.woocommerce-product-rating",
			'props'    => array(
				'display'         => 'flex',
				'justify-content' => $settings->align,
			),
		)
	);
endif;

//count typo
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'count_typography',
		'selector'     => ".fl-node-$id .xprowoo-product-rating-wrapper .woocommerce-rating-count",
	)
);

if ( $settings->rating_stars_size ) {
	//stars size
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper .star-rating",
			'props'    => array(
				'font-size' => $settings->rating_stars_size . 'px',
			),
		)
	);
}

if ( 'no' === $settings->show_stars ) :
	//display stars
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper .star-rating",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

//display count
if ( 'no' === $settings->show_count ) :
	//display sky
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper .woocommerce-rating-count",
			'props'    => array(
				'display' => 'none',
			),
		)
	);
endif;

FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper .star-rating span:before ",
		'props'    => array(
			'color' => $settings->fg_color,
		),
	)
);

//stars bg color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper .star-rating:before ",
		'props'    => array(
			'color' => $settings->bg_color,
		),
	)
);

//count color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .woocommerce-rating-count",
		'props'    => array(
			'color' => $settings->count_color,
		),
	)
);

//padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'rating_padding',
		'selector'     => ".fl-node-$id .xprowoo-product-rating-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'rating_padding_top',
			'padding-right'  => 'rating_padding_right',
			'padding-bottom' => 'rating_padding_bottom',
			'padding-left'   => 'rating_padding_left',
		),
	)
);

if ( $settings->rating_space_bw ) {
	//space btw
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .xprowoo-product-rating-wrapper .woocommerce-rating-count",
			'props'    => array(
				'padding-left' => $settings->rating_space_bw . 'px',
			),
		)
	);
}

//margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'rating_margin',
		'selector'     => ".fl-node-$id .xprowoo-product-rating-wrapper",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'rating_margin_top',
			'margin-right'  => 'rating_margin_right',
			'margin-bottom' => 'rating_margin_bottom',
			'margin-left'   => 'rating_margin_left',
		),
	)
);

//stars margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'stars_margin',
		'selector'     => ".fl-node-$id .xprowoo-product-rating-wrapper .star-rating",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'stars_margin_top',
			'margin-right'  => 'stars_margin_right',
			'margin-bottom' => 'stars_margin_bottom',
			'margin-left'   => 'stars_margin_left',
		),
	)
);

//count margin
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'count_margin',
		'selector'     => ".fl-node-$id .xprowoo-product-rating-wrapper .woocommerce-rating-count",
		'unit'         => 'px',
		'props'        => array(
			'margin-top'    => 'count_margin_top',
			'margin-right'  => 'count_margin_right',
			'margin-bottom' => 'count_margin_bottom',
			'margin-left'   => 'count_margin_left',
		),
	)
);
