<?php


class IncludeJS
{
    public function __construct()
    {
        $this->start();
    }

    private function start(){
        $this->pluginDir = $this->getPluginDir();
        wp_enqueue_script('cityMetabox', $this->pluginDir.'metabox/city/js/CityMetabox.js');
        wp_enqueue_script('dialTypeMetabox', $this->pluginDir.'metabox/dialType/js/DialTypeMetabox.js');

        wp_enqueue_script('baseOptionMetabox', $this->pluginDir.'metabox/base/js/BaseMetabox.js');
        wp_enqueue_script('hotSaleMetabox', $this->pluginDir.'metabox/options/hotSaleOption/js/HotSaleOptionMetabox.js');
        wp_enqueue_script('waterMetabox', $this->pluginDir.'metabox/options/waterOption/js/WaterOptionMetabox.js');
        wp_enqueue_script('electricityMetabox', $this->pluginDir.'metabox/options/electricity/js/ElectricityOptionMetabox.js');
        wp_enqueue_script('sewageMetabox', $this->pluginDir.'metabox/options/sewage/js/SewageOptionMetabox.js');
        wp_enqueue_script('gasMetabox', $this->pluginDir.'metabox/options/gasOption/js/GasOptionMetabox.js');
        wp_enqueue_script('internetMetabox', $this->pluginDir.'metabox/options/internet/js/InternetOptionMetabox.js');
        wp_enqueue_script('freeParkingMetabox', $this->pluginDir.'metabox/options/freeParking/js/FreeParkingOptionMetabox.js');

        wp_enqueue_script('estates', $this->pluginDir.'Estates.js', array('jquery'), null, true);
    }

    private function getPluginDir(){
        return plugins_url().'/'.Constant::$pluginName.'/';
    }
}