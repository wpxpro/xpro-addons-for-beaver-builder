<?php
/**
 * BB Blog Posts front-end CSS php file
 *
 * @package Creative Blog Module
 *
 * @since 1.0.29
 */

// Set default values

if ( '' === $settings->more_link_settings->button_padding_top ) {
	$settings->more_link_settings->button_padding_top = 8;
}
if ( '' === $settings->more_link_settings->button_padding_right ) {
	$settings->more_link_settings->button_padding_right = 20;
}
if ( '' === $settings->more_link_settings->button_padding_bottom ) {
	$settings->more_link_settings->button_padding_bottom = 8;
}
if ( '' === $settings->more_link_settings->button_padding_left ) {
	$settings->more_link_settings->button_padding_left = 20;
}

if ( '1' === $settings->layout_style ) {
	FLBuilderCSS::rule(
		array(
			'selector' => ".fl-node-$id .tnit-blog-item",
			'props'    => array(
				'display'        => 'flex',
				'flex-direction' => 'column',
			),
		)
	);
}

FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-post-grid .xpro-grid .xpro-item .eee",
		'props'    => array(
			'flex' => 'none',
		),
	)
);

// Gallery grid numbers
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-post-grid .xpro-grid",
		'props'    => array(
			'margin' => ( '' !== $settings->posts_spacing ) ? '-' . $settings->posts_spacing / 2 . 'px' : '',
		),
	)
);
// Gallery grid numbers
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-post-grid .xpro-grid .xpro-item",
		'props'    => array(
			'flex'         => ( '' !== $settings->number_of_posts ) ? ( 100 / $settings->number_of_posts ) . '%' : '33.33%',
			'-webkit-flex' => ( '' !== $settings->number_of_posts ) ? ( 100 / $settings->number_of_posts ) . '%' : '33.33%',
			'-moz-flex'    => ( '' !== $settings->number_of_posts ) ? ( 100 / $settings->number_of_posts ) . '%' : '33.33%',
			'-ms-flex'     => ( '' !== $settings->number_of_posts ) ? ( 100 / $settings->number_of_posts ) . '%' : '33.33%',
			'max-width'    => ( '' !== $settings->number_of_posts ) ? ( 100 / $settings->number_of_posts ) . '%' : '33.33%',
			'padding'      => ( '' !== $settings->posts_spacing ) ? $settings->posts_spacing / 2 . 'px' : '',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-post-grid .xpro-grid .xpro-item",
		'media'    => 'medium',
		'props'    => array(
			'flex'         => ( '' !== $settings->number_of_posts_medium ) ? 100 / $settings->number_of_posts_medium . '%' : '50%',
			'-webkit-flex' => ( '' !== $settings->number_of_posts_medium ) ? 100 / $settings->number_of_posts_medium . '%' : '50%',
			'-moz-flex'    => ( '' !== $settings->number_of_posts_medium ) ? 100 / $settings->number_of_posts_medium . '%' : '50%',
			'-ms-flex'     => ( '' !== $settings->number_of_posts_medium ) ? 100 / $settings->number_of_posts_medium . '%' : '50%',
			'max-width'    => ( '' !== $settings->number_of_posts_medium ) ? 100 / $settings->number_of_posts_medium . '%' : '',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-post-grid .xpro-grid .xpro-item",
		'media'    => 'responsive',
		'props'    => array(
			'flex'         => ( '' !== $settings->number_of_posts_responsive ) ? 100 / $settings->number_of_posts_responsive . '%' : '100%',
			'-webkit-flex' => ( '' !== $settings->number_of_posts_responsive ) ? 100 / $settings->number_of_posts_responsive . '%' : '100%',
			'-moz-flex'    => ( '' !== $settings->number_of_posts_responsive ) ? 100 / $settings->number_of_posts_responsive . '%' : '100%',
			'-ms-flex'     => ( '' !== $settings->number_of_posts_responsive ) ? 100 / $settings->number_of_posts_responsive . '%' : '100%',
			'max-width'    => ( '' !== $settings->number_of_posts_responsive ) ? 100 / $settings->number_of_posts_responsive . '%' : '100%',
		),
	)
);

