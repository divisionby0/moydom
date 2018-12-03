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

        wp_enqueue_script('estates', $this->pluginDir.'Estates.js', array('jquery'), null, true);
    }

    private function getPluginDir(){
        return plugins_url().'/'.Constant::$pluginName.'/';
    }
}