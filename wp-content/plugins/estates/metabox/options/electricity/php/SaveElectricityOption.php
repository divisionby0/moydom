<?php


class SaveElectricityOption extends SaveMetadata
{
    protected function getEditorId(){
        return "electricityOptionEditor";
    }
    protected function getCurrentOption(){
        return Options::$ELECTRICITY_OPTION;
    }
}