<?php

class SectorPostType
{
    public function __construct()
    {
        $housesPostTypeLabels = array(
            'name' => 'Участок',
            'singular_name' => 'Участок', // админ панель Добавить->Функцию
            'add_new' => 'Добавить участок',
            'add_new_item' => 'Добавление нового участка', // заголовок тега <title>
            'edit_item' => 'Редактировать участок',
            'new_item' => 'Новый участок',
            'all_items' => 'Все участки',
            'view_item' => 'Показать участок',
            'search_items' => 'Найти участок',
            'not_found' =>  'Участок не найден',
            'not_found_in_trash' => 'В корзине нет участков',
            'menu_name' => 'Участки' // ссылка в меню в админке
        );


        $args = array(
            'labels' => $housesPostTypeLabels,
            'singular_label' => __('Участок'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => Constant::$sectors),
            'supports' => array('title', 'editor', 'thumbnail','custom-fields'),

        );
        
        register_post_type(Constant::$sectors , $args );
    }
}