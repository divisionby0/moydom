<?php

class ElectricityMetabox extends BaseMetabox
{
    protected function getHeaderText(){
        return "Наличие электричества";
    }
    protected function getControlId(){
        return "electricityOption";
    }
    protected function getEditorId(){
        return "electricityOptionEditor";
    }
}