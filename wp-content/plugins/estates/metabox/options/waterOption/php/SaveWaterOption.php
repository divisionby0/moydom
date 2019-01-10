<?php


class SaveWaterOption extends SaveMetadata
{
    protected function getEditorId(){
        return "waterOptionEditor";
    }
    protected function getCurrentOption(){
        return Options::$WATER_OPTION;
    }
}