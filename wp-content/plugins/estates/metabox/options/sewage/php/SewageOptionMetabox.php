<?php

class SewageOptionMetabox extends BaseOptionMetabox
{
    protected function getHeaderText(){
        return "Наличие канализации";
    }
    protected function getCheckboxId(){
        return "sewageOption";
    }
    protected function getEditorId(){
        return "sewageOptionEditor";
    }
}