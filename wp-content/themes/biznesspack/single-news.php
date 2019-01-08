<?php
get_header(); ?>
    <div id="content" class="site-content" style="padding-top: 40px!important;">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/single');
                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div>
<?php get_footer();