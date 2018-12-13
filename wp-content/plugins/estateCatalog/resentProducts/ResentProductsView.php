<?php


class ResentProductsView
{
    public function __construct()
    {
    }
    public function setData($data, $currentId){
        if(sizeof($data) == 1){
            echo "<p>No resent estates</p>";
        }
        else{
            echo "<div class='container'><div class='row'>";
            for($i=0; $i<sizeof($data);$i++){
                $resentPostId = $data[$i]->id;
                if(intval($resentPostId) != intval($currentId)){
                    $estateData = $data[$i];
                    new ResentProductListRenderer($estateData);
                    //echo "<p>resent: ".$data[$i]->name."  cost: ".$data[$i]->cost."</p>";
                }
            }
            echo "</div></div>";
        }
    }
}