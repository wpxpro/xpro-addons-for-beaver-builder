<?php

/**
 * Xpro Team front-end CSS php file
 *
 * @package Xpro Addon
 * @sub-package Xpro Team Module
 *
 * @since 1.0.9
 */

if ( 'left' === $settings->team_alignment ) {
	$team_align       = 'left';
	$team_margin_left = '0px';
} elseif ( 'center' === $settings->team_alignment ) {
	$team_align = 'center';
} elseif ( 'right' === $settings->team_alignment ) {
	$team_align        = 'right';
	$team_margin_right = '0px';
}

//team alignment
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-alignment",
		'props'    => array(
			'text-align' => $team_align,
		),
	)
);

//alignment classes
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-alignment .tnit-thumb, .fl-node-$id .tnit-team-alignment .tnit-separator",
		'props'    => array(
			'margin-left'  => ( 'left' === $settings->team_alignment ) ? ( $team_margin_left ) : '',
			'margin-right' => ( 'right' === $settings->team_alignment ) ? ( $team_margin_right ) : '',
		),
	)
);

// Box colors, shadow
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-Boxlayout,.fl-node-$id .tnit-team-BoxOverlay .tnit-text,.fl-node-$id .tnit-team-BoxCurve,.fl-node-$id .tnit-clipLayout",
		'props'    => array(
			'background-color' => $settings->box_bg_color,
			'box-shadow'       => FLBuilderColor::shadow( $settings->box_shadow ),
		),
	)
);

// Box padding
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'box_padding',
		'selector'     => ".fl-node-$id .tnit-team-Boxlayout,.fl-node-$id .tnit-team-BoxOverlay .tnit-text,.fl-node-$id .tnit-team-BoxCurve,.fl-node-$id .tnit-thumbFull .tnit-caption,.fl-node-$id .tnit-thumbOverlap .tnit-caption,.fl-node-$id .tnit-clipLayout",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'box_padding_top',
			'padding-right'  => 'box_padding_right',
			'padding-bottom' => 'box_padding_bottom',
			'padding-left'   => 'box_padding_left',
		),
	)
);

// Box overlay color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-BoxOverlay .tnit-text:before,.fl-node-$id .tnit-thumbFull .tnit-caption,.fl-node-$id .tnit-thumbOverlap .tnit-caption",
		'props'    => array(
			'background-color' => $settings->box_bg_overlay_color,
		),
	)
);

// Box overlay color - Style 4
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-BoxCurve:before,.fl-node-$id .tnit-team-BoxCurve:after",
		'props'    => array(
			'background-color' => $settings->box_bg_overlay_color,
			'border-top-color' => $settings->box_bg_overlay_color,
		),
	)
);

// Box overlay border colors - Style 5
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-thumbFull .tnit-caption:before",
		'props'    => array(
			'border-right-color' => $settings->box_overlay_border_color,
			'border-top-color'   => $settings->box_overlay_border_color,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-thumbFull .tnit-caption:after",
		'props'    => array(
			'border-left-color'   => $settings->box_overlay_border_color,
			'border-bottom-color' => $settings->box_overlay_border_color,
		),
	)
);

// Box colors - Style 6
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-thumbOverlap .tnit-text:before",
		'props'    => array(
			'background-color' => $settings->box_bg_color,
		),
	)
);
// Box Overall hover colors - Style 6
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-item:hover .tnit-text .title,.fl-node-$id .tnit-team-item:hover .tnit-text p,.fl-node-$id .tnit-team-item:hover .tnit-text .desination",
		'enabled'  => '2' === $settings->team_style || '4' === $settings->team_style || '6' === $settings->team_style,
		'props'    => array(
			'color' => $settings->overall_hvr_color,
		),
	)
);

FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-item:hover .tnit-separator",
		'enabled'  => '2' === $settings->team_style || '4' === $settings->team_style || '6' === $settings->team_style,
		'props'    => array(
			'border-color' => $settings->overall_hvr_color,
		),
	)
);
// Box padding - Style 6
FLBuilderCSS::dimension_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'content_padding',
		'selector'     => ".fl-node-$id .tnit-thumbOverlap .tnit-text",
		'unit'         => 'px',
		'props'        => array(
			'padding-top'    => 'content_padding_top',
			'padding-right'  => 'content_padding_right',
			'padding-bottom' => 'content_padding_bottom',
			'padding-left'   => 'content_padding_left',
		),
	)
);

// Photo size
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-Boxlayout .tnit-thumb,.fl-node-$id .tnit-team-BoxCurve .tnit-thumb",
		'props'    => array(
			'background-color' => $settings->img_bg_color,
		),
	)
);

FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_size',
		'selector'     => ".fl-node-$id .tnit-team-Boxlayout .tnit-thumb,.fl-node-$id .tnit-team-BoxCurve .tnit-thumb,.fl-node-$id .tnit-clipLayout .tnit-thumb",
		'prop'         => 'height',
		'unit'         => 'px',
	)
);

FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_size',
		'selector'     => ".fl-node-$id .tnit-team-Boxlayout .tnit-thumb,.fl-node-$id .tnit-team-BoxCurve .tnit-thumb",
		'prop'         => 'width',
		'unit'         => 'px',
	)
);

// Photo margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_margin_top',
		'selector'     => ".fl-node-$id .tnit-team-Boxlayout .tnit-thumb,.fl-node-$id .tnit-team-BoxCurve .tnit-thumb",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);

