<?php if ( ! defined( 'ABSPATH' ) ) exit();
	global $product;
	if ( ! $product ) return;

	$short_description = $product->get_short_description();
?>
<?php if ( $short_description ): ?>
	<p class="ovabrw-product-short-description">
		<?php echo esc_html( wp_strip_all_tags( $short_description ) ); ?>
	</p>
<?php endif; ?>