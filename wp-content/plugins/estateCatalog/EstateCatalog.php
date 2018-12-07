<?php
/*
Plugin Name: EstateCatalog
Plugin URI: http://none
Version: 1.0
Author: divisionby0
License: none
*/
include_once ("service/QueryBuilder.php");
include_once ("service/DataBase.php");
include_once ("controller/CatalogController.php");
include_once ("model/CatalogModel.php");
include_once ("model/Estate.php");
include_once ("view/FiltersView.php");

function createJSConstants() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}


function getEstates(){
    $estateType = $_POST['estateType'];
    $dialTypeCollection = $_POST['dialTypeCollection'];
    $city = $_POST['city'];

    $estates = DataBase::getEstate($estateType, $dialTypeCollection, $city);

    echo "city=".$city."  estateType:".$estateType."  estates:".$estates;
    die();
}

function loadJs(){
    wp_enqueue_script( 'collections', plugin_dir_url( __FILE__ ) . '/js/lib/collections/collections.min.js');
    wp_enqueue_script( 'eventBus', plugin_dir_url( __FILE__ )  . '/js/lib/events/EventBus.js');
    wp_enqueue_script( 'ajaxService', plugin_dir_url( __FILE__ )  . '/js/service/Ajax.js');
    wp_enqueue_script( 'ajaxServiceEvent', plugin_dir_url( __FILE__ )  . '/js/service/AjaxServiceEvent.js');
    wp_enqueue_script( 'constants', plugin_dir_url( __FILE__ )  . '/js/Constants.js');
    wp_enqueue_script( 'catalog', plugin_dir_url( __FILE__ )  . '/js/Catalog.js');
    wp_enqueue_script( 'plugin', plugin_dir_url( __FILE__ )  . '/js/EstateCatalogPlugin.js', array('jquery'), null, true);
}


add_action('wp_head', 'createJSConstants');
add_action('wp_enqueue_scripts', 'loadJs');

add_action( 'wp_ajax_getEstates', 'getEstates');
add_action( 'wp_ajax_nopriv_getEstates', 'getEstates');