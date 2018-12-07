<?php

class SaveDialType extends SaveMetadata
{
    protected function save(){
        $saleDialType = $_POST["saleTypeEditor"];
        $rentDialType = $_POST["rentTypeEditor"];

        if ( isset( $saleDialType )) {
            update_post_meta( $this->estateId, 'saleDialType', $saleDialType );
        }
        if ( isset( $rentDialType )) {
            update_post_meta( $this->estateId, 'rentDialType', $rentDialType );
        }
    }
}