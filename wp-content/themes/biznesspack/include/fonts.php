<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function biznesspack_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,400,500,700','Raleway:300,400,500,600,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url_raw($fonts_url);
}
function biznesspack_scripts_styles() {
    wp_enqueue_style( 'google-fonts', biznesspack_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'biznesspack_scripts_styles' );
?>