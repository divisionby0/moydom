<?php


class SaveArea extends SaveMetadata
{
    protected function getEditorId(){
        return "areaEditor";
    }
    protected function getCurrentOption(){
        return 'area';
    }
}