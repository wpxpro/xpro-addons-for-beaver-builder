<?php
/**
 *  xpro Woo-Products Rating
 *
 *  @package xpro Woo-Products Module
 */

if ( class_exists( 'WooCommerce' ) ) {

	global $post, $product;
	if ( ! empty( $product->id ) ) :
		$product_id = $product->id;
	else :
		$product_id = $module->get_product_id( $i );
	endif;

	if ( isset( $product_id ) && '' !== $product_id ) {

		global $post, $product;
		$product = wc_get_product( $product_id );
		if ( $product ) :
			$product_data = $product->get_data();
			$post         = get_post( $product_id, OBJECT );

			setup_postdata( $post );
			do_action( 'xprowoo_before_product' );
			?>

			<div id="xprowoo-product-<?php echo esc_attr( $product_id ); ?>" class="xprowoo-themer-module-wrapper woocommerce clearfix">

				<div class="xprowoo-themer-module-layout-cls">
					<?php
					//rating star layout
					$rating_count = $product->get_rating_count();
					$review_count = $product->get_review_count();
					$average      = $product->get_average_rating();
					if ( $rating_count > 0 ) :
						?>
						<?php do_action( 'xprowoo_themer_module_before_rating_wrap', $settings, $product ); ?>
						<div class="xprowoo-product-rating-wrapper woocommerce-product-rating">
							<?php echo wc_get_rating_html( $average, $rating_count ); ?>
							<?php if ( comments_open( $product_id ) ) : ?>
								<a class="woocommerce-rating-count" rel="nofollow">
									(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)
								</a>
							<?php endif ?>
						</div>
						<?php do_action( 'xprowoo_themer_module_after_rating_wrap', $settings, $product ); ?>
						<?php
					else :
						if ( FLBuilderModel::is_builder_active() ) {
							echo '<div class="xpro-woo-product-rating-info-cls">"Xpro Product Rating".<br>This product does not have rating.<br>
                                    This text will disappear after saving the module & reloading the page.</div>';
						}
					endif;
					?>
				</div> <!-- layout end -->
			</div> <!-- xprowoo-themer-module-wrapper end -->
			<?php
			do_action( 'xprowoo_after_product' );
			wp_reset_postdata();
		endif;
	}
}
?>
