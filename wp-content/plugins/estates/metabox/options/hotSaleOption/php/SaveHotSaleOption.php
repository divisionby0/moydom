<?php


class SaveHotSaleOption extends SaveMetadata
{
    protected function getEditorId(){
        return "hotSaleOptionEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$HOT_SALE_OPTION;
    }
}