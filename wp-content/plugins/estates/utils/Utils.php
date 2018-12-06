<?php

class Utils
{
    public static function isAdministratorRole(){
        return in_array('administrator',  wp_get_current_user()->roles);
    }
}