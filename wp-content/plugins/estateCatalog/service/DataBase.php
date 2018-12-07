<?php

class DataBase
{
    public static function getCities(){
        $cities = array();
        $query = new WP_Query(array(
            'post_type' => 'city',
            'post_status' => 'publish'
        ));

        while ($query->have_posts()) {
            $query->the_post();
            $cityName = get_the_title();
            array_push($cities, $cityName);
        }

        sort($cities);

        return $cities;
    }

    public static function getEstate($estateType, $saleDialType, $rentDialType, $city){
        // TODO https://css-tricks.com/snippets/wordpress/custom-loop-based-on-custom-fields/
		// TODO https://www.google.com.ua/search?client=opera&hs=IRv&ei=TxEJXIfjFoa5swH_m7KwCw&q=wordpress+select+by+custom+fields+values&oq=wordpress+select+by+custom+fields+values&gs_l=psy-ab.3...733881.734972..735212...0.0..0.158.249.1j1......0....1..gws-wiz.......0i71.g8LkObXlP-I

        echo "<p>sale dial type: ".$saleDialType."</p>";
        echo "<p>rent dial type: ".$rentDialType."</p>";
        
        $queryData = QueryBuilder::createQuery($estateType, $saleDialType, $rentDialType, $city);
        $query = new WP_Query( $queryData );

        $estates = array();

        $posts = $query->posts;

        foreach($posts as $post) {
            // Do your stuff, e.g.
            // echo $post->post_name;
            $id = $post->ID;
            $name = $post->post_title;
            $description = $post->post_content;
            $url = $post->guid;
            $image = wp_get_attachment_url( get_post_thumbnail_id($id), 'thumbnail');
            $estateType = get_post_type($id);
            $city = get_post_meta($id, "selectedCity")[0];
            $saleDialType = get_post_meta($id, "saleDialType")[0];
            $rentDialType = get_post_meta($id, "rentDialType")[0];

            $estate = array("id"=>$id, "name"=>$name, "description"=>$description, "image"=>$image, "url"=>$url, "estateType"=>$estateType, "saleDialType"=>$saleDialType, "rentDialType"=>$rentDialType, "city"=>$city);
            
            array_push($estates, $estate);
        }

        wp_reset_postdata();

        return json_encode($estates);
    }
}