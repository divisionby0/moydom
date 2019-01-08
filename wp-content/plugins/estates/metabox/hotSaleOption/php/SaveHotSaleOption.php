<?php

/**
 * Created by PhpStorm.
 * User: home
 * Date: 08.01.2019
 * Time: 16:40
 */
class SaveHotSaleOption extends SaveMetadata
{
    protected function save(){
        $hotSaleOption = $_POST["hotSaleOptionEditor"];

        if ( isset( $hotSaleOption )) {
            update_post_meta( $this->estateId, 'hotSale', $hotSaleOption );
        }
    }
}