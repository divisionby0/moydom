<?php
//featured slider
$biznesspack_slider_post_one = array( biznesspack_get_option('biznesspack_slider_post_one') );
$biznesspack_slider_post_two = array( biznesspack_get_option('biznesspack_slider_post_two') );
$biznesspack_slider_post_three = array( biznesspack_get_option('biznesspack_slider_post_three') );
$biznesspack_featured_navigation = biznesspack_get_option('biznesspack_featured_navigation');
$biznesspack_featured_pagination = biznesspack_get_option('biznesspack_featured_pagination');
$biznesspack_featured_content = biznesspack_get_option('biznesspack_featured_content');
$biznesspack_slider_excerpt = biznesspack_get_option('biznesspack_slider_excerpt');

if( $biznesspack_featured_navigation == 1 ){
	$owl_nav = '1';
}else{
	$owl_nav = '0';
}

if( $biznesspack_featured_pagination == 1 ){
	$owl_pag = '1';
}else{
	$owl_pag = '0';
}

$post_img = get_template_directory_uri() . '/assets/images/post-thumbnail.png';
?>

<div class="biznesspack-featured-slider-wrapper">
	<div id="biznesspack-featured-slider" class="owl-carousel owl-theme" data-nav="<?php echo esc_attr( $owl_nav ); ?>" data-pag="<?php echo esc_attr( $owl_pag ); ?>">
    	<?php if( $biznesspack_slider_post_one ): 
			
			$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $biznesspack_slider_post_one ) );
				if( $query->have_posts() ):
						while( $query->have_posts() ):
							$query->the_post();
				?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('biznesspack-featured-image'); ?></a>
                                </div><!-- .post-thumbnail -->
                        <?php else: ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo esc_url( $post_img ); ?>" class="img-responsive" height="750" width="1600" />
                                </div>
                        <?php endif; ?>
                        <div class="post-content overlay">
                            <div class="post-inner-wrapper text-center">
                                <header class="entry-header animation animated-item-1">
                    
                                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                </header><!-- .entry-header -->
                                <?php if( $biznesspack_featured_content ): ?>
                                    <div class="entry-content animation animated-item-2">
                                        <p><?php echo wp_trim_words( get_the_content(), $biznesspack_slider_excerpt ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <p class="read-more animation animated-item-3">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
                                        <?php esc_html_e( 'Read More','biznesspack' );?>
                                    </a>
                                </p>
                                
                            </div>  
                        </div>
                    </div>
                </article><!-- #post-## -->
		
			<?php endwhile; wp_reset_query();
			endif;
		endif;
		?>
        
		<?php if( $biznesspack_slider_post_two ): 
			
			$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $biznesspack_slider_post_two ) );
				if( $query->have_posts() ):
						while( $query->have_posts() ):
							$query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('biznesspack-featured-image'); ?></a>
                                </div><!-- .post-thumbnail -->
                        <?php else: ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo esc_url( $post_img ); ?>" class="img-responsive" height="1920" width="700" />
                                </div>
                        <?php endif; ?>
                        <div class="post-content overlay">
                            <div class="post-inner-wrapper text-center">
                                <header class="entry-header animation animated-item-1">
                    
                                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                </header><!-- .entry-header -->
                                <?php if( $biznesspack_featured_content ): ?>
                                    <div class="entry-content animation animated-item-2">
                                        <p><?php echo wp_trim_words( get_the_content(), $biznesspack_slider_excerpt ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <p class="read-more animation animated-item-3">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
                                        <?php esc_html_e( 'Read More','biznesspack' );?>
                                    </a>
                                </p>
                                
                            </div>  
                        </div>
                    </div>
                </article><!-- #post-## -->
		
			<?php endwhile; wp_reset_query();
			endif;
		endif;
		?>
        
		<?php if( $biznesspack_slider_post_three ): 
			
			$query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $biznesspack_slider_post_three ) );
				if( $query->have_posts() ):
						while( $query->have_posts() ):
							$query->the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="post-wrapper">
                        <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('biznesspack-featured-image'); ?></a>
                                </div><!-- .post-thumbnail -->
                        <?php else: ?>
                                <div class="post-thumbnail">
                                    <img src="<?php echo esc_url( $post_img ); ?>" class="img-responsive" height="1920" width="700" />
                                </div>
                        <?php endif; ?>
                        <div class="post-content overlay">
                            <div class="post-inner-wrapper text-center">
                                <header class="entry-header animation animated-item-1">
                    
                                    <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                                </header><!-- .entry-header -->
                                <?php if( $biznesspack_featured_content ): ?>
                                    <div class="entry-content animation animated-item-2">
                                        <p><?php echo wp_trim_words( get_the_content(), $biznesspack_slider_excerpt ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                <p class="read-more animation animated-item-3">
                                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="btn">
                                        <?php esc_html_e( 'Read More','biznesspack' );?>
                                    </a>
                                </p>
                                
                            </div>  
                        </div>
                    </div>
                </article><!-- #post-## -->
		
			<?php endwhile; wp_reset_query();
			endif;
		endif;
		?>
        
    </div>
</div>