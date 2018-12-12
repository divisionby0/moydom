<?php

/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 12.12.2018
 * Time: 12:08
 */
class CommerceEstatePostType
{
    public function __construct()
    {
        $commEstatesPostTypeLabels = array(
            'name' => 'Коммерческая недвиж',
            'singular_name' => 'Коммерческая недвиж', // админ панель Добавить->Функцию
            'add_new' => 'Добавить коммерческую недвиж',
            'add_new_item' => 'Добавление новой коммерческой недвиж', // заголовок тега <title>
            'edit_item' => 'Редактировать коммерческую недвиж',
            'new_item' => 'Новая коммерческая недвиж',
            'all_items' => 'Вся коммерческая недвиж',
            'view_item' => 'Показать коммерческую недвиж',
            'search_items' => 'Найти коммерческую недвиж',
            'not_found' =>  'Коммерческая недвиж не найдена',
            'not_found_in_trash' => 'В корзине нет коммерческой недвиж',
            'menu_name' => 'Коммерческая недвижимость' // ссылка в меню в админке
        );


        $args = array(
            'labels' => $commEstatesPostTypeLabels,
            'singular_label' => __('Коммерческая недвиж'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => Constant::$commercialEstates),
            'supports' => array('title', 'editor', 'thumbnail','custom-fields'),

        );


        register_post_type(Constant::$commercialEstates , $args );
    }
}