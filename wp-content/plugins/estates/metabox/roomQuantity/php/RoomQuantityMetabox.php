<?php

class RoomQuantityMetabox
{
    public function __construct($roomQuantity)
    {
        $this->show($roomQuantity);
    }

    private function show($roomQuantity){
        echo "<h2>Всего комнат</h2>";
        echo "<input type='number' max='10' name='roomsEditor' id='roomsEditor' value='".$roomQuantity."' style='display:block;'>";
    }
}