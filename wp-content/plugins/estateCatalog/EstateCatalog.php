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

include_once ("common/view/BaseItemRenderer.php");


// resent
include_once ("resentProducts/ResentProductsView.php");
include_once ("resentProducts/ResentProductsModel.php");
include_once ("resentProducts/ResentProductsController.php");
include_once ("resentProducts/ResentProducts.php");

include_once ("hotSale/HotSaleListRenderer.php");
include_once ("hotSale/HotSaleView.php");
include_once ("hotSale/HotSaleModel.php");
include_once ("hotSale/HotSaleController.php");

function createJSConstants() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
           var pluginsUrl = "' . plugins_url() . '";
         </script>';
}

function getEstates(){
    $estateType = $_POST['estateType'];
    $saleDialType = $_POST['saleDialType'];
    $rentDialType = $_POST['rentDialType'];
    $costMin = $_POST['costMin'];
    $costMax = $_POST['costMax'];
    $city = $_POST['city'];
    
    $estatesData = DataBase::getEstate($estateType, $saleDialType, $rentDialType, $city, $costMin, $costMax);

    echo $estatesData;
    die();
}

function loadJs(){
    wp_enqueue_script( 'collections', plugin_dir_url( __FILE__ ) . '/js/lib/collections/collections.min.js', null, null, true);
    wp_enqueue_script( 'eventBus', plugin_dir_url( __FILE__ )  . '/js/lib/events/EventBus.js', null, null, true);
    wp_enqueue_script( 'ajaxService', plugin_dir_url( __FILE__ )  . '/js/service/Ajax.js', null, null, true);
    wp_enqueue_script( 'ajaxServiceEvent', plugin_dir_url( __FILE__ )  . '/js/service/AjaxServiceEvent.js', null, null, true);
    wp_enqueue_script( 'constants', plugin_dir_url( __FILE__ )  . '/js/Constants.js', null, null, true);
    wp_enqueue_script( 'catalog', plugin_dir_url( __FILE__ )  . '/js/Catalog.js', null, null, true);
    wp_enqueue_script( 'estateListRenderer', plugin_dir_url( __FILE__ )  . '/js/EstateListRenderer.js', null, null, true);
    wp_enqueue_script( 'dateUtils', plugin_dir_url( __FILE__ )  . '/js/utils/DateUtils.js', null, null, true);
    wp_enqueue_script( 'plugin', plugin_dir_url( __FILE__ )  . '/js/EstateCatalogPlugin.js', array('jquery'), null, true);
}


add_action('wp_head', 'createJSConstants');
add_action('wp_enqueue_scripts', 'loadJs');

add_action( 'wp_ajax_getEstates', 'getEstates');
add_action( 'wp_ajax_nopriv_getEstates', 'getEstates');