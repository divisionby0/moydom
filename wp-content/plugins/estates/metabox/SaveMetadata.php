<?php


class SaveMetadata
{
    protected $estateId;

    public function __construct($estateId, $estate)
    {
        $this->estateId = $estateId;
        $this->save();
    }

    private function save(){
        $value = $_POST[$this->getEditorId()];

        if ( isset( $value )) {
            update_post_meta( $this->estateId, $this->getCurrentOption(), $value );
        }
    }
    
    protected function getEditorId(){
        return "";
    }
    protected function getCurrentOption(){
        return "";
    }
}