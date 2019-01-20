<?php

class HotSaleModel
{
    private $view;
    
    public function __construct($view)
    {
        $this->view = $view;
        $estates = $this->getCollection();
        $this->view->setData(json_decode($estates));
    }
    
    private function getCollection(){
        return DataBase::getHotSaleEstates(array(Constant::$houses, Constant::$commercialEstates, Constant::$flats, Constant::$sectors, Constant::$garages, Constant::$countryHouses));
    }
}