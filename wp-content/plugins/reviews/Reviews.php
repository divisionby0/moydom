<?php
/*
Plugin Name: Reviews
Plugin URI: http://none
Version: 1.0
Author: divisionby0
License: none
*/

include_once("admin/ReviewPostType.php");
include_once("admin/InitReviewAdmin.php");
include_once("ReviewsList.php");

function initReviewsPlugin(){
    new ReviewPostType();
}

function displayReviewAuthorMetabox( $review ) {
    $id = $review->ID;
    $author = get_post_meta($id , 'author', true );
    echo "<p>Имя автора отзыва</p>";
    echo "<input type='text' name='reviewAuthorEditor' id='reviewAuthorEditor' value='".$author."'>";
}

function review_admin(){
    new InitReviewAdmin();
}
function admin_save_review( $review_id, $review ) {
    $postType = getCurrentPostType();
    if($postType!="reviews"){
        return;
    }
    $value = $_POST["reviewAuthorEditor"];

    if ( isset( $value )) {
        update_post_meta( $review_id, "author", $value );
    }
}

add_action( 'init', 'initReviewsPlugin' );
add_action( 'add_meta_boxes', 'review_admin' );
add_action( 'save_post', 'admin_save_review', 10, 2 );