<?php // Template Name: Fullwidth ?>
<?php get_header(); ?>
<!-- Content(No left, right) -->
<div id="sns_content">
<div class="container">
    <div class="sns-content">
        <!-- Main content -->
        <div class="sns-main">
            <?php
            if ( have_posts() ) :
                // Theloop
                while ( have_posts() ) : the_post();
                    the_content(); 
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile;
            else:
               get_template_part( 'content', 'none' );
            endif; ?>
       </div>
    </div>
</div>
</div>
<!-- End Content -->
<?php get_footer(); ?>