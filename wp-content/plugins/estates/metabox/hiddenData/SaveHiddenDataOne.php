<?php


class SaveHiddenDataOne extends SaveMetadata
{
    protected function getEditorId(){
        return "hidden1_Editor";
    }
    protected function getCurrentOption(){
        return 'hiddenData1';
    }
}