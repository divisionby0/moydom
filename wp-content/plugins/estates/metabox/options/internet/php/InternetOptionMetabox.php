<?php

class InternetMetabox extends BaseMetabox
{
    protected function getHeaderText(){
        return "Наличие Интернета";
    }
    protected function getControlId(){
        return "internetOption";
    }
    protected function getEditorId(){
        return "internetOptionEditor";
    }
}