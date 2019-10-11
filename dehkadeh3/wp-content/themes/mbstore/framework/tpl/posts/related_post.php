<?php
wp_enqueue_script('owlcarousel');
if( $relates->have_posts() ): ?>
	<h2 class="related-title">
        <span><?php echo esc_html__( 'Related Post', 'mbstore' ); ?></span>
    </h2>
    <div class="related-content"><div class="owl-carousel">
		<?php
		while ( $relates->have_posts() ) : $relates->the_post();
        ?>
            <div class="item">
                <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="image">
                        <?php the_post_thumbnail('mbstore_blog_default_thumb'); ?>
                    </a>
                <?php endif; ?>
                 <h3 class="title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="post-meta">
                    <?php
                    // Date
                    printf( '<span class="entry-date">%1$s<a href="%2$s" rel="bookmark"><time class="entry-date published" datetime="%3$s">%4$s</time></a></span>',
                        esc_html__('On ', 'mbstore'),
                        get_permalink(),
                        esc_attr( get_the_date( 'c' ) ),
                        get_the_date()
                    );
                    ?>
                </div>
            </div>
        <?php
        endwhile; ?>
    </div></div>
    <?php
endif;
?>