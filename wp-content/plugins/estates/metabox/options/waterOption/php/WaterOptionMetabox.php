<?php

class WaterOptionMetabox extends BaseOptionMetabox
{
    protected function getHeaderText(){
        return "Наличие водопровода";
    }
    protected function getCheckboxId(){
        return "waterOption";
    }
    protected function getEditorId(){
        return "waterOptionEditor";
    }
}