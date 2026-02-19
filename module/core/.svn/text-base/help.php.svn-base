<?php
require_once(SOAP_PATH.'/nusoap.php');

$debug  = true;

$params['license_key'] = STRKEY;
$params['page_id'] = $_GET['page_id'];


$client  = new soapclient('http://www.citecrm.com/help/load_page.php');

$result = $client->call('view_page', array('params' => $params));


if ($client->getError()) {

        if($debug == true) {
            print_r($result);
        }

        $html .= "<span class=\"small\">No help Available</span>";
     
} else {
        
    $smarty->assign('page',         $result['page']);
    $smarty->assign('description',  $result['description']);
    $smarty->assign('contents',     $result['contents']);
    $smarty->assign('last_modified',$result['last_modified']);
    $smarty->assign('chapter',      $result['chapter']);
}


    $smarty->assign('html',$html);
    $smarty->display('core/help.tpl');

?>