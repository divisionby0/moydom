<?php


class OutsideAreaMetabox extends AreaMetabox
{
    protected function show($value){
        echo "<h2>Площадь участка в метрах квадратных</h2>";
        echo "<input type='number' max='2000000' name='outsideAreaEditor' id='outsideAreaEditor' value='".$value."' style='display:block;'>";
    }
}