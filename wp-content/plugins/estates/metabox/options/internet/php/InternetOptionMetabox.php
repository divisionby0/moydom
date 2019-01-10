<?php

class InternetOptionMetabox extends BaseOptionMetabox
{
    protected function getHeaderText(){
        return "Наличие Интернета";
    }
    protected function getCheckboxId(){
        return "internetOption";
    }
    protected function getEditorId(){
        return "internetOptionEditor";
    }
}