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
                                $id = get_the_ID();
                                $cost = get_post_meta($id, "cost",true);
                                $saleDialType = get_post_meta($id, "saleDialType", true);
                                $rentDialType = get_post_meta($id, "rentDialType", true);
                                $city = get_post_meta($id, "selectedCity", true);
                                $cost = get_post_meta($id, "cost", true);
                                $estateType = get_post_type($id);
                                $hasWater = get_post_meta($id , MetaboxConstants::$WATER_OPTION, true );
                                $hasElectricity = get_post_meta($id , MetaboxConstants::$ELECTRICITY_OPTION, true );
                                $hasSewage = get_post_meta($id , MetaboxConstants::$SEWAGE_OPTION, true );
                                $hasGas = get_post_meta($id , MetaboxConstants::$GAS_OPTION, true );
                                $hasInternet = get_post_meta($id , MetaboxConstants::$INTERNET_OPTION, true );
                                $hasFreeParking = get_post_meta($id , MetaboxConstants::$FREE_PARKING_OPTION, true );
                                $address = get_post_meta($id , MetaboxConstants::$ADDRESS, true );

                                echo "<div class='container' style='margin-bottom: 14px!important;'>";
                                echo "<div class='row' style='width:100%;'>";
                                echo "<div id='productId' data-productId='".$id."' class='badge badge-primary' style='float:left; display:block; font-size:2em; background-color: #315a86!important;'>ID ".$id."</div>";
                                echo "<div class='badge badge-primary float-right' style='float:right; display:block; font-size:2em; background-color: #F0634C!important;'>".$cost." р.</div>";
                                echo "</div>";
                                echo "</div>";

                                //echo "<div class='col-md-6'><div id='productId' data-productId='".get_the_ID()."' class='badge badge-primary' style='font-size:2em; background-color: #405585!important;'>ID ".get_the_ID()."</div></div>";
                                //echo "<div class='col-md-6'><div class='badge badge-primary' style='font-size:2em; background-color: #405585!important;'>".$cost." р.</div></div>";
                                get_template_part( 'template-parts/post/single');

                                if(isset($address)){
                                    echo "<div class='container'><div class='row'><div class='col-md-12' style='font-size: 1.6em;'><b class='badge badge-primary' style='background-color: #315a86!important;'>Адрес: ".$address."</b></div></div></div>";
                                }

                                echo "<div class='container' style='margin-bottom: 14px!important;'>";
                                echo "<div class='row'>";
                                echo "<div class='col-md-6'>";
                                echo "<div class='col-md-12'><b>Дополнительные характеристики:</b></div>";
                                if($hasWater == 1){
                                    echo "<div class='col-md-12'><i>Водопровод</i></div>";
                                }
                                if($hasElectricity == 1){
                                    echo "<div class='col-md-12'><i>Электричество</i></div>";
                                }
                                if($hasSewage == 1){
                                    echo "<div class='col-md-12'><i>Канализация</i></div>";
                                }
                                if($hasGas == 1){
                                    echo "<div class='col-md-12'><i>Газ</i></div>";
                                }
                                if($hasInternet == 1){
                                    echo "<div class='col-md-12'><i>Интернет</i></div>";
                                }
                                if($hasFreeParking == 1){
                                    echo "<div class='col-md-12'><i>Бесплатная парковка</i></div>";
                                }
                                echo "</div>";
                                echo "<div class='col-md-6'>";
                                echo "<p>Если Вас заинтересовал этот объект, свяжитесь с нами, введите Ваше имя, Ваш email и контактный телефон. Наши специальсты свяжутся с Вами.</p>";
                                echo do_shortcode( '[contact-form-7 id="221" title="Заинтересованность объектом"]' );
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";

                                //echo "<p>estate type:".$estateType."</p>";
                                echo "<section class='page-header jumbotron'><div class='container'><div class='row'><div class='col-md-12'><h2 style='color:white;'>Похожее</h2></div></div></div></section>";
                            new ResentProducts($id, $estateType, $saleDialType, $rentDialType, $city, null, null);
                                echo "<section class='page-header jumbotron'><div class='container'><div class='row'><div class='col-md-12'><h2 style='color:white;'>Горячая продажа</h2></div></div></div></section>";
                                new HotSaleController();
                            endwhile; // End of the loop.
                            ?>
                
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div>
<?php get_footer();
