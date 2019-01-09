<?php

class HotSaleController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->view = new HotSaleView();
        $this->model = new HotSaleModel($this->view);
    }
}