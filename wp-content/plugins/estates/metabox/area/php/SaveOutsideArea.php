<?php

class SaveOutsideArea extends SaveMetadata
{
    protected function save(){
        $outsideArea = $_POST["outsideAreaEditor"];
        if ( isset( $outsideArea )) {
            update_post_meta( $this->estateId, 'outsideArea', $outsideArea );
        }
    }
}