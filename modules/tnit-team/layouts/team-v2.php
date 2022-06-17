<?php
/**
 * Default classes declaration
 *
 * @package Xpro Addon
 * @sub-package Xpro Team Module
 *
 * @since 1.0.9
**/

// General classes
$figure_classes = 'tnit-thumb';

if ( '5' === $settings->team_style ) {
	$figure_classes .= ' tnit-thumbFull';
} elseif ( '6' === $settings->team_style ) {
	$figure_classes .= ' tnit-thumbOverlap';
}

?>

<div class="<?php echo esc_attr( $classes ); ?>">
	<figure class="<?php echo esc_attr( $figure_classes ); ?>">
		<?php
			$module->render_image();
		?>
		<figcaption class="tnit-caption">
			<!--Testimonial Text Start-->
			<div class="tnit-text">
				<?php if ( 'yes' === $settings->enable_social_icons && '5' === $settings->team_style ) { ?>
					<!--Social Links Start-->
					<ul class="<?php echo esc_attr( $social_link_classes ); ?>">
						<?php
							$module->render_social_icons();
						?>
					</ul><!--Social Links End-->
				<?php } ?>
				<?php
					$module->render_member_name();
					$module->render_separator( 'below_name' );
					$module->render_designation();
					$module->render_separator( 'below_desg' );
					$module->render_description();
					$module->render_separator( 'below_desc' );

				if ( 'yes' === $settings->enable_social_icons && '6' === $settings->team_style ) {
					?>
					<!--Social Links Start-->
					<ul class="<?php echo esc_attr( $social_link_classes ); ?>">
						<?php
						$module->render_social_icons();
						?>
					</ul><!--Social Links End-->
				<?php } ?>
			</div><!--Testimonial Text End-->
		</figcaption>
	</figure>
</div>
