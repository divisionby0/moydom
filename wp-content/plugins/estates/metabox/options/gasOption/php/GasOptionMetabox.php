<?php


class GasOptionMetabox extends BaseOptionMetabox
{
    protected function getHeaderText(){
        return "Наличие газа";
    }
    protected function getCheckboxId(){
        return "gasOption";
    }
    protected function getEditorId(){
        return "gasOptionEditor";
    }
}