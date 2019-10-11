<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( $upsells ) : ?>
	<div class="up-sells upsells-list products">
		<h2><span><?php esc_html_e( 'Upsells Product', 'mbstore' ) ?></span></h2>
		<div class="content">
		<?php foreach ( $upsells as $upsell ) : ?>
			<?php
			 	$post_object = get_post( $upsell->get_id() );
				setup_postdata( $GLOBALS['post'] =& $post_object );
				wc_get_template( 'vc/item-list8080.php'); //wc_get_template_part( 'content', 'product' ); ?>
		<?php endforeach; ?>
		</div>
	</div>
<?php endif;
wp_reset_postdata();