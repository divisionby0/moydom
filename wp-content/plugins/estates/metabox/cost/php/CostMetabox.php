<?php


class CostMetabox
{
    public function __construct($cost)
    {
        $this->show($cost);
    }

    private function show($cost){
        echo "<h2>Цена</h2>";
        echo "<input type='text' name='costEditor' id='costEditor' value='".$cost."' style='display:block;'>";
    }
}