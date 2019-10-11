<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
if ( empty( $class ) ) {
	$class = '';
}
?>
<div <?php post_class($class); ?>>
	<?php wc_get_template( 'vc/item-grid.php' ); ?>
</div>
