<?php


class SaveCost extends SaveMetadata
{
    protected function save(){
        $cost = $_POST["costEditor"];
        if ( isset( $cost )) {
            update_post_meta( $this->estateId, 'cost', $cost );
        }
    }
}