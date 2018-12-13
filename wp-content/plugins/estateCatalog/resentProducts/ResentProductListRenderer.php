<?php

class ResentProductListRenderer
{
    public function __construct($data)
    {
        //$id = $data->id;
        $name = $data->name;
        $image = $data->image;
        $url = $data->url;
        $city = $data->city;
        $cost = $data->cost;

        echo "<div class='col-md-4' style='margin: 3px;'><a href='".$url."'>";
        echo "<div class='col-md-12''><img src='".$image."' class='img-fluid img-thumbnail'  alt='".$name."'></div>";
        echo "<div class='col-md-12' style='font-size: 1.2em;'><b>".$name."</b></div>";
        echo "<div class='col-md-12' style='font-size: 1.2em;'>Город: ".$city."</b></div>";
        echo "<div class='col-md-12' style='font-size: 1.2em;'>Цена:".$cost." руб</b></div>";
        echo "</a></div>";
    }
}