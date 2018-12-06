<?php


class DialTypeMetabox
{

    public function __construct($types)
    {
       $this->show($types);
    }

    private function show($types){
        echo "<h2>Тип сделки</h2>";
        echo "<input type='text' name='dialTypeEditor' id='dialTypeEditor' value='".$types."' style='display:none;'>";
        
        echo "<input type='checkbox' id='saleType'><label for='saleType'>Продажа</label>";
        echo "<input type='checkbox' id='rentType'><label for='saleType'>Аренда</label>";
    }
}