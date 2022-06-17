<?php
/**
 * Xpro WooCommerce Variable - Template.
 *
 * @package Xpro
 */
 
global $product;
global $woocommerce;

$product = wc_get_product(get_the_ID());

if ($product->is_type('variable')) {

	if (!function_exists('print_attribute_radio')) {
		function print_attribute_radio($checked_value, $value, $label, $name)
		{
			global $product;

			$input_name = 'attribute_' . esc_attr($name);
			$esc_value = esc_attr($value);
			$id = esc_attr($name . '_v_' . $value . $product->get_id()); //added product ID at the end of the name to target single products
			$checked = checked($checked_value, $value, false);
			$filtered_label = apply_filters('woocommerce_variation_option_name', $label, esc_attr($name));
			printf('<div class="xpro-woo-varation-color-type xpro-woo-varation-select-type"><input type="radio" name="%1$s" value="%2$s" id="%3$s" %4$s style="background-color:%2$s;"><label for="%3$s" >%5$s</label></div>', $input_name, $esc_value, $id, $checked, $filtered_label);
		}
	}

	$attributes = $product->get_variation_attributes();
	$attribute_keys  = array_keys($attributes);
	$available_variations = $product->get_available_variations();

	// print_r($available_variations);
	$variations_json = wp_json_encode($available_variations);

	do_action('woocommerce_before_add_to_cart_form');
?>

	<!-- variation class for form -->
	<!-- xpro-woo-product-addtocart-variation -->

	<form class="variations_form xpro-woo-product-addtocart-variation cart<?php echo esc_attr($form_classes); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint($product->get_id()); ?>" data-product_variations="<?php echo function_exists('wc_esc_json') ? wc_esc_json($variations_json) : _wp_specialchars($variations_json, ENT_QUOTES, 'UTF-8', true); ?>">
	
		<?php do_action('woocommerce_before_variations_form'); ?>

		<?php do_action('woocommerce_before_variations_form'); ?>

		<?php if (empty($available_variations) && false !== $available_variations) : ?>
			<p class="stock out-of-stock"><?php esc_html_e('This product is currently out of stock and unavailable.', 'woocommerce'); ?></p>
		<?php else : ?>
			<table class="variations xpro-woo-custom-variation" cellspacing="0">
				<tbody>
					<?php foreach ($attributes as $name => $options) : ?>
						<?php $sanitized_name = sanitize_title($name); ?>
						<tr class="attribute-<?php echo esc_attr($sanitized_name); ?>">
							<td class="label xpro-woo-label" style="width: 20%;"><label for="<?php echo esc_attr($sanitized_name); ?>"><?php echo wc_attribute_label($name); ?></label></td>
							<?php
							if (isset($_REQUEST['attribute_' . $sanitized_name])) {
								$checked_value = $_REQUEST['attribute_' . $sanitized_name];
							} elseif (isset($selected_attributes[$sanitized_name])) {
								$checked_value = $selected_attributes[$sanitized_name];
							} else {
								$checked_value = '';
							}
							?>
							<td class="value xpro-woo-value" style="display:flex;">
								<div class="xpro-woo-variation-inner-cls-1">
									<?php
									if (!empty($options)) {
										if (taxonomy_exists($name)) {
											// Get terms if this is a taxonomy - ordered. We need the names too.
											$terms = wc_get_product_terms($product->get_id(), $name, array('fields' => 'all'));

											foreach ($terms as $term) {
												if (!in_array($term->slug, $options)) {
													continue;
												}
												print_attribute_radio($checked_value, $term->slug, $term->name, $sanitized_name);
											}
										} else {
											foreach ($options as $option) {
												print_attribute_radio($checked_value, $option, $option, $sanitized_name);
											}
										}
									}
									?>
								</div>
								<div class="xpro-woo-variation-inner-cls-2">
									<?php
									echo end($attribute_keys) === $name ? wp_kses_post(apply_filters('woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__('Clear', 'woocommerce') . '</a>')) : '';
									?>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<?php
			if (version_compare($woocommerce->version, '3.4.0') < 0) {
				do_action('woocommerce_before_add_to_cart_button');
			}
			?>

			<div class="single_variation_wrap">
				<?php
				global $product;
				global $woocommerce;

				do_action('woocommerce_before_single_variation');
				do_action('woocommerce_single_variation');
				do_action('woocommerce_after_single_variation');
				?>
			</div>

			<?php
			if (version_compare($woocommerce->version, '3.4.0') < 0) {
				do_action('woocommerce_after_add_to_cart_button');
			}
			?>
		<?php endif; ?>

		<?php do_action('woocommerce_after_variations_form'); ?>
	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php
}
?>