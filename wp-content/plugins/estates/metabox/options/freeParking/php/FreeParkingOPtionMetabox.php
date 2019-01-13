<?php


class FreeParkingMetabox extends BaseMetabox
{
    protected function getHeaderText(){
        return "Наличие бесплатной парковки";
    }
    protected function getControlId(){
        return "freeParkingOption";
    }
    protected function getEditorId(){
        return "freeParkingOptionEditor";
    }
}