// More Link Typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings->more_link_settings,
		'setting_name' => 'more_link_typography',
		'selector'     => ".fl-node-$id .tnit-blog .tnit-blog-btn,
							.fl-node-$id .tnit-blog .tnit-blog-more-link-text,
							.fl-node-$id .tnit-blog-style-3 .tnit-post-content-footer .tnit-post-meta-list li,
							.fl-node-$id .tnit-blog-style-4 .tnit-post-content-footer .tnit-post-meta-list li",
	)
);
// More Link Alignment
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-btn-outer",
		'media'    => 'default',
		'props'    => array(
			'text-align' => ( '' !== $settings->more_link_settings->more_link_typography->text_align ) ? $settings->more_link_settings->more_link_typography->text_align : '',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-btn-outer",
		'media'    => 'medium',
		'props'    => array(
			'text-align' => ( '' !== $settings->more_link_settings->more_link_typography_medium->text_align ) ? $settings->more_link_settings->more_link_typography_medium->text_align : '',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-btn-outer",
		'media'    => 'responsive',
		'props'    => array(
			'text-align' => ( '' !== $settings->more_link_settings->more_link_typography_responsive->text_align ) ? $settings->more_link_settings->more_link_typography_responsive->text_align : '',
		),
	)
);
// More Link Colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog .tnit-blog-btn,
						.fl-node-$id .tnit-blog .tnit-blog-more-link-text,
						.fl-node-$id .tnit-blog-style-3 .tnit-post-content-footer .tnit-post-meta-list li a,
						.fl-node-$id .tnit-blog-style-4 .tnit-post-content-footer .tnit-post-meta-list li a",
		'props'    => array(
			'color' => ( '' !== $settings->more_link_settings->button_color ) ? $settings->more_link_settings->button_color : '',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog .tnit-blog-btn:hover,
						.fl-node-$id .tnit-blog .tnit-blog-more-link-text:hover,
						.fl-node-$id .tnit-blog-style-3 .tnit-post-content-footer .tnit-post-meta-list li a:hover,
						.fl-node-$id .tnit-blog-style-4 .tnit-post-content-footer .tnit-post-meta-list li a:hover",
		'props'    => array(
			'color' => ( '' !== $settings->more_link_settings->button_hvr_color ) ? $settings->more_link_settings->button_hvr_color : '',
		),
	)
);
// More Link Background Colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog .tnit-blog-btn",
		'enabled'  => 'button' === $settings->more_link_settings->link_type,
		'props'    => array(
			'background-color' => $settings->more_link_settings->button_bg_color,
			'text-align'       => 'center',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog .tnit-blog-btn:hover",
		'enabled'  => 'button' === $settings->more_link_settings->link_type,
		'props'    => array(
			'background-color' => $settings->more_link_settings->button_bg_hvr_color,
			'border-color'     => $settings->more_link_settings->button_border_hvr_color,
		),
	)
);
// More Link Button Width
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog .tnit-blog-btn",
		'enabled'  => 'button' === $settings->more_link_settings->link_type,
		'media'    => 'default',
		'props'    => array(
			'width' => ( '' !== $settings->more_link_settings->button_width ) ? $settings->more_link_settings->button_width . $settings->more_link_settings->button_width_unit : 'auto',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog .tnit-blog-btn",
		'enabled'  => 'button' === $settings->more_link_settings->link_type,
		'media'    => 'medium',
		'props'    => array(
			'width' => ( '' !== $settings->more_link_settings->button_width_medium ) ? $settings->more_link_settings->button_width_medium . $settings->more_link_settings->button_width_medium_unit : '',
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog .tnit-blog-btn",
		'enabled'  => 'button' === $settings->more_link_settings->link_type,
		'media'    => 'responsive',
		'props'    => array(
			'width' => ( '' !== $settings->more_link_settings->button_width_responsive ) ? $settings->more_link_settings->button_width_responsive . $settings->more_link_settings->button_width_responsive_unit : '',
		),
	)
);

