<?php

class Autoload
{
    public function __construct()
    {
        include_once('php/Constant.php');
        include_once('utils/Utils.php');

        include_once('metabox/MetaboxConstants.php');
        include_once('metabox/base/php/BaseMetabox.php');
        include_once('metabox/base/php/SaveMetadata.php');

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
        
        include_once('metabox/options/hotSaleOption/php/HotSaleOptionMetabox.php');
        include_once('metabox/options/hotSaleOption/php/SaveHotSaleOption.php');

        include_once('metabox/options/waterOption/php/WaterOptionMetabox.php');
        include_once('metabox/options/waterOption/php/SaveWaterOption.php');

        include_once('metabox/options/electricity/php/ElectricityOptionMetabox.php');
        include_once('metabox/options/electricity/php/SaveElectricityOption.php');
        
        include_once('metabox/options/sewage/php/SewageOptionMetabox.php');
        include_once('metabox/options/sewage/php/SaveSewage.php');

        include_once('metabox/options/gasOption/php/GasOptionMetabox.php');
        include_once('metabox/options/gasOption/php/SaveGas.php');
        
        include_once('metabox/options/internet/php/InternetOptionMetabox.php');
        include_once('metabox/options/internet/php/SaveInternet.php');
        
        include_once('metabox/options/freeParking/php/FreeParkingOptionMetabox.php');
        include_once('metabox/options/freeParking/php/SaveFreeParking.php');
        
        include_once('metabox/address/php/AddressMetabox.php');
        include_once('metabox/address/php/SaveAddress.php');

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