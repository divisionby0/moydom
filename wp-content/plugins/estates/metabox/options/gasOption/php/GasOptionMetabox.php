<?php


class GasMetabox extends BaseMetabox
{
    protected function getHeaderText(){
        return "Наличие газа";
    }
    protected function getControlId(){
        return "gasOption";
    }
    protected function getEditorId(){
        return "gasOptionEditor";
    }
}