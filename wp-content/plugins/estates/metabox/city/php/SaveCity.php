<?php


class SaveCity extends SaveMetadata
{
    protected function getEditorId(){
        return "selectedCityEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$SELECTED_CITY;
    }
}