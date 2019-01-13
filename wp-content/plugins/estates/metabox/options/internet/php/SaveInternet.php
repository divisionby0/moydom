<?php

class SaveInternet extends SaveMetadata
{
    protected function getEditorId(){
        return "internetOptionEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$INTERNET_OPTION;
    }
}