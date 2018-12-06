<?php

class HiddenDataOne extends HiddenData{

    protected function show(){
        echo "<h2>Данные видные только администратору</h2>";
        echo "<textarea rows='4' columns='200' name='hidden1_Editor' id='hidden1_Editor' style='display:block;'>".$this->data."</textarea>";
    }
} 