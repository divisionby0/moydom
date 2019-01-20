<?php


class ResentProductsView
{
    public function __construct()
    {
    }
    public function setData($data, $currentId){
        if(sizeof($data) == 1){
            echo "<p>Нет похожих</p>";
        }
        else{
            echo "<div class='container'><div class='row'>";
            for($i=0; $i<sizeof($data);$i++){
                $resentPostId = $data[$i]->id;
                if(intval($resentPostId) != intval($currentId)){
                    $estateData = $data[$i];
                    new HotSaleListRenderer($estateData);
                }
            }
            echo "</div></div>";
        }
    }
}