// Photo margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'img_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-team-Boxlayout .tnit-thumb,.fl-node-$id .tnit-team-BoxCurve .tnit-thumb",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Name typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'name_font',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text .title",
	)
);

// Name color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-item .tnit-text .title",
		'props'    => array(
			'color' => $settings->name_color,
		),
	)
);

// Name margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'name_margin_top',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text .title",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);

// Name margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'name_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text .title",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Name typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'designation_font',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text .desination",
	)
);

// Name color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-item .tnit-text .desination",
		'props'    => array(
			'color' => $settings->designation_color,
		),
	)
);

// Name margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'designation_margin_top',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text .desination",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);

// Name margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'designation_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text .desination",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Name typography
FLBuilderCSS::typography_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'description_font',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text p",
	)
);

// Name color
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-team-item .tnit-text p",
		'props'    => array(
			'color' => $settings->description_color,
		),
	)
);

// Name margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'description_margin_top',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text p",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);

// Name margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'description_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-team-item .tnit-text p",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);

// Social Links size - conditional
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-social-link-circle li a,.fl-node-$id .tnit-social-link-square li a",
		'enabled'  => 'circle' === $settings->icon_style || 'square' === $settings->icon_style,
		'props'    => array(
			'font-size' => ( '' !== $settings->icon_size ) ? $settings->icon_size . 'px' : '',
			'width'     => ( '' !== $settings->icon_size ) ? ( $settings->icon_size / 2 ) * 5 . 'px' : '',
			'height'    => ( '' !== $settings->icon_size ) ? ( $settings->icon_size / 2 ) * 5 . 'px' : '',
		),
	)
);

// Social Links size
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-social-link-custom li a",
		'enabled'  => 'custom' === $settings->icon_style,
		'props'    => array(
			'font-size' => ( '' !== $settings->icon_size ) ? $settings->icon_size . 'px' : '',
			'width'     => ( '' !== $settings->icon_bg_size ) ? $settings->icon_bg_size . 'px' : '',
			'height'    => ( '' !== $settings->icon_bg_size ) ? $settings->icon_bg_size . 'px' : '',
		),
	)
);

// Social Links spacing
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-social-links li+li",
		'props'    => array(
			'margin-left' => ( '' !== $settings->icon_spacing ) ? $settings->icon_spacing . 'px' : '',
		),
	)
);

// Social Links border
FLBuilderCSS::border_field_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'icon_border',
		'selector'     => ".fl-node-$id .tnit-social-link-custom li a",
	)
);

// Social Links colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-social-links li a",
		'props'    => array(
			'color'            => $settings->icon_color,
			'background-color' => $settings->icon_bg_color,
		),
	)
);

// Social Links hover colors
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-social-links li a:hover",
		'props'    => array(
			'color' => $settings->icon_hover_color,
		),
	)
);
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-social-link-custom li a:hover",
		'props'    => array(
			'border-color' => $settings->icon_border_hover_color,
		),
	)
);

// Social Links before styles
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-social-radiusStyle li a:before",
		'props'    => array(
			'background-color'           => $settings->icon_bg_hover_color,
			'border-top-left-radius'     => ( '' !== $settings->icon_border && '' !== $settings->icon_border['radius']['top_left'] ) ? $settings->icon_border['radius']['top_left'] . 'px' : '',
			'border-top-right-radius'    => ( '' !== $settings->icon_border && '' !== $settings->icon_border['radius']['top_right'] ) ? $settings->icon_border['radius']['top_left'] . 'px' : '',
			'border-bottom-left-radius'  => ( '' !== $settings->icon_border && '' !== $settings->icon_border['radius']['bottom_left'] ) ? $settings->icon_border['radius']['top_left'] . 'px' : '',
			'border-bottom-right-radius' => ( '' !== $settings->icon_border && '' !== $settings->icon_border['radius']['bottom_right'] ) ? $settings->icon_border['radius']['top_left'] . 'px' : '',
		),
	)
);

// Separator alignment
FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-separator",
		'props'    => array(
			'border-bottom-style' => $settings->separator_style,
			'border-bottom-color' => $settings->separator_color,
			'border-bottom-width' => ( '' !== $settings->separator_thickness ) ? $settings->separator_thickness . 'px' : '',
			'width'               => ( '' !== $settings->separator_width ) ? $settings->separator_width . $settings->separator_width_unit : '',
			'margin-right'        => ( 'right' === $settings->separator_alignment ) ? '0px' : '',
			'margin-left'         => ( 'left' === $settings->separator_alignment ) ? '0px' : '',
		),
	)
);

FLBuilderCSS::rule(
	array(
		'selector' => ".fl-node-$id .tnit-separator",
		'props'    => array(
			'border-bottom-color' => $settings->separator_hcolor,
		),
	)
);

// Separator margin-top
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'separator_margin_top',
		'selector'     => ".fl-node-$id .tnit-separator",
		'prop'         => 'margin-top',
		'unit'         => 'px',
	)
);

// Separator margin-bottom
FLBuilderCSS::responsive_rule(
	array(
		'settings'     => $settings,
		'setting_name' => 'separator_margin_bottom',
		'selector'     => ".fl-node-$id .tnit-separator",
		'prop'         => 'margin-bottom',
		'unit'         => 'px',
	)
);
