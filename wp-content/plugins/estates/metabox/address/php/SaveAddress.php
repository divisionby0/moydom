<?php

class SaveAddress extends SaveMetadata
{
    protected function getEditorId(){
        return "addressEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$ADDRESS;
    }
}