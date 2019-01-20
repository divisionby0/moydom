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
                    endwhile; // End of the loop.
                    $phone1 = get_option( 'admin_phone_1_text', '' );
                    $phone2 = get_option( 'admin_phone_2_text', '' );
                    echo "<div>Если у Вас остались вопросы, просто позвоните нам по телефонам <a href='tel:".$phone1."'>".$phone1."</a> или <a href='tel:".$phone2."'>".$phone2."</a> или отправьте нам сообщение.</div>";
                    echo do_shortcode('[contact-form-7 id="225" title="Контактная форма страница контакты"]');
                    ?>

                </main><!-- #main -->
            </div><!-- #primary -->
        </div>
    </div><!-- .row -->

<?php get_footer();
