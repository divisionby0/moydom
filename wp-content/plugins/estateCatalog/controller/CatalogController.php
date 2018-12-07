<?php

class CatalogController
{
    private $model;
    private $filtersView;
    
    public function __construct()
    {
        $this->filtersView = new FiltersView();
        $this->model = new CatalogModel($this->filtersView);
    }
}