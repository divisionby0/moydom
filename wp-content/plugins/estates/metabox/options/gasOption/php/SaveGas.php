<?php

class SaveGas extends SaveMetadata
{
    protected function getEditorId(){
        return "gasOptionEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$GAS_OPTION;
    }
}