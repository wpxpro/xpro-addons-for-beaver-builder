<?php
$tag   = ( $settings->box_link ) ? 'a' : 'div';
$attr  = $settings->box_link_target ? ' target="_blank"' : '';
$attr .= $settings->box_link_nofollow ? ' rel="nofollow"' : '';
$attr .= $settings->box_link ? ' href="' . $settings->box_link . '"' : '';

?>

<div class="xpro-simple-heading-wrapper">
	<<?php echo esc_attr( $tag ); ?> <?php echo esc_attr( $attr ); ?> class="">
		<<?php echo esc_attr( $settings->title_tag ); ?> class="xpro-heading-title">
			<?php if ( $settings->before_title ) : ?>
				<span class=""><?php echo esc_attr( $settings->before_title ); ?></span>
			<?php endif; ?>
			<?php if ( $settings->center_title ) : ?>
				<span class="xpro-title-focus"><?php echo esc_attr( $settings->center_title ); ?></span>
			<?php endif; ?>
			<?php if ( $settings->after_title ) : ?>
				<span class=""><?php echo esc_attr( $settings->after_title ); ?></span>
			<?php endif; ?>
		</<?php echo esc_attr( $settings->title_tag ); ?>>
	</<?php echo esc_attr( $tag ); ?>>
</div>
