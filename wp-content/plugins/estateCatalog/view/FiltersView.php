<?php

class FiltersView
{
    private $currentType;
    private $cities;
    
    public function __construct()
    {
    }

    public function setCities($cities){
        $this->cities = $cities;
        $this->createChildren();
    }
    
    public function setType($type){
        $this->currentType = $type;
    }
    
    public function update(){
        
    }
    public function createChildren(){
        echo "<div class='container''><div class='row'>";
        $this->createDialType();
        $this->createEstateType();
        $this->createCities();
        $this->createFloorNumber();
        $this->createRoomsQuantity();
        $this->createCost();
        echo "</div></div>";
    }
    
    private function createDialType(){
        echo "<div class='col-md-3'>";
        echo "<div class='row'><b>Тип сделки:</b></div>";
        echo "<div class='row'><div class='col-md-6'><input type='checkbox' id='sailType' checked>Продажа</div>";
        echo "<div class='col-md-6'><input type='checkbox' id='rentType'>Аренда</div>";
        echo "</div></div>";
    }

    private function createEstateType()
    {
        echo "<div class='col-md-3'>";
        echo "<div class='row'><b>Тип недвижимости:</b></div>";
        echo "<div class='row'><select id='estateType'>";
        echo "<option data-type='".Constant::$houses."'>Дом</option>";
        echo "<option data-type='".Constant::$flats."'>Квартира</option>";
        echo "<option>Участок</option>";
        echo "<option data-type='".Constant::$commercialEstates."'>Коммерческая недвижимость</option>";
        echo "</select></div></div>";
    }

    private function createCities(){

        echo "<div class='col-md-3'>";
        echo "<div class='row'><b>Населенный пункт:</b></div>";
        echo "<div class='row'>";
        echo "<select id='city'>";
        for($i=0; $i<sizeof($this->cities);$i++){
            echo "<option>".$this->cities[$i]."</option>";
        }
        echo "</select></div></div>";
    }



    private function createFloorNumber()
    {
        echo "<div class='col-md-3' id='floorNumberContainer'>";
        echo "<div class='row'><b>Этаж:</b></div>";

        echo "<div class='row'><select id='floor'>";
        echo "<option>Первый</option>";
        echo "<option>Не первый</option>";
        echo "<option>Последний</option>";
        echo "<option>Не последний</option>";
        echo "<option>Любой</option>";
        echo "</select></div></div>";
    }

    private function createRoomsQuantity()
    {
        echo "<div class='col-md-3' id='roomsQuantityContainer'>";
        echo "<div class='row'><b>Количество комнат:</b></div>";

        echo "<div class='row'><select id='rooms'>";
        echo "<option>1</option>";
        echo "<option>2</option>";
        echo "<option>3</option>";
        echo "<option>Более 3х</option>";
        echo "</select></div></div>";
    }

    private function createCost()
    {
        echo "<div class='col-md-3'>";
        echo "<div class='row'><b>Цена:</b></div><div class='row'>";

        echo "<div class='col-md-6'>";
        echo "<div class='row'>";
        echo "<select id='costMin'>";
        echo "<option>5 000</option>";
        echo "<option>10 000</option>";
        echo "<option>15 000</option>";
        echo "<option>25 000</option>";
        echo "<option>100 000</option>";
        echo "<option>200 000</option>";
        echo "<option>500 000</option>";
        echo "<option>1 000 000</option>";
        echo "<option>1 500 000</option>";
        echo "<option>2 000 000</option>";
        echo "<option>3 000 000</option>";
        echo "</select></div></div>";

        echo "<div class='col-md-6'>";
        echo "<div class='row'>";
        echo "<select id='costMax'>";
        echo "<option>10 000</option>";
        echo "<option>15 000</option>";
        echo "<option>25 000</option>";
        echo "<option>100 000</option>";
        echo "<option>200 000</option>";
        echo "<option>500 000</option>";
        echo "<option>1 000 000</option>";
        echo "<option>1 500 000</option>";
        echo "<option>2 000 000</option>";
        echo "<option>3 000 000</option>";
        echo "<option>5 000 000</option>";
        echo "<option>Более 5 000 000</option>";
        echo "</select></div></div>";

        echo "</div></div>";
    }
}