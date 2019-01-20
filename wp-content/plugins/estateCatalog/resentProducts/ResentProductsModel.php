<?php


class ResentProductsModel
{
    private $view;
    private $currentId;
    public function __construct($currentId, $view)
    {
        $this->view = $view;
        $this->currentId = $currentId;
    }
    
    public function load($estateType, $saleDialType, $rentDialType, $city, $minCost, $maxCost){
        $estatesData = DataBase::getEstate($estateType, $saleDialType, $rentDialType, $city, $minCost, $maxCost, null, null);
        $estates = json_decode($estatesData);

        $this->view->setData($estates, $this->currentId);
    }
}