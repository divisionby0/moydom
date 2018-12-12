<?php
/**
 * Displays header site branding
 *
 * @package Biznesspack
 * @version 1.5.1
 */

?>
<div class="site-branding">
	<?php if(the_custom_logo()):?>
        <div class="custom-logo">
            <?php the_custom_logo(); ?>
        </div>
	<?php endif; ?>
    <!--
	<?php if ( is_front_page() ) : ?>
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php else : ?>
        <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php endif; ?>
    -->

    <?php
    $description = get_bloginfo( 'description', 'display' );

    if ( $description || is_customize_preview() ) :
    ?>
        <p class="site-description" style="color:#315a86; font-size: 1.4em;"><a href="tel:<?php echo $description; ?>"><?php echo $description; ?></a></p>
    <?php endif;  ?>

</div><!-- .site-branding -->
