<?php
require_once(SOAP_PATH.'/nusoap.php');

$debug  = false;

$params['license_key'] = STRKEY;

$client  = new soapclient('http://www.citecrm.com/help/load_contents.php');

$result = $client->call('load_contents', array('params' => $params));

foreach($result as $key=>$value){
    print_r( $value );

}

if ($client->getError()) {

        if($debug == true) {
            print_r($result);
        }

        $html .= "<span class=\"small\">No help Available</span>";
     
} else {

    $smarty->assign('result',$result);


}

$smarty->display('core/help_contents.tpl');

?>