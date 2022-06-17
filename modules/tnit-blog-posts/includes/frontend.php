<?php
/**
 * Render the frontend content.
 *
 * @package Blog Posts Module
 *
 * @since 1.0.29
 */

// Get the query data.
$query = FLBuilderLoop::query( $settings );

// Render the posts.
if ( $query->have_posts() ) {
	do_action( 'tnit_posts_module_before_posts', $settings, $query );

	$paged = ( FLBuilderLoop::get_paged() > 0 ) ? ' tnit-paged-scroll-to' : '';

	?>
	<div class="tnit-post-grid">
		<div class="tnit-blog tnit-blog-style-<?php echo esc_attr( $settings->layout_style ); ?>">
			<div class="xpro-grid<?php echo esc_attr( $paged ); ?>">

				<?php
				while ( $query->have_posts() ) {

					$query->the_post();

					$post_id   = get_the_ID();
					$permalink = get_permalink();

					$cat_list  = wp_get_post_terms( $post_id, 'category' );
					$count_cat = count( $cat_list );

					ob_start();
					if ( '' !== $settings->layout_style ) {

						if ( '1' === $settings->layout_style || '2' === $settings->layout_style ) {

							include apply_filters( 'tnit_posts_module_layout_path', $module->dir . 'includes/post-grid-1.php', $settings->layout_style, $settings );

						} elseif ( '3' === $settings->layout_style ) {

							include apply_filters( 'tnit_posts_module_layout_path', $module->dir . 'includes/post-grid-2.php', $settings->layout_style, $settings );
						} elseif ( '4' === $settings->layout_style ) {

							include apply_filters( 'tnit_posts_module_layout_path', $module->dir . 'includes/post-grid-3.php', $settings->layout_style, $settings );
						}
					}

					// Do shortcodes here so they are parsed in context of the current post.
					echo do_shortcode( ob_get_clean() );
				}

				?>

			</div>
		</div>
	</div>
	<?php
}

do_action( 'tnit_posts_module_after_posts', $settings, $query );

// Render the pagination.
if ( 'none' !== $settings->pagination && $query->have_posts() && $query->max_num_pages > 1 ) :

	?>
	<div class="tnit-pagination"<?php echo ( in_array( $settings->pagination, array( 'scroll', 'load_more' ), true ) ) ? ' style="display:none;"' : ''; ?>>
		<?php FLBuilderLoop::pagination( $query ); ?>
	</div>
	<?php if ( 'load_more' === $settings->pagination && $query->max_num_pages > 1 ) : ?>
		<div class="fl-builder-pagination-load-more"></div>
	<?php endif; ?>
<?php endif; ?>
<?php

do_action( 'tnit_posts_module_after_pagination', $settings, $query );

// Render the empty message.
if ( ! $query->have_posts() ) :

	?>
<div class="tnit-post-empty">
	<p><?php echo esc_attr( $settings->no_results_message ); ?></p>
	<?php if ( $settings->show_search ) : ?>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>

	<?php

endif;

wp_reset_postdata();
