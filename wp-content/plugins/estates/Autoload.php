<?php

class Autoload
{
    public function __construct()
    {
        include_once('php/Constant.php');

        include_once('metabox/id/IdMetabox.php');

        include_once('metabox/city/php/CityMetabox.php');
        include_once('metabox/city/php/SaveCity.php');

        include_once('php/InitEstateAdmin.php');
        include_once('php/house/HousePostType.php');
        include_once ("IncludeJS.php");
    }
}