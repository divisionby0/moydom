<?php

class WaterMetabox extends BaseMetabox
{
    protected function getHeaderText(){
        return "Наличие водопровода";
    }
    protected function getControlId(){
        return "waterOption";
    }
    protected function getEditorId(){
        return "waterOptionEditor";
    }
}