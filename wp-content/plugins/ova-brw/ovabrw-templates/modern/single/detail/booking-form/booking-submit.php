<?php if ( ! defined( 'ABSPATH' ) ) exit();
	global $product;
	if ( ! $product ) return;

	$product_id = $product->get_id();

	$rental_type 		= get_post_meta( $product_id, 'ovabrw_price_type', true );
	$defined_one_day 	= defined_one_day( $product_id );
?>
<button type="submit" class="submit">
	<?php esc_html_e( 'Booking', 'ova-brw' ); ?>
	<div class="ajax_loading">
		<div></div><div></div><div></div><div></div>
		<div></div><div></div><div></div><div></div>
		<div></div><div></div><div></div><div></div>
	</div>
</button>
<input type="hidden" name="ovabrw_rental_type" value="<?php echo esc_attr( $rental_type ); ?>" />
<input type="hidden" name="car_id" value="<?php echo esc_attr( $product_id ); ?>" />
<input type="hidden" name="defined_one_day" value="<?php echo esc_attr( $defined_one_day ); ?>" />
<input type="hidden" name="custom_product_type" value="ovabrw_car_rental" />
<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product_id ); ?>" />
<input type="hidden" name="quantity" value="1" />