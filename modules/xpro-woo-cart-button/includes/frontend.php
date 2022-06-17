<?php
/**
 *  xpro Woo-Products Add to cart Module
 *
 *  @package xpro Woo-Products Add to cart Module
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
					<div class="xprowoo-product-action woocommerce-product-add-to-cart xpro-btn-add-to-cart">
						<?php
						if ( $product->is_type( 'variable' ) ) {
							//custom variation template
							include XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-cart-button/templates/variable-product-template.php';
						} elseif ( $product->is_type( 'simple' ) ) {
							//simple add to cart
							include XPRO_ADDONS_FOR_BB_DIR . 'modules/xpro-woo-cart-button/templates/simple.php';
						} else {
							woocommerce_template_single_add_to_cart();
						}
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
