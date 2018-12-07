<?php

class FlatPostType
{
    public function __construct()
    {
        $housesPostTypeLabels = array(
            'name' => 'Квартира',
            'singular_name' => 'Квартира', // админ панель Добавить->Функцию
            'add_new' => 'Добавить квартиру',
            'add_new_item' => 'Добавление новой квартиры', // заголовок тега <title>
            'edit_item' => 'Редактировать квартиру',
            'new_item' => 'Новая квартира',
            'all_items' => 'Все квартиры',
            'view_item' => 'Показать квартиру',
            'search_items' => 'Найти квартиру',
            'not_found' => 'Квартира не найден',
            'not_found_in_trash' => 'В корзине нет квартир',
            'menu_name' => 'Квартиры' // ссылка в меню в админке
        );


        $args = array(
            'labels' => $housesPostTypeLabels,
            'singular_label' => __('Квартира'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => Constant::$flats),
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),

        );

        register_post_type('flats', $args);
    }
}