<?php

class QueryBuilder
{
    public static function createQuery($estateType, $saleDialType, $rentDialType, $city, $costMin, $costMax, $floorMin, $floorMax, $postsPerPage = "-1"){

        $saleQuery = null;

        $metaQuery = array(array(
            'key'     => 'selectedCity',
            'value'   => $city
        ));

        if(($saleDialType === "1" && $rentDialType === "1")){
            array_push($metaQuery, array(
                'key'     => 'saleDialType',
                'value'   => array("0","1"),
                'compare' => 'IN',
            ));
            array_push($metaQuery, array(
                'key'     => 'rentDialType',
                'value'   => array("0","1"),
                'compare' => 'IN',
            ));
        }
        else if($saleDialType === "0" && $rentDialType === "0"){
            array_push($metaQuery, array(
                'key'     => 'saleDialType',
                'value'   => $saleDialType
            ));
            array_push($metaQuery, array(
                'key'     => 'rentDialType',
                'value'   => $rentDialType
            ));
        }
        else if($saleDialType === "0" && $rentDialType === "1"){
            array_push($metaQuery, array(
                'key'     => 'rentDialType',
                'value'   => $rentDialType
            ));
        }
        else if($saleDialType === "1" && $rentDialType === "0"){
            array_push($metaQuery, array(
                'key'     => 'saleDialType',
                'value'   => $saleDialType
            ));
        }

        if(isset($costMin) && isset($costMax)){
            $costs = array();
            $costs[0] = $costMin;
            $costs[1] = $costMax;

            array_push($metaQuery, array(
                'key'     => 'cost',
                'value'   => array($costMin, $costMax),
                'compare' => "BETWEEN",
                'type' => 'NUMERIC'
            ));
        }

        if($estateType == Constant::$flats){
            if(isset($floorMin) && isset($floorMax)){
                array_push($metaQuery, array(
                    'key'     => 'floor',
                    'value'   => array($floorMin, $floorMax),
                    'compare' => "BETWEEN",
                    'type' => 'NUMERIC'
                ));
            }
        }
        
        $args = array(
            'post_type'      => $estateType,
            'post_status'    => 'publish',
            'posts_per_page'  =>$postsPerPage,
            'meta_query'     => $metaQuery
        );
        return $args;
    }

    public static function createSearchQueryByAddress($value){
        $metaQuery = array(array(
            'key'     => MetaboxConstants::$ADDRESS,
            'value'   => $value,
            'compare' => 'LIKE'
        ));

        $args = array(
            'post_type'      => array(Constant::$commercialEstates, Constant::$flats, Constant::$houses, Constant::$sectors),
            'post_status'    => 'publish',
            'posts_per_page'  => 1000000,
            'meta_query'     => $metaQuery
        );
        return $args;
    }

    public static function createSearchQueryById($value){
        $args = array(
            'p'         => $value, // ID of a page, post, or custom type
            'post_type' => array(Constant::$commercialEstates, Constant::$flats, Constant::$houses, Constant::$sectors)
        );
        return $args;
    }

    public static function createGetHotSaleQuery($estateType){
        $metaQuery = array(array(
            'key'     => 'hotSale',
            'value'   => 1
        ));
        $args = array(
            'post_type'      => $estateType,
            'post_status'    => 'publish',
            'meta_query'     => $metaQuery
        );
        return $args;
    }
}