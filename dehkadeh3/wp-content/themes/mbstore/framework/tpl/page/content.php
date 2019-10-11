<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	// Page title
	mbstore_pagetitle();
	?>
    <?php
    while ( have_posts() ) : the_post();
        the_content();
        // Post Paging
        wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'mbstore' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); 
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile;
    ?>
</section>