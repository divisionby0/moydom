<?php


class ResentProductsController
{
    private $model;
    public function __construct($model,$estateType, $saleDialType, $rentDialType, $city, $minCost, $maxCost)
    {
        $this->model = $model;
        $this->model->load($estateType, $saleDialType, $rentDialType, $city, $minCost, $maxCost);
    }
}