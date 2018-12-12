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

                                echo "<section class='page-header jumbotron'><div class='container'><div class='row'><div class='col-md-12'><h2 style='color:white;'>Похожее</h2></div></div></div></section>";

                                $estatesData = DataBase::getEstate($estateType, $saleDialType, $rentDialType, $city, null, null, 3);
                                $estates = json_decode($estatesData);


                            for($i=0; $i<sizeof($estates);$i++){
                                $resentPostId = $estates[$i]->id;
                                if(intval($resentPostId) != intval($id)){
                                    echo "<p>resent: ".$estates[$i]->name."  cost: ".$estates[$i]->cost."</p>";
                                }
                            }
                                /*
                                the_post_navigation( array(
                                    'prev_text' => '<span class="previous-label">' . __( 'Previous', 'biznesspack' ) . '</span>
                                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        <span class="nav-title">%title</span>',
                                    'next_text' => '<span class="next-label">' . __( 'Next', 'biznesspack' ) . '</span>
                                        <span class="nav-title">%title</span>
                                        <i class="fa fa-chevron-right" aria-hidden="true"></i>',
                                ) );
                                */
                            endwhile; // End of the loop.
                            ?>
                
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div>
<?php get_footer();
