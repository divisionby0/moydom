<?php
/*
Plugin Name: Estates
Plugin URI: http://none
Version: 1.0
Author: divisionby0
License: none
*/
function includeAutoload(){
    include_once('Autoload.php');
}
function initPlugin(){
    includeAutoload();
    new Autoload();
    create_content_types();
    new IncludeJS();
}

function create_content_types(){
    new HousePostType();
}

// show estate
function display_estate_meta_box( $estate ) {
    $id = $estate->ID;
    new IdMetabox($id);
    
    $currentCity = get_post_meta($id , 'selectedCity', true );
    new CityMetabox($currentCity);

    
}

function estate_admin(){
    new InitEstateAdmin();
}

function admin_save_post( $estate_id, $estate ) {
    new SaveCity($estate_id, $estate);
}

add_action( 'init', 'initPlugin' );
add_action( 'add_meta_boxes', 'estate_admin' );
add_action( 'save_post', 'admin_save_post', 10, 2 );

