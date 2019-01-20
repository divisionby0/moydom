<?php


class GaragePostType
{
    public function __construct()
    {
        $garagePostTypeLabels = array(
            'name' => 'Гараж',
            'singular_name' => 'Гараж', // админ панель Добавить->Функцию
            'add_new' => 'Добавить гараж',
            'add_new_item' => 'Добавление нового гаража', // заголовок тега <title>
            'edit_item' => 'Редактировать гараж',
            'new_item' => 'Новый гараж',
            'all_items' => 'Все гаражи',
            'view_item' => 'Показать гараж',
            'search_items' => 'Найти гараж',
            'not_found' =>  'Гараж не найден',
            'not_found_in_trash' => 'В корзине нет гаражей',
            'menu_name' => 'Гаражи' // ссылка в меню в админке
        );


        $args = array(
            'labels' => $garagePostTypeLabels,
            'singular_label' => __('Гараж'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => Constant::$garages),
            'supports' => array('title', 'editor', 'thumbnail','custom-fields'),

        );

        register_post_type(Constant::$garages , $args );
    }
}