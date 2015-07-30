<?php

/**
 * Created by PhpStorm.
 * User: erik.simonic
 * Date: 30.7.2015
 * Time: 13:38
 */
class ES_PageSpeedCacheFlush_Adminhtml_FlushController extends Mage_Adminhtml_Controller_Action
{
    public function IndexAction()
    {

        $host = $_SERVER['HTTP_HOST'];
        $a = array("http", "https");
        try {
            foreach ($a as $protocol) {
                $request_uri = $protocol . "://" . $host . "/*";
                $curl = curl_init($request_uri);
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PURGE");

                curl_setopt_array($curl ,array(
                    CURLOPT_CUSTOMREQUEST => "PURGE",
                    CURLOPT_TIMEOUT => 2,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FAILONERROR => true,
                    CURLOPT_FRESH_CONNECT => true
                ));

                $response = curl_exec($curl);
                echo $response;
                if ($response) {
                    $this->_getSession()->addSuccess("Purged cache for protocol " . $protocol);
                } else {
                    $this->_getSession()->addError("Failed to purge cache for " . $protocol);
                };
                curl_close($curl);
            }
        } catch (Exception $ex) {
            $this->_getSession()->addError($ex->getMessage());
        }

        $this->_redirect('adminhtml/cache/index/');
    }
}