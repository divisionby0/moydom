<?php
/*
Plugin Name: News
Plugin URI: http://none
Version: 1.0
Author: divisionby0
License: none
*/
function newsInit(){

    $newsPostTypeLabels = array(
        'name' => 'Полезное',
        'singular_name' => 'Полезное', // админ панель Добавить->Функцию
        'add_new' => 'Добавить Полезное',
        'add_new_item' => 'Добавление новой Полезное', // заголовок тега <title>
        'edit_item' => 'Редактировать Полезное',
        'new_item' => 'Новая Полезное',
        'all_items' => 'Все Полезное',
        'view_item' => 'Показать Полезное',
        'search_items' => 'Найти Полезное',
        'not_found' =>  'Полезное не найден',
        'not_found_in_trash' => 'В корзине нет Полезное',
        'menu_name' => 'Полезное' // ссылка в меню в админке
    );

    $newsPostTypeConfig = array(
        'labels' => $newsPostTypeLabels,
        'singular_label' => __('Полезное'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'news'),
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('news' , $newsPostTypeConfig );
}


add_action( 'init', 'newsInit' );