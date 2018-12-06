<?php


class SaveMetadata
{
    protected $estateId;

    public function __construct($estateId, $estate)
    {
        $this->estateId = $estateId;
        $this->save();
    }
    
    protected function save(){
    }
}