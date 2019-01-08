<?php

class AreaMetabox
{
    public function __construct($value)
    {
        $this->show($value);
    }

    protected function show($value){
        echo "<h2>Площадь в метрах квадратных</h2>";
        echo "<input type='number' max='2000000' name='areaEditor' id='areaEditor' value='".$value."' style='display:block;'>";
    }
}