<?php


class SaveHiddenDataOne extends SaveMetadata
{
    protected function save(){
        $data = $_POST["hidden1_Editor"];
        if ( isset( $data )) {
            update_post_meta( $this->estateId, 'hiddenData1', $data );
        }
    }
}