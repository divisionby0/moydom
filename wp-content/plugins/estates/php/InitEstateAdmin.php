<?php


class InitEstateAdmin
{
    public function __construct()
    {
        add_meta_box( 'edit_estate_meta_box',
            'Данные о недвижимости',
            'display_estate_meta_box',
            array(Constant::$houses, Constant::$flats, Constant::$commercialEstates, Constant::$sectors, Constant::$garages, Constant::$countryHouses), 'normal', 'high'
        );
    }
}