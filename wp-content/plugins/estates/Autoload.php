<?php

class Autoload
{
    public function __construct()
    {
        include_once('php/Constant.php');
        include_once('utils/Utils.php');
        include_once('metabox/SaveMetadata.php');

        include_once('metabox/id/IdMetabox.php');

        include_once('metabox/hiddenData/HiddenData.php');
        include_once('metabox/hiddenData/HiddenDataOne.php');
        include_once('metabox/hiddenData/HiddenDataTwo.php');
        include_once('metabox/hiddenData/SaveHiddenDataOne.php');
        include_once('metabox/hiddenData/SaveHiddenDataTwo.php');

        include_once('metabox/city/php/CityMetabox.php');
        include_once('metabox/city/php/SaveCity.php');

        include_once('metabox/dialType/php/DialTypeMetabox.php');
        include_once('metabox/dialType/php/SaveDialType.php');

        include_once('metabox/cost/php/CostMetabox.php');
        include_once('metabox/cost/php/SaveCost.php');

        include_once('php/InitEstateAdmin.php');
        include_once('php/house/HousePostType.php');
        include_once ("IncludeJS.php");
    }
}