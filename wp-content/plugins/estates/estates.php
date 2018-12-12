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

    if(is_admin()){
        new IncludeJS();
    }
}

function create_content_types(){
    new HousePostType();
    new FlatPostType();
    new CommerceEstatePostType();
}

// show estate
function display_estate_meta_box( $estate ) {
    $isFlat = getCurrentPostType()===Constant::$flats;

    $id = $estate->ID;
    new IdMetabox($id);

    $currentCity = get_post_meta($id , 'selectedCity', true );
    new CityMetabox($currentCity);

    //$currentDialTypes = get_post_meta($id , 'dialTypes', true );
    //new DialTypeMetabox($currentDialTypes);

    $saleDialType = get_post_meta($id , 'saleDialType', true );
    $rentDialType = get_post_meta($id , 'rentDialType', true );

    new DialTypeMetabox($saleDialType, $rentDialType);

    $cost = get_post_meta($id , 'cost', true );
    new CostMetabox($cost);

    if(Utils::isAdministratorRole()){
        $hiddenData1 = get_post_meta($id , 'hiddenData1', true );
        $hiddenData2 = get_post_meta($id , 'hiddenData2', true );

        new HiddenDataOne($hiddenData1);
        new HiddenDataTwo($hiddenData2);
    }

    if($isFlat){
        $floorNum = get_post_meta($id , 'floor', true );
        new FloorNumberMetabox($floorNum);
        
        $totalFloors = get_post_meta($id , 'totalFloors', true );
        new TotalFloorsMetabox($totalFloors);

        $roomsQuantity = get_post_meta($id , 'rooms', true );
        new RoomQuantityMetabox($roomsQuantity);
    }
}

function estate_admin(){
    new InitEstateAdmin();
}

function getCurrentPostType(){
    global $post;
    return $post->post_type;
}

function admin_save_post( $estate_id, $estate ) {

    $isFlat = getCurrentPostType()===Constant::$flats;

    new SaveCity($estate_id, $estate);
    new SaveDialType($estate_id, $estate);
    new SaveCost($estate_id, $estate);

    new SaveHiddenDataOne($estate_id, $estate);

    if(Utils::isAdministratorRole()){
        new SaveHiddenDataOne($estate_id, $estate);
        new SaveHiddenDataTwo($estate_id, $estate);
    }
    if($isFlat){
        new SaveFloorNumber($estate_id, $estate);
        new SaveTotalFloors($estate_id, $estate);
        new SaveRoomQuantity($estate_id, $estate);
    }
}

add_action( 'init', 'initPlugin' );
add_action( 'add_meta_boxes', 'estate_admin' );
add_action( 'save_post', 'admin_save_post', 10, 2 );


