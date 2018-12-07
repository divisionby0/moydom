<?php


class CatalogModel
{
    private $filtersView;
    
    public function __construct($filtersView)
    {
        $this->filtersView = $filtersView;
        $this->getCities();
    }

    private function getCities(){
        $cities = DataBase::getCities();
        $this->filtersView->setCities($cities);
    }
}