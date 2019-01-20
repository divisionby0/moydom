<?php

class CountryHousePostType
{
    public function __construct()
    {
        $countryHousePostTypeLabels = array(
            'name' => 'Дача',
            'singular_name' => 'Дача', // админ панель Добавить->Функцию
            'add_new' => 'Добавить дачу',
            'add_new_item' => 'Добавление новой дачи', // заголовок тега <title>
            'edit_item' => 'Редактировать дачу',
            'new_item' => 'Новая дача',
            'all_items' => 'Все дачи',
            'view_item' => 'Показать дачу',
            'search_items' => 'Найти дачу',
            'not_found' =>  'Дача не найден',
            'not_found_in_trash' => 'В корзине нет дач',
            'menu_name' => 'Дачи' // ссылка в меню в админке
        );


        $args = array(
            'labels' => $countryHousePostTypeLabels,
            'singular_label' => __('Дача'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => Constant::$countryHouses),
            'supports' => array('title', 'editor', 'thumbnail','custom-fields'),

        );

        register_post_type(Constant::$countryHouses , $args );
    }
}