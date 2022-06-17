<div class="xpro-item">
	<!--Blog Item Start-->
	<div class="tnit-blog-item">
		<figure class="tnit-blog-thumb">
			<?php $module->render_featured_image(); ?>
		</figure>

		<!--Content Start-->
		<div class="tnit-blog-content">
			<<?php echo esc_attr( $settings->title_tag ); ?> class="tnit-blog-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</<?php echo esc_attr( $settings->title_tag ); ?>>
			<?php do_action( 'tnit_post_grid_before_meta', $settings, $module ); ?>
			<?php if ( $settings->show_author || $settings->show_date || $settings->show_categories || $settings->show_comments ) : ?>
			<div class="tnit-post-meta">
				<ul class="tnit-post-meta-list">
					<?php if ( $settings->show_author ) : ?>
					<li class="tnit-post-author">
						<?php

						printf(
							/* translators: %s: author name */
							_x( 'By %s', '%s stands for author name.', 'xpro-bb-addons' ),
							'<a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">' . get_the_author_meta( 'display_name', get_the_author_meta( 'ID' ) ) . '</a>'
						);

						?>
					</li>
					<?php endif; ?>
					<?php if ( $settings->show_date ) : ?>
					<li class="tnit-post-date">
						<span><?php FLBuilderLoop::post_date( $settings->date_format ); ?></span>
					</li>
					<?php endif; ?>
					<?php if ( $settings->show_categories ) : ?>
					<li class="tnit-post-categories">
						<span class="tnit-categories-list">
							<?php

							$result = '';
							foreach ( $cat_list as $cat ) {
								$result .= '<a href="' . get_term_link( $cat->term_id ) . '">';
								$result .= $cat->name;
								$result .= '</a>';
								$result .= ', ';
							}

							$result = rtrim( $result, ', ' );
							echo $result;

							?>
						</span>
					</li>
					<?php endif; ?>
					<?php if ( $settings->show_comments ) : ?>
						<li class="tnit-post-comment">
							<?php comments_popup_link( '0 Comment', '1 Comment', '% Comments' ); ?>
						</li>
					<?php endif; ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php do_action( 'tnit_post_grid_after_meta', $settings, $module ); ?>
			<?php do_action( 'tnit_post_grid_before_content', $settings, $module ); ?>
			<?php if ( $settings->show_content ) : ?>
			<div class="tnit-blog-content-text">
				<?php

				if ( 'full' === $settings->content_type ) {
					$module->render_content();
				} else {
					$module->render_excerpt();
				}

				?>
			</div>
			<?php endif; ?>

			<?php

			if ( $settings->show_more_link ) {

				$more_link_settings = $settings->more_link_settings;
				$more_link_class    = ( 'button' === $more_link_settings->link_type ) ? 'tnit-blog-btn' : 'tnit-blog-more-link-text';
				?>
				<div class="tnit-blog-btn-outer">
					<a class="<?php echo esc_attr( $more_link_class ); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php if ( ! empty( $more_link_settings->more_link_icon ) && 'before' === $more_link_settings->more_link_icon_position ) : ?>
							<i class="<?php echo esc_attr( $more_link_settings->more_link_icon ); ?>" aria-hidden="true"></i>
						<?php endif; ?>

						<?php echo esc_attr( $more_link_settings->more_link_text ); ?>

						<?php if ( ! empty( $more_link_settings->more_link_icon ) && 'after' === $more_link_settings->more_link_icon_position ) : ?>
							<i class="<?php echo esc_attr( $more_link_settings->more_link_icon ); ?>" aria-hidden="true"></i>
						<?php endif; ?>
					</a>
				</div>
			<?php } ?>

			<?php do_action( 'tnit_post_grid_after_content', $settings, $module ); ?>
		</div>
		<!--Content End--> 
	</div>
	<!--Blog Item End-->
</div>
