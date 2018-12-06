<?php


class SaveHiddenDataTwo extends SaveMetadata
{
    protected function save(){
        $data = $_POST["hidden2_Editor"];
        if ( isset( $data )) {
            update_post_meta( $this->estateId, 'hiddenData2', $data );
        }
    }
}