<?php
/**
 * The template for displaying search results pages
 * @package Biznesspack
 * @version 1.5.1
 */

get_header(); ?>
	<div id="content" class="site-content">
		<div class="container">

            <div class="row">
                <div class="col-md-8">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <?php if ( have_posts() ) :
                                    /* Start the Loop */
                                    while ( have_posts() ) : the_post(); ?>
                                    
                                        <?php 
                                            
                                            get_template_part( 'template-parts/post/archive-content');
                            
                                        endwhile; // End of the loop.
                            
                                        the_posts_pagination(); ?>
                                
                            <?php else : ?>
                                <div class="wrong-search-wrapper text-center">
                                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'biznesspack' ); ?></p>
                                    <?php get_search_form(); ?>
                                </div>
                        <?php endif; ?>
                        </main>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
               </div>
            </div><!-- .row -->

<?php get_footer();
