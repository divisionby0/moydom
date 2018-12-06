<?php


class SaveCity extends SaveMetadata
{
    protected function save(){
        $city = $_POST["selectedCityEditor"];
        if ( isset( $city )) {
            update_post_meta( $this->estateId, 'selectedCity', $city );
        }
    }
}