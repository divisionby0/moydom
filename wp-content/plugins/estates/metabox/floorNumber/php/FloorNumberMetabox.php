<?php

class FloorNumberMetabox
{
    public function __construct($floor)
    {
        $this->show($floor);
    }

    private function show($floor){
        echo "<h2>Номер этажа</h2>";
        echo "<input type='number' max='20' name='floorEditor' id='floorEditor' value='".$floor."' style='display:block;'>";
    }
}