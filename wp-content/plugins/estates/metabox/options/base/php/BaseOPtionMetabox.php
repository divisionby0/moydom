<?php

class BaseOptionMetabox
{
    
    public function __construct($value)
    {
        $this->show($value);
    }

    protected function show($value){
        echo "<h2>".$this->getHeaderText()."</h2>";
        if($value == 1){
            echo "<input type='checkbox' name='".$this->getCheckboxId()."' id='".$this->getCheckboxId()."' checked style='display:block;'>";
        }
        else{
            echo "<input type='checkbox' name='".$this->getCheckboxId()."' id='".$this->getCheckboxId()."' style='display:block;'>";
        }
        echo "<input type='text' id='".$this->getEditorId()."' name='".$this->getEditorId()."' value='".$value."' style='display:none;'>";
    }
    
    protected function getHeaderText(){
        return null;
    }
    protected function getCheckboxId(){
        return null;
    }
    protected function getEditorId(){
        return null;
    }
}