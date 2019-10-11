<?php
wp_enqueue_script('imagesloaded');
wp_enqueue_script('mbstore-blog-ajax');
$wclass = '';
if ( mbstore_themeoption('blog_class') ) {
	$wclass = mbstore_themeoption('blog_class');
}
$pagination = mbstore_themeoption('pagination', 'def'); // get theme option
?>
<div id="snsmain" class="blog-standard posts sns-blog-posts <?php echo esc_attr($wclass);?>">
<?php 
// Theloop
while ( have_posts() ) : the_post();
    get_template_part( 'framework/tpl/posts/post', get_post_format() );
endwhile;
// Paging
if( $pagination == 'def' || $pagination == '')
	get_template_part('tpl-paging');
?>
</div>
<?php
if( $pagination == 'ajax' || $pagination == 'ajax2' )
	mbstore_paging_nav_ajax('#snsmain', 'framework/tpl/posts/post' ); // This paging nav should be outside #snsmain div

echo '<input type="hidden" name="hidden_mbstore_blog_layout" value="' . mbstore_themeoption('blog_type') .  '">';