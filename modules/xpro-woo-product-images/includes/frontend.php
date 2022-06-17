<?php
/**
 *  xpro Woo-Products Images
 *
 *  @package xpro Woo-Products Images Module
 */

if ( class_exists( 'WooCommerce' ) ) {

	if ( FLBuilderModel::is_builder_active() ) {
		echo '<div class="xpro-woo-product-img-info-cls">"Xpro Product Image".<br>After adding the module reload the page to get your image.<br>
		This text will disappear after saving the module & reloading the page.</div>';
	}

	global $post, $product;
	if ( ! empty( $product->id ) ) :
		$product_id = $product->id;
	else :
		$product_id = $module->get_product_id( $i );
	endif;
	$product = wc_get_product( $product_id );

	if ( isset( $product_id ) && '' !== $product_id ) {

		if ( $product ) :
			$product_data = $product->get_data();
			$post         = get_post( $product_id, OBJECT );

			setup_postdata( $post );
			do_action( 'xprowoo_before_product' );
			?>

			<div id="xprowoo-product-<?php echo esc_attr( $product_id ); ?>" class="xprowoo-themer-module-wrapper woocommerce clearfix">
				<div class="xprowoo-themer-module-layout-cls">
					<div class="xpro-woo-product-img-cls">
						<?php
						if ( is_object( $product ) && $product->is_on_sale() && $settings->sale_flash ) {
							if ( is_archive() ) {
								woocommerce_show_product_loop_sale_flash();
							} else {
								woocommerce_show_product_sale_flash();
							}
						}
						woocommerce_show_product_images();
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
