<?php


class ReviewPostType
{
    public function __construct()
    {
        $reviewsPostTypeLabels = array(
            'name' => 'Отзыв',
            'singular_name' => 'Отзыв', // админ панель Добавить->Функцию
            'add_new' => 'Добавить отзыв',
            'add_new_item' => 'Добавление нового отзыва', // заголовок тега <title>
            'edit_item' => 'Редактировать отзыв',
            'new_item' => 'Новый отзыв',
            'all_items' => 'Все отзывы',
            'view_item' => 'Показать отзыв',
            'search_items' => 'Найти отзыв',
            'not_found' =>  'Отзыв не найден',
            'not_found_in_trash' => 'В корзине нет отзывов',
            'menu_name' => 'Отзывы' // ссылка в меню в админке
        );


        $args = array(
            'labels' => $reviewsPostTypeLabels,
            'singular_label' => __('Отзыв'),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => "reviews"),
            'supports' => array('title', 'editor'),
        );

        register_post_type('reviews' , $args );
    }
}