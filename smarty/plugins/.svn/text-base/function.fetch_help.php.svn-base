<?php

function smarty_function_fetch_help($params, &$smarty) {

    $debug = false;

    require_once(SOAP_PATH.'/nusoap.php');

    $params['license_key'] = STRKEY;

    $client  = new soapclient('http://www.citecrm.com/help/view.php');

    $result = $client->call('view', array('params' => $params));
    

    $html = "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                <tr>
                    <td>";

    if ($client->getError()) {

        print $client->getError();

        if($debug == true) {
            print_r($result);
        }

        $html .= "<span class=\"small\">No help Available. We will be adding this page soon.</span>";
     

    } else {

        //print_r($result);
        $html .= "
        <span class=\"small\"><b>Title:</b> ".$result['page']."<br>
            <b>Chapter:</b> " .$result['chapter']."<br>
            <hr>
            ".$result['description']." <a href=\"#\" onclick=\"window.open('index.php?page=core:help&page_id=".$result['page_id']."','mywindow','scrollbars=1,menubar=1,resizable=1,width=350,height=550');\">Read More..</a>
        </span>
        ";
	   
    }

    $html .= "</td>
            </tr>
        </table>";
    return $html;

}
?>