if ( 'button' === $settings->more_link_settings->link_type ) {
	// More Link Border
	FLBuilderCSS::border_field_rule(
		array(
			'settings'     => $settings->more_link_settings,
			'setting_name' => 'button_border',
			'selector'     => ".fl-node-$id .tnit-blog .tnit-blog-btn",
		)
	);
	// More Link Padding
	FLBuilderCSS::dimension_field_rule(
		array(
			'settings'     => $settings->more_link_settings,
			'setting_name' => 'button_padding',
			'selector'     => ".fl-node-$id .tnit-blog .tnit-blog-btn",
			'unit'         => 'px',
			'props'        => array(
				'padding-top'    => 'button_padding_top',
				'padding-right'  => 'button_padding_right',
				'padding-bottom' => 'button_padding_bottom',
				'padding-left'   => 'button_padding_left',
			),
		)
	);
}

// More Link Margin top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings->more_link_settings,
		'setting_name' => 'button_margin_top',
		'selector'     => ".fl-node-$id .tnit-blog-btn-outer",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);
// More Link Margin Bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings->more_link_settings,
		'setting_name' => 'button_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-blog-btn-outer",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Numbers Border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'numbers_border',
		'selector'     => ".fl-node-$id .tnit-pagination li a.page-numbers,
							.fl-node-$id .tnit-pagination li span.page-numbers",
	)
);
// Numbers Colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-pagination li a.page-numbers",
		'props'    => array(
			'color'            => $settings->numbers_color,
			'background-color' => $settings->numbers_bg_color,
		),
	)
);
// Numbers Active Colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-pagination li a.page-numbers:hover,
						.fl-node-$id .tnit-pagination li span.current",
		'props'    => array(
			'color'            => $settings->numbers_active_color,
			'background-color' => $settings->numbers_bg_active_color,
			'border-color'     => $settings->numbers_border_active_color,
		),
	)
);

// Title typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_typography',
		'selector'     => ".fl-node-$id .tnit-blog-title",
	)
);
// Title color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-title a",
		'props'    => array(
			'color' => $settings->title_color,
		),
	)
);
// Title hover color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-title a:hover",
		'props'    => array(
			'color' => $settings->title_hvr_color,
		),
	)
);
// Title margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_margin_top',
		'selector'     => ".fl-node-$id .tnit-blog-title",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);
// Title margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'title_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-blog-title",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Content typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'content_typography',
		'selector'     => ".fl-node-$id .tnit-blog-content-text *",
	)
);
// Content color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-content-text,.fl-node-$id .tnit-blog-content-text p",
		'props'    => array(
			'color' => $settings->content_color,
		),
	)
);
// Content hover color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-content-text:hover,.fl-node-$id .tnit-blog-content-text:hover p",
		'props'    => array(
			'color' => $settings->content_hvr_color,
		),
	)
);

// Content margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'content_margin_top',
		'selector'     => ".fl-node-$id .tnit-blog-content-text",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);

// Content margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'content_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-blog-content-text",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Post Info typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_typography',
		'selector'     => ".fl-node-$id .tnit-blog-style-1 .tnit-post-meta-list li,
							.fl-node-$id .tnit-blog-style-2 .tnit-post-meta-list li,
							.fl-node-$id .tnit-blog-style-1 .tnit-post-meta-list li a,
							.fl-node-$id .tnit-blog-style-1 .tnit-post-meta-list li span",
	)
);
// Post Info color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-1 .tnit-post-meta-list li,
						.fl-node-$id .tnit-blog-style-2 .tnit-post-meta-list li",
		'props'    => array(
			'color' => $settings->meta_color,
		),
	)
);
// Post Info Link color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-1 .tnit-post-meta-list li a,
						.fl-node-$id .tnit-blog-style-2 .tnit-post-meta-list li a",
		'props'    => array(
			'color' => $settings->meta_link_color,
		),
	)
);
// Post Info Link hover color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-1 .tnit-post-meta-list li a:hover,
						.fl-node-$id .tnit-blog-style-2 .tnit-post-meta-list li a:hover",
		'props'    => array(
			'color' => $settings->meta_link_hvr_color,
		),
	)
);
// Post Info margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_margin_top',
		'selector'     => ".fl-node-$id .tnit-blog-style-1 .tnit-post-meta,
							.fl-node-$id .tnit-blog-style-2 .tnit-post-meta",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);
