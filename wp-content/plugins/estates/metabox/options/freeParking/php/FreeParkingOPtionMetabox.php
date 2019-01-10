<?php


class FreeParkingOptionMetabox extends BaseOptionMetabox
{
    protected function getHeaderText(){
        return "Наличие бесплатной парковки";
    }
    protected function getCheckboxId(){
        return "freeParkingOption";
    }
    protected function getEditorId(){
        return "freeParkingOptionEditor";
    }
}