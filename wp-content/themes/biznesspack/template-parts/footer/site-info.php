<?php
/**
 * Displays footer site info
 *
 * @package Biznesspack
 * @version 1.5.1
 */

?>

<div class="site-info">
	<?php $copyright_text = biznesspack_get_option( 'copyright_text' ); 
    
        if ( ! empty( $copyright_text ) ) : ?>
    
            <p><?php echo wp_kses_data( $copyright_text ); ?></p> 
    
    <?php endif; ?>
        <a href="<?php echo esc_url( __( 'http://www.pioneerthemes.com/', 'biznesspack' ) ); ?>"><?php printf( __( 'Designed by %s', 'biznesspack' ), 'Pioneerthemes' ); ?></a>
</div><!-- .site-info -->
