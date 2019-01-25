<?php

class DataBase
{
    public static function getCities(){
        $cities = array();
        $query = new WP_Query(array(
            'post_type' => 'city',
            'post_status' => 'publish',
            'posts_per_page' => -1
        ));

        while ($query->have_posts()) {
            $query->the_post();
            $cityName = get_the_title();
            array_push($cities, $cityName);
        }
        sort($cities);

        return $cities;
    }

    
    public static function search($value){
        $isInteger  = preg_match('/^\d+$/', $value);
        if($isInteger){
            $queryData = QueryBuilder::createSearchQueryById($value);
        }
        else{
            $queryData = QueryBuilder::createSearchQueryByAddress($value);
        }
        $query = new WP_Query( $queryData );

        $posts = $query->posts;

        $estates = DataBase::parseCollection($posts);

        wp_reset_postdata();

        return json_encode($estates);
    }
    
    public static function getEstate($estateType, $saleDialType, $rentDialType, $city, $costMin, $costMax, $floorMin, $floorMax){
        // TODO https://css-tricks.com/snippets/wordpress/custom-loop-based-on-custom-fields/
		// TODO https://www.google.com.ua/search?client=opera&hs=IRv&ei=TxEJXIfjFoa5swH_m7KwCw&q=wordpress+select+by+custom+fields+values&oq=wordpress+select+by+custom+fields+values&gs_l=psy-ab.3...733881.734972..735212...0.0..0.158.249.1j1......0....1..gws-wiz.......0i71.g8LkObXlP-I
        
        $queryData = QueryBuilder::createQuery($estateType, $saleDialType, $rentDialType, $city, $costMin, $costMax, $floorMin, $floorMax);
        $query = new WP_Query( $queryData );

        $posts = $query->posts;
        
        $estates = DataBase::parseCollection($posts);
        
        wp_reset_postdata();

        return json_encode($estates);
    }
    
    public static function getHotSaleEstates($estateType){
        $queryData = QueryBuilder::createGetHotSaleQuery($estateType);
        $query = new WP_Query( $queryData );

        $posts = $query->posts;
        $estates = DataBase::parseCollection($posts);
        wp_reset_postdata();

        return json_encode($estates);
    }
    
    private static function parseCollection($posts){
        $estates = array();
        foreach($posts as $post) {
            $id = $post->ID;
            $name = $post->post_title;
            $date = $post->post_date;
            $type = $post->post_type;
            //$description = $post->post_content;
            $url = $post->guid;
            $image = wp_get_attachment_url( get_post_thumbnail_id($id), 'thumbnail');
            $estateType = get_post_type($id);
            $city = get_post_meta($id, "selectedCity")[0];
            $saleDialType = get_post_meta($id, "saleDialType")[0];
            $rentDialType = get_post_meta($id, "rentDialType")[0];
            $cost = get_post_meta($id, "cost")[0];

            $rooms = 0;
            $roomsData = get_post_meta($id, "rooms");
            if(isset($roomsData) && sizeof($roomsData)>0){
                $rooms = $roomsData[0];
            }

            $area = 0;
            $areaOutside = 0;
            $areaData = get_post_meta($id, "area");
            $areaOutsideData = get_post_meta($id, "outsideArea");

            if(isset($areaData) && sizeof($areaData)>0){
                $area = $areaData[0];
            }
            if(isset($areaOutsideData) && sizeof($areaOutsideData)>0){
                $areaOutside = $areaOutsideData[0];
            }

            $addressData = get_post_meta($id, "address");
            $address = "";
            if(sizeof($addressData)!=0){
                $address = get_post_meta($id, "address")[0];
            }

            $floorData = get_post_meta($id, "floor");
            $totalFloorsData = get_post_meta($id, "totalFloors");
            $floor = 0;
            $totalFloors = 0;

            if(isset($floorData) && sizeof($floorData)>0){
                $floor = $floorData[0];
            }
            if(isset($totalFloorsData) && sizeof($totalFloorsData)>0){
                $totalFloors = $totalFloorsData[0];
            }

            //$estate = array("id"=>$id, "name"=>$name, "description"=>$description, "image"=>$image, "url"=>$url, "estateType"=>$estateType, "saleDialType"=>$saleDialType, "rentDialType"=>$rentDialType, "city"=>$city, "cost"=>$cost);
            $estate = array("id"=>$id, "name"=>$name, "image"=>$image, "url"=>$url, "estateType"=>$estateType, "saleDialType"=>$saleDialType, "rentDialType"=>$rentDialType, "city"=>$city, "cost"=>$cost, "floor"=>$floor,"totalFloors"=>$totalFloors,"area"=>$area, "areaOutside"=>$areaOutside, "rooms"=>$rooms, "address"=>$address, "date"=>$date, "type"=>$type);

            array_push($estates, $estate);
        }
        return $estates;
    }
}