<?php


class TotalFloorsMetabox
{
    public function __construct($total)
    {
        $this->show($total);
    }

    private function show($total){
        echo "<h2>Всего этажей</h2>";
        echo "<input type='number' max='20' name='totalFloorsEditor' id='totalFloorsEditor' value='".$total."' style='display:block;'>";
    }
}