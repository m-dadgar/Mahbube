<div class="sns-grid-item">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <?php
	    // Post Quote
	    if ( get_post_format() == 'quote' && function_exists('rwmb_meta') && rwmb_meta('mbstore_post_quotecontent') && rwmb_meta('mbstore_post_quoteauthor') ) :
	    	$uq  = rand().time();
        	?>
	        <div class="quote-info quote-info-<?php echo esc_attr($uq); ?>">
	            <?php if ( rwmb_meta('mbstore_post_quotecontent') ) : ?>
	            <div class="quote-content gfont"><i class="fa fa-quote-left"></i><?php echo esc_html(rwmb_meta('mbstore_post_quotecontent')); ?></div>
	            <?php endif; ?>
	             <?php if ( rwmb_meta('mbstore_post_quoteauthor') ) : ?>
	            <div class="quote-author"><?php echo esc_html(rwmb_meta('mbstore_post_quoteauthor')); ?></div>
	            <?php endif; ?>
	        </div>
	    <?php
	    // Post Link
	    elseif ( get_post_format() == 'link' && function_exists('rwmb_meta') && rwmb_meta('mbstore_post_linkurl') ) : ?>
	        <div class="link-info">
	            <a title="<?php echo esc_attr(rwmb_meta('mbstore_post_linktitle')) ?>" href="<?php echo esc_url( rwmb_meta('mbstore_post_linkurl') ) ?>"><?php echo esc_html(rwmb_meta('mbstore_post_linktitle')) ?></a>
	        </div>
	    <?php
	    // Post Video
	    elseif ( get_post_format() == 'video' && function_exists('rwmb_meta') && rwmb_meta('mbstore_post_video') ) : ?>
	        <div class="video-thumb video-responsive">
	            <?php
	            echo rwmb_meta('mbstore_post_video');
	            ?>
	            
	        </div>
	    <?php
	    // Post audio
        elseif ( get_post_format() == 'audio' && function_exists('rwmb_meta') && rwmb_meta('mbstore_post_audio') ) : ?>
            <div class="audio-thumb audio-responsive">
                <?php
                echo wp_oembed_get(esc_attr(rwmb_meta('mbstore_post_audio')));
                ?>
            </div>
        <?php
	    // Post Gallery
	    elseif ( get_post_format() == 'gallery' && function_exists('rwmb_meta') && rwmb_meta('mbstore_post_gallery') ) : 
			wp_enqueue_script('owlcarousel');
	    ?>
	        <div class="gallery-thumb">
	            <div class="thumb-container owl-carousel">
	            <?php
	            foreach (rwmb_meta('mbstore_post_gallery', 'type=image') as $image) {?>
	               <div class="item"><img alt="<?php echo esc_attr($image['alt']); ?>" src="<?php echo esc_attr($image['full_url']); ?>"/></div>
	            <?php
	            }
	            ?>
	            </div>
	        </div>
	    <?php
	    // Post Image
	    elseif ( has_post_thumbnail() ) : ?>
	        <div class="post-thumb">
	            <?php
	            $blog_type = mbstore_themeoption('blog_type');
	            $img_size = 'mbstore_blog_masonry_thumb';
	            ?>
		            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_attr__( '%s', 'mbstore' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
		            <?php
		            	the_post_thumbnail($img_size);
		            ?>
		            </a>
	        </div>
	    <?php
	    endif;?>
	    <div class="post-content">      
	        <div class="content">
	            <div class="post-meta">
	            	<?php
	                // Is sticky or not
	                if ( is_sticky() && !is_paged() && !is_search() ) { ?>
	                    <span class="sticky-post"><?php echo esc_html__( 'Featured', 'mbstore' ) ; ?></span>
	                <?php
	                } ?>
	                <?php
	                // Date
	                if (mbstore_themeoption('show_date', 1) == 1 ) :
	                    printf( '<span class="entry-date">%1$s<a href="%2$s" rel="bookmark"><time class="entry-date published" datetime="%3$s">%4$s</time></a></span>',
	                    	esc_html__('On ', 'mbstore'),
	                        get_permalink(),
	                        esc_attr( get_the_date( 'c' ) ),
	                        get_the_date()
	                    );
	                endif;
	                ?>
	                <?php if( 1 == 0 && mbstore_themeoption('show_categories', 1) == 1 && get_the_category_list() ): ?>
	                    <span class="cat-links">
	                    	<?php echo esc_html__('In ', 'mbstore'); ?>
	                        <?php echo get_the_category_list(); ?>
	                    </span>
	                <?php endif;?>
	                <?php if( mbstore_themeoption('show_author', 1) == 1 ): ?>
	                <span class="post-author">
	                <?php echo esc_html__('By ', 'mbstore'); ?>
	                <?php
	                printf( wp_kses(__( '<a class="author-link" href="%s" ref="author">%s</a>', 'mbstore' ), array(
	                                'a' => array(
	                                    'href' => array(),
	                                    'class' => array(),
	                                    'ref' => array()
	                                ),
	                                ) ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author_meta('display_name') ); ?>
	                </span>
	                <?php endif; ?>
	                <?php if( 1 == 0 && mbstore_themeoption('show_tags', 1) == 1 && get_the_tag_list() ): ?>
	                    <span class="tags-links">
	                        <?php 
	                        the_tags('',', '); 
	                        ?>
	                    </span>
	                <?php endif; ?>
	                <?php if( 1 == 0 && mbstore_themeoption('show_comment_count', 1) == 1 && ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ): ?>
	                    <span class="post-comment-count">
	                    <?php
	                        echo '<span class="comments-link">';
	                        comments_popup_link( esc_html__( '0 Comments','mbstore' ),  esc_html__( '1 Comment','mbstore' ), '%' . esc_html__(' Comments','mbstore'));
	                        echo '</span>';
	                    ?>
	                    </span>
	                <?php endif; ?>
	                <?php
	                // Edit link
	                edit_post_link(esc_html__('Edit','mbstore'), '<span class="edit-post">', '</span>'); ?>
	            </div>
	            <h3 class="post-title">
	              <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( esc_attr__( 'Permalink to %s', 'mbstore' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	            </h3>
            </div>
        </div>
	</article>
</div>