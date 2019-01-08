<?php
/**
 * Template Name: News page template
 */
get_header(); ?>

    <div id="content" class="site-content">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <div class="container"><div class="row">
                    <?php

                    $query = new WP_Query(array(
                        'post_type' => 'news',
                        'post_status' => 'publish'
                    ));


                    while ($query->have_posts()) {
                        $query->the_post();
                        $post_id = get_the_ID();
                        $title = get_the_title();
                        $content = clearPostContent(wp_strip_all_tags(get_the_content()));
                        $url = get_permalink();
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' )[0];

                        //echo "<p>total:".sizeof($content)."</p>";

                        echo "<div class='col-md-4'><a href='".$url."'>";
                        echo "<div class='col-md-12' style='font-size: 1.2em; text-align: center;'>".$title."</div>";
                        echo "<div class='col-md-12'><img src='".$image."'></div>";
                        echo "<div class='col-md-12' style='text-align: center; height: 50px; overflow-y: hidden;'>".$content."</div>";
                        echo "</a></div>";
                    }

                    wp_reset_query();
                    ?>
                    </div></div>
                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div><!-- .row -->

<?php get_footer();
