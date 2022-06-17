<?php

/**
 *  xpro Woo-Products Meta
 *
 *  @package xpro Woo-Products Meta
 */

if ( class_exists( 'WooCommerce' ) ) {

	global $post, $product;
	if ( ! empty( $product->id ) ) :
		$product_id = $product->id;
	else :
		$product_id = $module->get_product_id( $i );
	endif;

	$product = wc_get_product( $product_id );
	?>
	<div class="xpro-woo-product-meta-cls">

		<div class="product_meta">

			<?php do_action( 'woocommerce_product_meta_start' ); ?>

			<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

                <span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

			<?php endif; ?>

			<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

			<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>

			<?php do_action( 'woocommerce_product_meta_end' ); ?>

		</div>

	</div>
	<?php
}
