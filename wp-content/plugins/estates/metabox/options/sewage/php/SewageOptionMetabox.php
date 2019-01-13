<?php

class SewageMetabox extends BaseMetabox
{
    protected function getHeaderText(){
        return "Наличие канализации";
    }
    protected function getControlId(){
        return "sewageOption";
    }
    protected function getEditorId(){
        return "sewageOptionEditor";
    }
}