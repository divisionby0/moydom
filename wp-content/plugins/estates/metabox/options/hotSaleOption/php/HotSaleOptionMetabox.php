<?php

class HotSaleMetabox extends BaseMetabox
{
    protected function getHeaderText(){
        return "<font color='#ff0000'>Горячая продажа</font>";
    }
    protected function getControlId(){
        return "hotSaleOption";
    }
    protected function getEditorId(){
        return "hotSaleOptionEditor";
    }
}