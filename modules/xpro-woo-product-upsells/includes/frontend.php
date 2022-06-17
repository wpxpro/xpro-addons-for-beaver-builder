<?php
/**
 *  xpro Woo Products Upsells
 *
 *  @package xpro Woo Products Upsells
 */

if ( class_exists( 'WooCommerce' ) ) {

	global $post, $product;
	if ( ! empty( $product->id ) ) :
		$product_id = $product->id;
	else :
		$product_id = $module->get_product_id( $i );
	endif;
	$product = wc_get_product( $product_id );

	if ( isset( $product_id ) && '' !== $product_id ) {

		$product = wc_get_product( $product_id );
		if ( $product ) :
			$product_data = $product->get_data();
			$post         = get_post( $product_id, OBJECT );

			setup_postdata( $post );
			do_action( 'xprowoo_before_product' );
			?>

			<div id="xprowoo-product-<?php echo esc_attr( $product_id ); ?>" class="xprowoo-themer-module-wrapper woocommerce clearfix">
				<div class="xprowoo-themer-module-layout-cls">
					<div class="xpro-woo-product-upsells-cls">
						<?php
						//woo upsells layout
						woocommerce_upsell_display();
						?>
					</div>
				</div> <!-- layout end -->
			</div> <!-- xprowoo-themer-module-wrapper end -->
			<?php
			do_action( 'xprowoo_after_product' );
			wp_reset_postdata();
		endif;
	}
}
?>
