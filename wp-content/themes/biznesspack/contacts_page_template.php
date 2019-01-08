<?php
/**
 * Template Name: Contacts page template
 */
get_header(); ?>

    <div id="content" class="site-content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="primary" class="content-area" style="color: #ff751f;">
                <main id="main" class="site-main" role="main">

                    <?php
                    echo do_shortcode("[yamap center='45.036025, 35.376860' height='15rem' zoom='18' type='yandex#map' controls='typeSelector;zoomControl'][yaplacemark coord='45.036025, 35.376860' icon='islands#blueDotIcon' color='#315a86' name='Агентство недвижимости Мой дом'][/yamap]");

                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/page/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div><!-- .row -->

<?php get_footer();
