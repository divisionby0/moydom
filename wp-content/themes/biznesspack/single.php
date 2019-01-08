<?php
/**
 * The template for displaying all single posts
 * @package Biznesspack
 * @version 1.5.1
 */

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

                                echo "<p>ID ".get_the_ID()."</p>";

                            $id = get_the_ID();
                                $cost = get_post_meta($id, "cost",true);
                                $saleDialType = get_post_meta($id, "saleDialType", true);
                                $rentDialType = get_post_meta($id, "rentDialType", true);
                                $city = get_post_meta($id, "selectedCity", true);
                                $estateType = get_post_type($id);

                                //echo "<p>estate type:".$estateType."</p>";
                                echo "<section class='page-header jumbotron'><div class='container'><div class='row'><div class='col-md-12'><h2 style='color:white;'>Похожее</h2></div></div></div></section>";
                            new ResentProducts($id, $estateType, $saleDialType, $rentDialType, $city, null, null);
                            endwhile; // End of the loop.
                            ?>
                
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div>
<?php get_footer();
