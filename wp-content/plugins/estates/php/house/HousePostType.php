<?php


class HousePostType
{
    public function __construct()
    {
        $housesPostTypeLabels = array(
            'name' => 'Дом',
            'singular_name' => 'Дом', // админ панель Добавить->Функцию
            'add_new' => 'Добавить дом',
            'add_new_item' => 'Добавление нового дома', // заголовок тега <title>
            'edit_item' => 'Редактировать дом',
            'new_item' => 'Новый дом',
            'all_items' => 'Все дома',
            'view_item' => 'Показать дом',
            'search_items' => 'Найти дом',
            'not_found' =>  'дом не найден',
            'not_found_in_trash' => 'В корзине нет домов',
            'menu_name' => 'Дома' // ссылка в меню в админке
        );


        $args = array(
            'labels' => $housesPostTypeLabels,
            'singular_label' => __('Дом'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => Constant::$houses),
            'supports' => array('title', 'editor', 'thumbnail','custom-fields'),

        );

        /*
        register_post_type( 'houses',
            array(
                'labels' => $housesPostTypeLabels,
                'public' => true,
                'has_archive' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'custom-fields'
                ),
            )
        );
        */
        register_post_type('houses' , $args );
    }
}