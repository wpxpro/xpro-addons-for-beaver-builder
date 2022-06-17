<?php
do_action( 'tnit_post_before_image', $settings, $this );

if ( $fallback ) {
	echo wp_get_attachment_image( $settings->image_fallback, $settings->image_size );
} else {
	the_post_thumbnail( $settings->image_size );
}

do_action( 'tnit_post_after_image', $settings, $this );
