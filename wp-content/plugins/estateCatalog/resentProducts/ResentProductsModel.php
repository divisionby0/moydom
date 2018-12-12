<?php


class ResentProductsModel
{
    private $view;
    
    public function __construct($view)
    {
        $this->view = $view;
    }
    
    public function setData($data){
        $this->view->setData($data);
    }
}