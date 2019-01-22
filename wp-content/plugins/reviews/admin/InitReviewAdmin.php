<?php


class InitReviewAdmin
{
    public function __construct()
    {
        add_meta_box( 'edit_review_meta_box',
            'Имя',
            'displayReviewAuthorMetabox',
            "reviews", 'normal', 'high'
        );
    }
}