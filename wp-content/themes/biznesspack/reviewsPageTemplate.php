<?php
/**
 * Template Name: reviews page template
 */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <h2>Вы можете оставить свой отзыв тут</h2>
        </div>
        <div class="col-md-12" style="text-align: center;">
            <?php echo do_shortcode('[contact-form-7 id="242" title="Форма добавления отзыва"]'); ?>
        </div>
        <div class="col-md-12" style="text-align: center;">
            <h4>Отзывы о нас</h4>
        </div>
        <?php
        new ReviewsList();
        ?>
    </div>
</div>

<?php get_footer();
