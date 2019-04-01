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
include_once ("admin/SearchPostByIdPage.php");

function createJSConstants() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
           var pluginsUrl = "' . plugins_url() . '";
           var siteUrl = "' . site_url() . '";
         </script>';
}

function getEstates(){
    $estateType = $_POST['estateType'];
    $saleDialType = $_POST['saleDialType'];
    $rentDialType = $_POST['rentDialType'];
    $costMin = $_POST['costMin'];
    $costMax = $_POST['costMax'];
    $floorMin = $_POST['floorMin'];
    $floorMax = $_POST['floorMax'];
    $rooms = $_POST['rooms'];
    $city = $_POST['city'];
    
    $estatesData = DataBase::getEstate($estateType, $saleDialType, $rentDialType, $city, $costMin, $costMax, $floorMin, $floorMax, $rooms);

    echo $estatesData;
    die();
}

function searchForEstate(){
    $id = $_POST['id'];

    $estatesData = DataBase::search($id);

    echo $estatesData;
    die();
}

function loadJs(){
    wp_enqueue_script( 'collections', plugin_dir_url( __FILE__ ) . '/js/lib/collections/collections.min.js', null, null, true);
    wp_enqueue_script( 'eventBus', plugin_dir_url( __FILE__ )  . '/js/lib/events/EventBus.js', null, null, true);
    wp_enqueue_script( 'ajaxService', plugin_dir_url( __FILE__ )  . '/js/service/Ajax.js', null, null, true);
    wp_enqueue_script( 'ajaxServiceEvent', plugin_dir_url( __FILE__ )  . '/js/service/AjaxServiceEvent.js', null, null, true);
    wp_enqueue_script( 'constants', plugin_dir_url( __FILE__ )  . '/js/Constants.js', null, null, true);
    wp_enqueue_script( 'cookies', plugin_dir_url( __FILE__ )  . '/js/utils/Cookie.js', null, null, true);
    wp_enqueue_script( 'catalog', plugin_dir_url( __FILE__ )  . '/js/Catalog.js', null, null, true);
    wp_enqueue_script( 'estateListRenderer', plugin_dir_url( __FILE__ )  . '/js/EstateListRenderer.js', null, null, true);
    wp_enqueue_script( 'dateUtils', plugin_dir_url( __FILE__ )  . '/js/utils/DateUtils.js', null, null, true);
    wp_enqueue_script('formatter', plugin_dir_url( __FILE__ )  .'/js/utils/StringFormatter.js', null, null, true);

    wp_enqueue_script( 'plugin', plugin_dir_url( __FILE__ )  . '/js/EstateCatalogPlugin.js', array('jquery'), null, true);
}

add_action('wp_head', 'createJSConstants');
add_action('wp_enqueue_scripts', 'loadJs');

add_action( 'wp_ajax_getEstates', 'getEstates');
add_action( 'wp_ajax_nopriv_getEstates', 'getEstates');

add_action( 'wp_ajax_searchForEstate', 'searchForEstate');
add_action( 'wp_ajax_nopriv_searchForEstate', 'searchForEstate');

function my_admin_menu() {
    add_menu_page( 'Поиск объекта', 'Поиск объекта', 'manage_options', 'myplugin/myplugin-admin-page.php', 'myplguin_admin_page', 'dashicons-search', 6  );
}

add_action( 'admin_menu', 'my_admin_menu' );

function myplguin_admin_page(){
    new SearchPostByIdPage();
}

add_action( 'admin_enqueue_scripts', 'action_function_name_9843' );
function action_function_name_9843(){
    createJSConstants();
    loadJs();
    wp_enqueue_script( 'adminSearchListItemRenderer', plugin_dir_url( __FILE__ )  . '/admin/AdminSearchListItemRenderer.js', null, null, true);
    wp_enqueue_script( 'searchPostByIdPage', plugin_dir_url( __FILE__ ) . '/admin/SearchPostByIdPage.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'searchById', plugin_dir_url( __FILE__ ) . '/admin/searchById.js', array ( 'jquery' ), 1.1, true);
}