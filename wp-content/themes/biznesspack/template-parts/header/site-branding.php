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

    $phone1 = get_option( 'admin_phone_1_text', '' );
    $phone2 = get_option( 'admin_phone_2_text', '' );
    ?>
    <p class="site-description" style="color:#315a86; font-size: 0.77em;"><a class="logoPhone" style="float: left; display: block;" href="tel:<?php echo $phone1; ?>"><?php echo $phone1; ?></a><a style="float: left; display: block;" href="tel:<?php echo $phone2; ?>"><?php echo $phone2; ?></a></p>
</div><!-- .site-branding -->
