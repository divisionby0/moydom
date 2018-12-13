<?php


class SaveArea extends SaveMetadata
{
    protected function save(){
        $area = $_POST["areaEditor"];
        if ( isset( $area )) {
            update_post_meta( $this->estateId, 'area', $area );
        }
    }
}