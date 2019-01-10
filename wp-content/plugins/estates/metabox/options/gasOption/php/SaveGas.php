<?php

class SaveGas extends SaveMetadata
{
    protected function getEditorId(){
        return "gasOptionEditor";
    }
    protected function getCurrentOption(){
        return Options::$GAS_OPTION;
    }
}