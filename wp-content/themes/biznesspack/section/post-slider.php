<?php

$biznesspack_latest_post_section_title 	= biznesspack_get_option( 'biznesspack_latest_post_section_title' );
$biznesspack_latest_post_section_subtitle = biznesspack_get_option( 'biznesspack_latest_post_section_subtitle' );
$biznesspack_latest_post_title 	        = biznesspack_get_option( 'biznesspack_latest_post_title');
$biznesspack_latest_post_time 	     	 = biznesspack_get_option( 'biznesspack_latest_post_time');
$biznesspack_latest_post_item			 = biznesspack_get_option( 'biznesspack_latest_post_item' );
$post_img = get_template_directory_uri() . '/assets/images/post-thumbnail.png';
?>


<!-- Wrap Slider Area -->
<section class="biznesspack-slider-wrapper section bg-grey">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="section-title-wrapper text-center">
                	<?php if( !empty( $biznesspack_latest_post_section_title ) ): ?>
                    	<h2 class="title feature-bottom-line">
							<?php echo esc_html( $biznesspack_latest_post_section_title ); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if( !empty( $biznesspack_latest_post_section_subtitle ) ): ?>
                    	<p class="sub-title">
							<?php echo esc_html( $biznesspack_latest_post_section_subtitle ); ?>
                        </p>
                	<?php endif; ?>
                </div>
                <div class="section-content-wrapper">
                    <div id="latest-slider" class="owl-carousel owl-theme" data-item="<?php echo esc_attr( $biznesspack_latest_post_item ); ?>">
                      <?php // Query Args
                            $args = array(
                                'post_type'	=> 'post',
                                'orderby'	=> 'post_date',
                                'order'	=> 'DESC',
                                'posts_per_page' => 8,
                                'ignore_sticky_posts' => 1 ,
                                'post_status' => 'publish'
                            );
                        
                            
                            $sliderQuery = new WP_Query();
                            $sliderQuery->query( $args );
                            
                            // Loop Start
                            if ( $sliderQuery->have_posts() ) :
                
                                while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post();
                
                            ?>
                        
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="post-wrapper">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="post-thumbnail">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
                                        </div><!-- .post-thumbnail -->
                                    <?php else: ?>
                                        <div class="post-thumbnail">
                                            <img src="<?php echo esc_url( $post_img )?>" class="img-responsive" height="750" width="1600" />
                                        </div>
                                    <?php endif; ?>
                                    <div class="post-content">
                                        <div class="post-inner-wrapper">
                                            <?php if( $biznesspack_latest_post_title ): ?>
                                                <header class="entry-header">
                                                    <?php the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
                                                </header><!-- .entry-header -->
                                            <?php endif; ?>
                                            <?php if( $biznesspack_latest_post_time ): ?>
                                                <div class="post-time">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    <?php the_time( get_option('date_format') ); ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>  
                                    </div>
                                </div>
                            </article><!-- #post-## -->
                        <?php
                    
                        endwhile; // Loop end
                        wp_reset_query();
                        endif;
                    
                        ?>
                    </div>
            	</div>
            </div>
        </div>
	</div>
</section>
