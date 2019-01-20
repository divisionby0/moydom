<?php
/**
 * Displays footer site info
 *
 * @package Biznesspack
 * @version 1.5.1
 */

?>

<div class="site-info">
	<?php
    echo "<p>".get_option('address_text', '')."</p>";
    ?>
        <a href="<?php
        echo esc_url( __( 'http://mdfeo.ru/', 'biznesspack' ) );
        ?>"><br/><?php
            printf( __( 'Агентство недвижимости<br/>Мой дом %s', 'biznesspack' ), 'mdfeo.ru' );
            ?></a>
</div><!-- .site-info -->
