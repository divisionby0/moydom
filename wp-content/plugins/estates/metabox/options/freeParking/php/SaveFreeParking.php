<?php

class SaveFreeParking extends SaveMetadata
{
    protected function getEditorId(){
        return "freeParkingOptionEditor";
    }
    protected function getCurrentOption(){
        return MetaboxConstants::$FREE_PARKING_OPTION;
    }
}