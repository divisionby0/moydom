<?php

class HotSaleListRenderer extends BaseItemRenderer
{
    protected function createImage(){
        echo "<div class='col-md-12' style='padding:0!important; border: solid 1px #f3f3f3; height: ".$this->imageHeight."; position:relative;'><img src='".$this->image."' class='img-fluid'  alt='".$this->name."' style='padding-top: 1px; padding-bottom:3px; max-height:".$this->imageHeight."!important;'>";
        echo "<img style='position: absolute; top: 0;' src='".plugins_url()."/estateCatalog/assets/renderer_hot.png'/></div>";
    }

    protected function getRendererContainerClass(){
        return "col-md-2";
    }
    protected function getImageHeight(){
        return "100px";
    }
    protected function getFontSize(){
        return "1em";
    }
}