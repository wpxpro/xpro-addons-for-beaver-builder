<?php
/**
 * Default classes declaration
 *
 * @package Xpro Addon
 * @sub-package Xpro Team Module
 *
 * @since 1.0.9
**/
?>

<div class="<?php echo esc_attr( $classes ); ?>">

	<?php
		$module->render_image();
	?>
	<!--Testimonial Text Start-->
	<div class="tnit-text">
		<?php
			$module->render_member_name();
			$module->render_separator( 'below_name' );
			$module->render_designation();
			$module->render_separator( 'below_desg' );
			$module->render_description();
			$module->render_separator( 'below_desc' );

		if ( 'yes' === $settings->enable_social_icons ) {
			?>
			<!--Social Links Start-->
			<ul class="<?php echo esc_attr( $social_link_classes ); ?>">
				<?php
				$module->render_social_icons();
				?>
			</ul><!--Social Links End-->
		<?php } ?>
	</div><!--Testimonial Text End-->
</div>
