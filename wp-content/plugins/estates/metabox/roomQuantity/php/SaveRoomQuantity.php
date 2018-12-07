<?php


class SaveRoomQuantity extends SaveMetadata
{
    protected function save(){
        $rooms = $_POST["roomsEditor"];
        if ( isset( $rooms )) {
            update_post_meta( $this->estateId, 'rooms', $rooms );
        }
    }
}