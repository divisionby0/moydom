<?php

class QueryBuilder
{
    public static function createQuery($estateType, $saleDialType, $rentDialType, $city, $costMin, $costMax, $postsPerPage = "-1"){

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

        if($costMin && $costMax){
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

        $args = array(
            'post_type'      => $estateType,
            'post_status'    => 'publish',
            'posts_per_page'  =>$postsPerPage,
            'meta_query'     => $metaQuery
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