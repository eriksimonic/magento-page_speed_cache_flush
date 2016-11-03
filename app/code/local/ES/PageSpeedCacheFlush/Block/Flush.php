<?php

/**
 * Created by PhpStorm.
 * User: erik.simonic
 * Date: 30.7.2015
 * Time: 13:34
 */
class ES_PageSpeedCacheFlush_Block_Flush extends Mage_Adminhtml_Block_Template
{
    public function getFlushWsdlCacheUrl()
    {
        return Mage::helper('adminhtml')->getUrl('es_page_speed_cache_flush/Flush/Index');
    }
}