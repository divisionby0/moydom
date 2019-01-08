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

        include_once('metabox/floorNumber/php/FloorNumberMetabox.php');
        include_once('metabox/floorNumber/php/SaveFloorNumber.php');

        include_once('metabox/totalFloors/php/TotalFloorsMetabox.php');
        include_once('metabox/totalFloors/php/SaveTotalFloors.php');
        
        include_once('metabox/roomQuantity/php/RoomQuantityMetabox.php');
        include_once('metabox/roomQuantity/php/SaveRoomQuantity.php');

        include_once('metabox/hotSaleOption/php/HotSaleOptionMetabox.php');
        include_once('metabox/hotSaleOption/php/SaveHotSaleOption.php');
        
        include_once('metabox/area/php/AreaMetabox.php');
        include_once('metabox/area/php/OutsideAreaMetabox.php');
        include_once('metabox/area/php/SaveArea.php');
        include_once('metabox/area/php/SaveOutsideArea.php');

        include_once('php/InitEstateAdmin.php');
        include_once('php/house/HousePostType.php');
        include_once('php/flat/FlatPostType.php');
        include_once('php/commerce/CommerceEstatePostType.php');
        include_once('php/sector/SectorPostType.php');

        include_once ("IncludeJS.php");
    }
}