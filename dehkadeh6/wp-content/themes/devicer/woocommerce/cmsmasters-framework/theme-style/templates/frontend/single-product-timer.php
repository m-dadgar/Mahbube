<?php
/**
 * This file belongs to the YIT Plugin Framework.
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( empty( $args['items'] ) ) {
	return;
}

$cmsmasters_cd_product_class = ((isset($args['class']) && $args['class'] != '') ? $args['class'] : 'ywpc-countdown');

foreach ( $args['items'] as $id => $item ) {

	if ( empty( $item['end_date'] ) || ( isset( $args['active_var'] ) && $args['active_var'] != $id && isset( $args['shortcode'] ) && $args['shortcode'] == true ) ) {
		continue;
	}

	$style = ( isset( $args['active_var'] ) && $args['active_var'] != $id ) ? ' style=" display: none;"' : '';
	$date  = ywpc_get_countdown( $item['end_date'] );

	?>
	<div class="<?php echo esc_attr($cmsmasters_cd_product_class); ?> ywpc-item-<?php echo esc_attr($id); ?>"<?php echo esc_attr($style); ?>>
		<div class="ywpc-header">
			<?php echo apply_filters( 'ywpc_timer_title', __( 'Hurry Up! Specials Offers', 'devicer' ), $item['before'] ); ?>
		</div>
		<div class="ywpc-timer">
			<div class="ywpc-days">
				<div class="ywpc-amount">
					<?php $days = ( ( is_rtl() ) ? strrev( $date['dd'] ) : $date['dd'] ); ?>
					<span class="ywpc-char-1"><?php echo substr( $days, 0, 1 ); ?></span>
					<span class="ywpc-char-2"><?php echo substr( $days, 1, 1 ); ?></span>
				</div>
				<div class="ywpc-label">
					<?php _e( 'Day', 'devicer' ) ?>
				</div>
			</div>
			<div class="ywpc-hours">
				<div class="ywpc-amount">
					<?php $hours = ( ( is_rtl() ) ? strrev( $date['hh'] ) : $date['hh'] ); ?>
					<span class="ywpc-char-1"><?php echo substr( $hours, 0, 1 ); ?></span>
					<span class="ywpc-char-2"><?php echo substr( $hours, 1, 1 ); ?></span>
				</div>
				<div class="ywpc-label">
					<?php _e( 'Hrs', 'devicer' ) ?>
				</div>
			</div>
			<div class="ywpc-minutes">
				<div class="ywpc-amount">
					<?php $minutes = ( ( is_rtl() ) ? strrev( $date['mm'] ) : $date['mm'] ); ?>
					<span class="ywpc-char-1"><?php echo substr( $minutes, 0, 1 ); ?></span>
					<span class="ywpc-char-2"><?php echo substr( $minutes, 1, 1 ); ?></span>
				</div>
				<div class="ywpc-label">
					<?php _e( 'Min', 'devicer' ) ?>
				</div>
			</div>
			<div class="ywpc-seconds">
				<div class="ywpc-amount">
					<?php $seconds = ( ( is_rtl() ) ? strrev( $date['ss'] ) : $date['ss'] ); ?>
					<span class="ywpc-char-1"><?php echo substr( $seconds, 0, 1 ); ?></span>
					<span class="ywpc-char-2"><?php echo substr( $seconds, 1, 1 ); ?></span>
				</div>
				<div class="ywpc-label">
					<?php _e( 'Sec', 'devicer' ) ?>
				</div>
			</div>
		</div>
		<input type="hidden" value="<?php echo( date( 'Y', $date['to'] ) ) ?>.<?php echo( date( 'm', $date['to'] ) - 1 ) ?>.<?php echo( date( 'd', $date['to'] ) ) ?>">
	</div>
	<?php
}