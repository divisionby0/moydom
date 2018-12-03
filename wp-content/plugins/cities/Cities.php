<?php
/*
Plugin Name: Cities
Plugin URI: http://none
Version: 1.0
Author: divisionby0
License: none
*/
function cityInit(){

    $cityPostTypeLabels = array(
        'name' => 'Города',
        'singular_name' => 'Город', // админ панель Добавить->Функцию
        'add_new' => 'Добавить город',
        'add_new_item' => 'Добавление нового города', // заголовок тега <title>
        'edit_item' => 'Редактировать город',
        'new_item' => 'Новый город',
        'all_items' => 'Все города',
        'view_item' => 'Показать город',
        'search_items' => 'Найти город',
        'not_found' =>  'Город не найден',
        'not_found_in_trash' => 'В корзине нет городов',
        'menu_name' => 'Города' // ссылка в меню в админке
    );

    $cityPostTypeConfig = array(
        'labels' => $cityPostTypeLabels,
        'singular_label' => __('Города'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'city'),
        'supports' => array('title')
    );

    register_post_type('city' , $cityPostTypeConfig );
}


add_action( 'init', 'cityInit' );