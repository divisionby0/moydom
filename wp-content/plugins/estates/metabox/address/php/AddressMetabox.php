<?php

class AddressMetabox extends BaseMetabox
{
    protected function createControls($value){
        echo "<input type='text' name='".$this->getEditorId()."' id='".$this->getEditorId()."' value='".$value."' style='display:block; width:600px;'>";
    }

    protected function getHeaderText(){
        return "Адрес";
    }
    protected function getControlId(){
        return null;
    }
    protected function getEditorId(){
        return "addressEditor";
    }
}