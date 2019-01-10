<?php


class SaveHotSaleOption extends SaveMetadata
{
    protected function getEditorId(){
        return "hotSaleOptionEditor";
    }
    protected function getCurrentOption(){
        return Options::$HOT_SALE_OPTION;
    }
}