// Post Info margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-blog-style-1 .tnit-post-meta,
							.fl-node-$id .tnit-blog-style-2 .tnit-post-meta",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Post Item height
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'post_height',
		'selector'     => ".fl-node-$id .tnit-blog-style-4 .tnit-blog-thumb",
		'prop'         => 'height',
		'unit'         => 'px',
	)
);
// Post Item Background color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-1 .tnit-blog-item,
						.fl-node-$id .tnit-blog-style-2 .tnit-blog-item,
						.fl-node-$id .tnit-blog-style-3 .tnit-blog-item,
						.fl-node-$id .tnit-blog-style-3 .tnit-post-meta-separator .tnit-post-meta-list li,
						.fl-node-$id .tnit-blog-style-4 .tnit-blog-content",
		'props'    => array(
			'background-color' => $settings->post_bg_color,
		),
	)
);
// Overall Alignment
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'overall_alignment',
		'selector'     => ".fl-node-$id .tnit-blog-style-1 .tnit-blog-content,
							.fl-node-$id .tnit-blog-style-2 .tnit-blog-content",
		'prop'         => 'text-align',
	)
);
// Set default values
if ( ! empty( $settings->post_bg_color ) ) {

	if ( '' === $settings->content_padding_top ) {
		$settings->content_padding_top = 30;
	}
	if ( '' === $settings->content_padding_right ) {
		$settings->content_padding_right = 30;
	}
	if ( '' === $settings->content_padding_bottom ) {
		$settings->content_padding_bottom = 30;
	}
	if ( '' === $settings->content_padding_left ) {
		$settings->content_padding_left = 30;
	}
}
// Content Padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'content_padding',
		'selector'     => ".fl-node-$id .tnit-blog .tnit-blog-content",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'content_padding_top',
			'padding-right'  => 'content_padding_right',
			'padding-bottom' => 'content_padding_bottom',
			'padding-left'   => 'content_padding_left',
		),
	)
);
// Overall Padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'post_padding',
		'selector'     => ".fl-node-$id .tnit-blog .tnit-blog-item,
							.fl-node-$id .tnit-blog-style-4 .tnit-blog-caption",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'post_padding_top',
			'padding-right'  => 'post_padding_right',
			'padding-bottom' => 'post_padding_bottom',
			'padding-left'   => 'post_padding_left',
		),
	)
);

