<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

function smarty_modifier_campaign_type($string) {

	global $db;
	global $error;
	
	$q = "SELECT campaign_type_text FROM campaign_type WHERE campaign_type_id = " . $db->qstr($string);
	
	if(!$rs = $db->Execute($q)) {
		$error->dbError($db->ErrorMsg(), $q);
	}
	
	$string = $rs->fields['campaign_type_text'];
	
	
	return $string;

}

?>