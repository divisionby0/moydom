<?php


class ResentProducts
{
    public function __construct($currentId, $estateType, $saleDialType, $rentDialType, $city, $minCost, $maxCost)
    {
        $view = new ResentProductsView();
        $model = new ResentProductsModel($currentId, $view);
        $controller = new ResentProductsController($model, $estateType, $saleDialType, $rentDialType, $city, $minCost, $maxCost);
    }
}