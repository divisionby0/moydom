<?php

/**
 * Created by PhpStorm.
 * User: home
 * Date: 08.01.2019
 * Time: 16:32
 */
class HotSaleOptionMetabox
{
    public function __construct($value)
    {
        $this->show($value);
    }

    private function show($value){
        echo "<h2>Горячая продажа</h2>";
        if($value == 1){
            echo "<input type='checkbox' name='hotSaleOption' id='hotSaleOption' checked style='display:block;'>";
        }
        else{
            echo "<input type='checkbox' name='hotSaleOption' id='hotSaleOption' style='display:block;'>";
        }
        echo "<input type='text' id='hotSaleOptionEditor' name='hotSaleOptionEditor' value='".$value."'>";
    }
}