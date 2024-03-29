<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="sns_wrapper" class="sns-container">
	<?php
	if ( !is_404() ) {
		if ( mbstore_getoption('header_style', 'style3') != '' ) {
			get_template_part( str_replace( 'style', 'tpl-head-', mbstore_getoption('header_style', 'style3') ) ); // ex: style1 => tpl-head-1
		}else{
			get_template_part('tpl-head-1');
		}
	}