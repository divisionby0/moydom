<?php

class ElectricityOptionMetabox extends BaseOptionMetabox
{
    protected function getHeaderText(){
        return "Наличие электричества";
    }
    protected function getCheckboxId(){
        return "electricityOption";
    }
    protected function getEditorId(){
        return "electricityOptionEditor";
    }
}