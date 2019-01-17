<?php


class SaveCost extends SaveMetadata
{
    protected function getEditorId(){
        return "costEditor";
    }
    protected function getCurrentOption(){
        return 'cost';
    }
}