<?php

class HotSaleView
{
    public function setData($data){
        if(isset($data) && sizeof($data)>0){
            echo "<div class='container'><div class='row'>";
            for($i=0; $i<sizeof($data);$i++){
                $estateData = $data[$i];
                new HotSaleListRenderer($estateData);
            }
            echo "</div></div>";
        }
        else{
            
        }
    }
}