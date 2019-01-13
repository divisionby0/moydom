<?php

class SaveSewage extends SaveMetadata
{
    protected function getEditorId(){
        return "sewageOptionEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$GAS_OPTION;
    }
}