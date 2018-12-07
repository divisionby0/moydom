<?php


class SaveTotalFloors extends SaveMetadata
{
    protected function save(){
        $totalFloors = $_POST["totalFloorsEditor"];
        if ( isset( $totalFloors )) {
            update_post_meta( $this->estateId, 'totalFloors', $totalFloors );
        }
    }
}