<?php

class HotSaleOptionMetabox extends BaseOptionMetabox
{
    protected function getHeaderText(){
        return "<font color='#ff0000'>Горячая продажа</font>";
    }
    protected function getCheckboxId(){
        return "hotSaleOption";
    }
    protected function getEditorId(){
        return "hotSaleOptionEditor";
    }
}