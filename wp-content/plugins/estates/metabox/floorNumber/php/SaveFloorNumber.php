<?php


class SaveFloorNumber extends SaveMetadata
{
    protected function save(){
        $floor = $_POST["floorEditor"];
        if ( isset( $floor )) {
            update_post_meta( $this->estateId, 'floor', $floor );
        }
    }
}