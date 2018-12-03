<?php


class SaveCity
{
    private $estateId;
    public function __construct($estateId, $estate)
    {
        $this->estateId = $estateId;
        $this->save();
    }

    private function save(){
        $city = $_POST["selectedCityEditor"];
        if ( isset( $city )) {
            update_post_meta( $this->estateId, 'selectedCity', $city );
        }
    }
}