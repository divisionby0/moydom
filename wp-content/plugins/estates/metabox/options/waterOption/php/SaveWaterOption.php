<?php


class SaveWaterOption extends SaveMetadata
{
    protected function getEditorId(){
        return "waterOptionEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$WATER_OPTION;
    }
}