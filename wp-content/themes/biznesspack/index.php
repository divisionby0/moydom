<?php
/**
 * The main template file
 * @package Biznesspack
 * @version 1.5.1
 */

get_header(); 
$biznesspack_post_status = biznesspack_get_option('biznesspack_post_status');
?>
	<?php if( is_home() && is_front_page()):  
			if ( has_header_image() ) { ?>
                <div class="header-image">
                    <img src="<?php esc_url( header_image() ); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
                </div>
                <?php } else if( $biznesspack_post_status == 1 ):
    
                get_template_part( 'template-parts/post/slider' ); 
        endif; ?>
	<?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                
                            <?php
                            if ( have_posts() ) :
                
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();
                
                                    get_template_part( 'template-parts/post/content');
                
                                endwhile;
                
                                the_posts_pagination();
                
                            else :
                
                                get_template_part( 'template-parts/post/content', 'none' );
                
                            endif;
                            ?>
                
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- .col-md-8 -->
            </div><!-- .row -->

<?php get_footer();
