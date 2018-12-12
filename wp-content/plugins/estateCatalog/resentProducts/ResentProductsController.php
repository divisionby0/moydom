<?php


class ResentProductsController
{
    private $model;
    //private $view;
    public function __construct()
    {
        $view = new ResentProductListView();
        $this->model = new ResentProductsModel($view);
    }
    
    public function loadProducts($estateType, $saleDialType, $rentDialType, $city){
        $estatesData = DataBase::getEstate($estateType, $saleDialType, $rentDialType, $city, null, null, 3);
        $estates = json_decode($estatesData);
        
        $this->model->setData($estates);
    }
}