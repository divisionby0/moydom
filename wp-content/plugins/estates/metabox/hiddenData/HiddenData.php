<?php

class HiddenData{
    protected $data = "";
    protected $editorName;
    
    public function __construct($data)
    {
        $this->data = $data;
        $isAvailable = $this->checkIsAvailable();
        
        if($isAvailable){
            $this->show();
        }
    }

    protected function show(){
        
    }
    
    private function checkIsAvailable()
    {
        return Utils::isAdministratorRole();
    }
}