// Meta Categories typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'cat_typography',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-blog-caption .tnit-post-categories a,
							.fl-node-$id .tnit-blog-style-4 .tnit-blog-caption .tnit-post-categories a",
	)
);
// Meta Categories border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'cat_border',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-blog-caption .tnit-post-categories a,
							.fl-node-$id .tnit-blog-style-4 .tnit-blog-caption .tnit-post-categories a",
	)
);
// Meta Categories color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-3 .tnit-blog-caption .tnit-post-categories a,
						.fl-node-$id .tnit-blog-style-4 .tnit-blog-caption .tnit-post-categories a",
		'props'    => array(
			'color'            => $settings->cat_color,
			'background-color' => $settings->cat_bg_color,
		),
	)
);
// Meta Categories Hover color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-3 .tnit-blog-caption .tnit-post-categories a:hover,
						.fl-node-$id .tnit-blog-style-4 .tnit-blog-caption .tnit-post-categories a:hover",
		'props'    => array(
			'color'            => $settings->cat_hvr_color,
			'background-color' => $settings->cat_bg_hvr_color,
			'border-color'     => $settings->cat_border_hvr_color,
		),
	)
);
// Meta Categories Padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'cat_padding',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-blog-caption .tnit-post-categories a,
							.fl-node-$id .tnit-blog-style-4 .tnit-blog-caption .tnit-post-categories a",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'cat_padding_top',
			'padding-right'  => 'cat_padding_right',
			'padding-bottom' => 'cat_padding_bottom',
			'padding-left'   => 'cat_padding_left',
		),
	)
);
// Meta Categories margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'cat_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-blog-caption,
							.fl-node-$id .tnit-blog-style-4 .tnit-post-categories-outer",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Meta Author typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'author_typography',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-post-author-outer .tnit-post-meta-list li,
							.fl-node-$id .tnit-blog-style-4 .tnit-post-author-outer .tnit-post-meta-list li",
	)
);
// Meta Author colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-3 .tnit-post-author-outer .tnit-post-meta-list li a,
						.fl-node-$id .tnit-blog-style-4 .tnit-post-author-outer .tnit-post-meta-list li a",
		'props'    => array(
			'color' => $settings->author_color,
		),
	)
);
// Meta Author Hover colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-3 .tnit-post-author-outer .tnit-post-meta-list li a:hover,
						.fl-node-$id .tnit-blog-style-4 .tnit-post-author-outer .tnit-post-meta-list li a:hover",
		'props'    => array(
			'color' => $settings->author_hvr_color,
		),
	)
);
// Meta Author margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'author_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-post-author-outer,
							.fl-node-$id .tnit-blog-style-4 .tnit-post-author-outer",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Meta Separator typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'separator_typography',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-post-meta-separator .tnit-post-meta-list li",
	)
);
// Meta Separator colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-3 .tnit-post-meta-separator .tnit-post-meta-list li",
		'props'    => array(
			'color' => $settings->separator_color,
		),
	)
);
// Meta Separator border
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-3 .tnit-post-meta-separator .tnit-post-meta-list::before",
		'props'    => array(
			'border-bottom-style' => $settings->separator_style,
			'border-bottom-width' => ( '' !== $settings->separator_size ) ? $settings->separator_size . 'px' : '',
			'border-bottom-color' => $settings->separator_color,
			'top'                 => ( '' !== $settings->separator_size ) ? 'calc(50% - ' . $settings->separator_size / 2 . 'px)' : '',
		),
	)
);
// Meta Separator margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'separator_margin_top',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-post-meta-separator",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);
// Meta Separator margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'separator_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-blog-style-3 .tnit-post-meta-separator",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);
// Meta Date typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_date_typography',
		'selector'     => ".fl-node-$id .tnit-blog-style-4 .tnit-post-date-outer .tnit-post-date",
	)
);
// Meta Date border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'meta_date_border',
		'selector'     => ".fl-node-$id .tnit-blog-style-4 .tnit-post-date-outer .tnit-post-meta-list",
	)
);
// Meta Date colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-4 .tnit-post-date-outer .tnit-post-date",
		'props'    => array(
			'color' => $settings->meta_date_color,
		),
	)
);
// Meta Date colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-4 .tnit-post-date-outer .tnit-post-meta-list",
		'props'    => array(
			'background-color' => $settings->meta_date_bg_color,
			'width'            => ( '' !== $settings->meta_date_typography && '' !== $settings->meta_date_typography['font_size']['length'] ) ? $settings->meta_date_typography['font_size']['length'] * 3.5 . 'px' : '',
			'height'           => ( '' !== $settings->meta_date_typography && '' !== $settings->meta_date_typography['font_size']['length'] ) ? $settings->meta_date_typography['font_size']['length'] * 3.5 . 'px' : '',
		),
	)
);
// Meta Date colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-blog-style-4 .tnit-post-date-outer",
		'props'    => array(
			'left'   => ( '' !== $settings->meta_date_typography && '' !== $settings->meta_date_typography['font_size']['length'] ) ? 'calc(50% - ' . ( $settings->meta_date_typography['font_size']['length'] * 3.5 ) / 2 . 'px)' : '',
			'bottom' => ( '' !== $settings->meta_date_typography && '' !== $settings->meta_date_typography['font_size']['length'] ) ? '-' . ( $settings->meta_date_typography['font_size']['length'] * 3.5 ) / 2 . 'px' : '',
		),
	)
);
