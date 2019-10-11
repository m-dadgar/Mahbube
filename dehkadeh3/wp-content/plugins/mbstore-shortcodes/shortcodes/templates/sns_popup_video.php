<?php
$output = '';
$id = rand().time();
$atts = vc_map_get_attributes( 'sns_popup_video', $atts );
extract( $atts );

$box_css = '';
$tclass = 'sns-popup-video';
$tclass .= ( trim(esc_attr($extra_class))!='' )?' '.esc_attr($extra_class):'';
$tclass .= ' '.esc_attr( mbstore_getCSSAnimation( $css_animation ) );
if($bg_image_video != ''){
	$bg_image_video = preg_replace('/[^\d]/', '', $bg_image_video);
	$img =   wp_get_attachment_image_src( $bg_image_video , '');
	$box_css = ' style="background-image:url('.$img[0].');';
	if ( $height_wrap ) {
		$box_css .= ' height:'.$height_wrap.';';
	}
	$box_css .= '"';
}
wp_enqueue_script('prettyPhoto');
ob_start();
?>
<div id="sns-popupvideo-<?php echo $id; ?>" class="<?php echo esc_attr($tclass); ?>"<?php echo $box_css; ?>>
	<div class="text-content">
		<?php if ( $sub_title ) : ?>
		<div class="sub-title"><?php echo $sub_title ?></div>
		<?php endif; ?>
		<?php if ( $title ) : ?>
		<h3 class="title"><?php echo $title ?></h3>
		<?php endif; ?>
		<div class="actions">
			<a class="btn-popupvideo" href="<?php echo $video_link; ?>"><?php echo esc_html__('Watch video', 'mbstore'); ?></a>
			<?php 
			if ( ! empty( $product_link ) ) {
				$link = vc_build_link( $product_link );
				echo '<a class="btn-readmore" href="' . esc_url( $link['url'] ) . '"'
				               . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
				               . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
				               . '>' . esc_html( $link['title'] ) . '</a>';
			} ?>
		</div>
	</div>
</div>
<?php
$output = ob_get_clean();
echo $output;