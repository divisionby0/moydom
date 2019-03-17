<?php

class BaseItemRenderer
{
    protected $name;
    protected $image;
    protected $url;
    protected $city;
    protected $cost;
    protected $rentDialType;
    protected $saleDialType;

    protected $rendererClass;
    protected $imageHeight;
    protected $fontSize;
    
    public function __construct($data)
    {
        $this->name = $data->name;
        $this->image = $data->image;
        $this->url = $data->url;
        $this->city = $data->city;
        $this->cost = $data->cost;

        $this->cost = number_format($this->cost, 0, '.', ' ');

        $this->rentDialType = intval($data->rentDialType);
        $this->saleDialType = intval($data->saleDialType);

        $this->rendererClass = $this->getRendererContainerClass();
        $this->imageHeight = $this->getImageHeight();
        $this->fontSize = $this->getFontSize();
        $this->createChildren();
    }
    
    protected function createChildren(){
        echo "<div class='".$this->rendererClass."' style='margin: 3px;'><a href='".$this->url."'>";
        $this->createImage($this->imageHeight, $this->image, $this->name);
        echo "<div class='col-md-12' style='font-size: ".$this->fontSize.";'><b>".$this->name."</b></div>";
        echo "<div class='col-md-12' style='font-size: ".$this->fontSize.";'>Город: <b>".$this->city."</b></div>";
        echo "<div class='col-md-12' style='font-size: ".$this->fontSize.";'>Цена: <b><span style='font-size:0.9em!important;'>".$this->cost." руб</span></b></div>";
        echo "</a></div>";
    }
    
    protected function createImage(){
        $iconUrl = plugins_url(). "/estateCatalog/assets/";
        if($this->rentDialType==1 && $this->saleDialType == 1){
            $iconUrl.="renderer_rent_sale.png";
        }
        elseif($this->rentDialType==1){
            $iconUrl.="renderer_rent.png";
        }
        else{
            $iconUrl.="renderer_sale.png";
        }
        echo "<div class='col-md-12' style='padding:0!important; border: solid 1px #f3f3f3; height: ".$this->imageHeight."; position:relative;'><img src='".$this->image."' class='img-fluid'  alt='".$this->name."' style='padding-top: 1px; padding-bottom:3px; max-height:".$this->imageHeight."!important;'>";
        echo "<img style='position: absolute; top: 0;' src='".$iconUrl."'/></div>";

        //echo "<div class='col-md-12' style='height: ".$this->imageHeight."; position:relative;'><img src='".$this->image."' class='img-fluid img-thumbnail'  alt='".$this->name."' style='max-height:".$this->imageHeight."!important;'></div>";
    }

    protected function getImageHeight(){
        return "250px";
    }

    protected function getRendererContainerClass(){
        return "col-md-4";
    }
    protected function getFontSize(){
        return "1.2em";
    }
}