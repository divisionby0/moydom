<?php

class ReviewsList
{
    private $reviewCollection;
    
    public function __construct()
    {
        $reviews = array();
        $args = array(
            'post_type'      => "reviews",
            'post_status'    => 'publish',
            'posts_per_page'  => 1000000
        );

        $query = new WP_Query( $args );

        $posts = $query->posts;
        wp_reset_postdata();

        foreach($posts as $post) {
            $id = $post->ID;
            $date = get_the_date("", $post);
            $review = array("text"=>$post->post_content, "author"=>get_post_meta($id, "author")[0], "date"=>$date);
            array_push($reviews, $review);
        }

        for($i=0; $i<sizeof($reviews); $i++){
            $review = $reviews[$i];
            echo "<div class='col-md-12' style='margin-bottom: 17px;'>";
            echo "<div class='col-md-12'>От: ".$review["author"]."</div>";
            echo "<div class='col-md-12'><span style='color: #315a86;'>".$review["text"]."</span></div>";
            echo "<div class='col-md-12'>Был оставлен: ".$review["date"]."</div>";
            echo "</div>";
        }
    }
}