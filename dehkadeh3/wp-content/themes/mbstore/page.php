<?php get_header(); ?>
<!-- Content -->
<div id="sns_content">
	<div class="container">
		<div class="row sns-content">
			<?php mbstore_leftcol(); ?>
			<div class="<?php echo mbstore_maincolclass(); ?>">
			    <?php
			    if ( have_posts() ) :
			        get_template_part( 'framework/tpl/page/content' );
			    else:
			        get_template_part( 'content', 'none' );
			    endif; ?>
			</div>
			<?php mbstore_rightcol(); ?>
		</div>
	</div>
</div>
<!-- End Content -->
<?php get_footer(); ?>