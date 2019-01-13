<?php

class BaseMetabox
{
    public function __construct($value)
    {
        $this->show($value);
    }

    protected function show($value){
        $this->createHeader();
        $this->createControls($value);
    }

    protected function createHeader(){
        echo "<h2>".$this->getHeaderText()."</h2>";
    }
    protected function createControls($value){
        if($value == 1){
            echo "<input type='checkbox' name='".$this->getControlId()."' id='".$this->getControlId()."' checked style='display:block;'>";
        }
        else{
            echo "<input type='checkbox' name='".$this->getControlId()."' id='".$this->getControlId()."' style='display:block;'>";
        }
        echo "<input type='text' id='".$this->getEditorId()."' name='".$this->getEditorId()."' value='".$value."' style='display:none;'>";
    }
    
    protected function getHeaderText(){
        return null;
    }
    protected function getControlId(){
        return null;
    }
    protected function getEditorId(){
        return null;
    }
}