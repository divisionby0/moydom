<?php

class SaveDialType extends SaveMetadata
{
    protected function save(){
        $dialTypes = $_POST["dialTypeEditor"];
        
        if ( isset( $dialTypes )) {
            update_post_meta( $this->estateId, 'dialTypes', $dialTypes );
        }
    }
}