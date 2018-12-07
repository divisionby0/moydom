<?php


class DialTypeMetabox
{

    public function __construct($saleDialType, $rentDialType)
    {
       $this->show($saleDialType, $rentDialType);
    }

    private function show($saleDialType, $rentDialType){
        echo "<h2>Тип сделки</h2>";
        echo "<input type='text' name='saleTypeEditor' id='saleTypeEditor' value='".$saleDialType."' style='display:none;'>";
        echo "<input type='text' name='rentTypeEditor' id='rentTypeEditor' value='".$rentDialType."' style='display:none;'>";
        
        echo "<input type='checkbox' id='saleType'><label for='saleType'>Продажа</label>";
        echo "<input type='checkbox' id='rentType'><label for='saleType'>Аренда</label>";
    }
}