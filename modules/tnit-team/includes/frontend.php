<?php
/**
 * Render the frontend content.
 *
 * @package Xpro Addon
 * @sub-package Xpro Team Module
 *
 * @since 1.0.9
 */

// General classes
$classes = 'tnit-team-item text-center tnit-team-alignment';

if ( '1' === $settings->team_style ) {
	$classes .= ' tnit-team-Boxlayout';
} elseif ( '2' === $settings->team_style ) {
	$classes .= ' tnit-team-BoxOverlay';
} elseif ( '3' === $settings->team_style ) {
	$classes .= ' tnit-clipLayout';
} elseif ( '4' === $settings->team_style ) {
	$classes .= ' tnit-team-BoxCurve';
} elseif ( '6' === $settings->team_style ) {
	$classes .= ' tnit-team-FullBox';
}

// Social Link Classes
$social_link_classes = "tnit-social-links tnit-social-radiusStyle tnit-social-link-$settings->icon_style";

// Get Team Layouts
if ( '5' === $settings->team_style || '6' === $settings->team_style ) {
	require XPRO_ADDONS_FOR_BB_DIR . 'modules/tnit-team/layouts/team-v2.php';
} else {
	require XPRO_ADDONS_FOR_BB_DIR . 'modules/tnit-team/layouts/team-v1.php';
}
