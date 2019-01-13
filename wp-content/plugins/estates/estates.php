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
    new SectorPostType();
}

// show estate
function display_estate_meta_box( $estate ) {
    $postType = getCurrentPostType();
    $isFlat = $postType ===Constant::$flats;
    $isHouse = $postType ===Constant::$houses;
    $isCommercialEstate = $postType===Constant::$commercialEstates;
    $isSector = $postType===Constant::$sectors;

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

    $isHotSale = get_post_meta($id , MetaboxConstants::$HOT_SALE_OPTION, true );
    new HotSaleMetabox($isHotSale);

    $hasWater = get_post_meta($id , MetaboxConstants::$WATER_OPTION, true );
    new WaterMetabox($hasWater);
    
    $hasElectricity = get_post_meta($id , MetaboxConstants::$ELECTRICITY_OPTION, true );
    new ElectricityMetabox($hasElectricity);
    
    $hasSewage = get_post_meta($id , MetaboxConstants::$SEWAGE_OPTION, true );
    new SewageMetabox($hasSewage);

    $hasGas = get_post_meta($id , MetaboxConstants::$GAS_OPTION, true );
    new GasMetabox($hasGas);
    
    $hasInternet = get_post_meta($id , MetaboxConstants::$INTERNET_OPTION, true );
    new InternetMetabox($hasInternet);

    $hasFreeParking = get_post_meta($id , MetaboxConstants::$FREE_PARKING_OPTION, true );
    new FreeParkingMetabox($hasFreeParking);

    $address = get_post_meta($id , MetaboxConstants::$ADDRESS, true );
    new AddressMetabox($address);

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

    $area = get_post_meta($id , 'area', true );
    new AreaMetabox($area);
    
    if($isHouse){
        $outsideArea = get_post_meta($id , 'outsideArea', true );
        new OutsideAreaMetabox($outsideArea);
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

    $postType = getCurrentPostType();
    $isFlat = $postType ===Constant::$flats;
    $isHouse = $postType ===Constant::$houses;
    $isCommercialEstate = $postType===Constant::$commercialEstates;
    $isSector = $postType===Constant::$sectors;

    new SaveCity($estate_id, $estate);
    new SaveDialType($estate_id, $estate);
    new SaveCost($estate_id, $estate);
    new SaveArea($estate_id, $estate);
    new SaveHiddenDataOne($estate_id, $estate);
    new SaveHotSaleOption($estate_id, $estate);
    new SaveWaterOption($estate_id, $estate);
    new SaveElectricityOption($estate_id, $estate);
    new SaveSewage($estate_id, $estate);
    new SaveGas($estate_id, $estate);
    new SaveInternet($estate_id, $estate);
    new SaveFreeParking($estate_id, $estate);
    new SaveAddress($estate_id, $estate);

    if(Utils::isAdministratorRole()){
        new SaveHiddenDataOne($estate_id, $estate);
        new SaveHiddenDataTwo($estate_id, $estate);
    }
    if($isFlat){
        new SaveFloorNumber($estate_id, $estate);
        new SaveTotalFloors($estate_id, $estate);
        new SaveRoomQuantity($estate_id, $estate);
    }
    if($isHouse){
        new SaveOutsideArea($estate_id, $estate);
    }
}

add_action( 'init', 'initPlugin' );
add_action( 'add_meta_boxes', 'estate_admin' );
add_action( 'save_post', 'admin_save_post', 10, 2 );


