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
        echo "<div class='container'><div class='row'>";
        $this->createDialType();
        $this->createEstateType();
        $this->createFloorNumber();
        $this->createCities();
        $this->createCost();
        $this->createSort();
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
        echo "<option data-type='".Constant::$sectors."'>Участок</option>";
        echo "<option data-type='".Constant::$commercialEstates."'>Коммерческая недвижимость</option>";
        echo "<option data-type='".Constant::$garages."'>Гараж</option>";
        echo "<option data-type='".Constant::$countryHouses."'>Дача</option>";
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
        echo "<div class='col-md-3' id='floorNumberContainer' style='display: none;'>";
        echo "<div class='row'><div class='col-md-6'><b>Этаж с </b></div><div class='col-md-6'><b>Этаж по </b></div></div><div class='row'>";

        echo "<div class='col-md-6'>";

        echo "<div class='row'>";
        echo "<select id='floorMin'>";
        echo "<option data-value='1'>1</option>";
        echo "<option data-value='2'>2</option>";
        echo "<option data-value='3'>3</option>";
        echo "<option data-value='4'>4</option>";
        echo "<option data-value='5'>5</option>";
        echo "<option data-value='6'>6</option>";
        echo "<option data-value='7'>7</option>";
        echo "<option data-value='8'>8</option>";
        echo "<option data-value='9'>9</option>";
        echo "<option data-value='10'>10</option>";
        echo "<option data-value='11'>11</option>";
        echo "<option data-value='12'>12</option>";
        echo "<option data-value='13'>13</option>";
        echo "<option data-value='14'>14</option>";
        echo "<option data-value='15'>15</option>";
        echo "<option data-value='16'>16</option>";
        echo "<option data-value='17'>17</option>";
        echo "<option data-value='18'>18</option>";
        echo "<option data-value='19'>19</option>";
        echo "<option data-value='20'>20</option>";
        echo "<option data-value='21'>21</option>";
        echo "<option data-value='22'>22</option>";
        echo "<option data-value='23'>23</option>";
        echo "<option data-value='24'>24</option>";
        echo "<option data-value='25'>25</option>";
        echo "</select></div></div>";

        echo "<div class='col-md-6'>";
        echo "<div class='row'>";
        echo "<select id='floorMax'>";
        echo "<option data-value='1'>1</option>";
        echo "<option data-value='2'>2</option>";
        echo "<option data-value='3'>3</option>";
        echo "<option data-value='4'>4</option>";
        echo "<option data-value='5'>5</option>";
        echo "<option data-value='6'>6</option>";
        echo "<option data-value='7'>7</option>";
        echo "<option data-value='8'>8</option>";
        echo "<option data-value='9'>9</option>";
        echo "<option data-value='10'>10</option>";
        echo "<option data-value='11'>11</option>";
        echo "<option data-value='12'>12</option>";
        echo "<option data-value='13'>13</option>";
        echo "<option data-value='14'>14</option>";
        echo "<option data-value='15'>15</option>";
        echo "<option data-value='16'>16</option>";
        echo "<option data-value='17'>17</option>";
        echo "<option data-value='18'>18</option>";
        echo "<option data-value='19'>19</option>";
        echo "<option data-value='20'>20</option>";
        echo "<option data-value='21'>21</option>";
        echo "<option data-value='22'>22</option>";
        echo "<option data-value='23'>23</option>";
        echo "<option data-value='24'>24</option>";
        echo "<option data-value='25' selected>25</option>";
        echo "</select></div></div>";

        echo "</div></div>";
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
        echo "<div class='row'><div class='col-md-6'><b>Цена от </b></div><div class='col-md-6'><b>Цена до </b></div></div><div class='row'>";

        echo "<div class='col-md-6'>";

        echo "<div class='row'>";
        echo "<select id='costMin'>";
        echo "<option data-value='5000'>5 000</option>";
        echo "<option data-value='10000'>10 000</option>";
        echo "<option data-value='15000'>15 000</option>";
        echo "<option data-value='25000'>25 000</option>";
        echo "<option data-value='100000'>100 000</option>";
        echo "<option data-value='200000'>200 000</option>";
        echo "<option data-value='500000'>500 000</option>";
        echo "<option data-value='1000000'>1 000 000</option>";
        echo "<option data-value='1500000'>1 500 000</option>";
        echo "<option data-value='2000000'>2 000 000</option>";
        echo "<option data-value='3000000'>3 000 000</option>";
        echo "</select></div></div>";

        echo "<div class='col-md-6'>";
        echo "<div class='row'>";
        echo "<select id='costMax'>";
        echo "<option data-value='10000'>10 000</option>";
        echo "<option data-value='15000'>15 000</option>";
        echo "<option data-value='25000'>25 000</option>";
        echo "<option data-value='100000'>100 000</option>";
        echo "<option data-value='200000'>200 000</option>";
        echo "<option data-value='500000'>500 000</option>";
        echo "<option data-value='1000000'>1 000 000</option>";
        echo "<option data-value='1500000'>1 500 000</option>";
        echo "<option data-value='2000000'>2 000 000</option>";
        echo "<option data-value='3000000'>3 000 000</option>";
        echo "<option data-value='5000000'>5 000 000</option>";
        echo "<option data-value='500000000' selected>Более 5 000 000</option>";
        echo "</select></div></div>";

        echo "</div></div>";
    }

    private function createSort()
    {
        echo "<div class='col-md-12' style='text-align: center; margin-top: 20px;'>Сортировать <a href='#' id='dateSort'><b>по дате добавления</b></a> / <a href='#' id='costSort'><b>по цене</b></a></div>";
    }
}