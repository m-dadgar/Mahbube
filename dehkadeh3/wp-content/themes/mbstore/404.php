<?php 
get_header();
?>
<div id="sns_content" class="is-notfound">
	<div class="container sns-notfound-page">
		<div class="sns-notfound-content">
            <?php $bg_404 = mbstore_getoption('bg_404', MBSTORE_THEME_URI.'/assets/img/404.png', 'image'); ?>
            <img src="<?php echo esc_url($bg_404); ?>" alt="<?php echo esc_attr( mbstore_themeoption('notfound_title') ); ?>"/>
            <h1 class="notfound-title"><?php echo esc_html( mbstore_themeoption('notfound_title') ).' '.esc_html( mbstore_themeoption('notfound_content') ); ?></h1>
            <div class="home-back">
                <a class="btn btn-home" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr__('Return to the Home page', 'mbstore'); ?>">
                    <?php echo esc_html__('Return to the Home page', 'mbstore'); ?>
                </a>
            </div>
        </div>
	</div>
</div>
<?php get_footer(); ?>