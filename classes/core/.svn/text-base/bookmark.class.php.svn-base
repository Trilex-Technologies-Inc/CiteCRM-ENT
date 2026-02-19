<?php
/**
 * Type:     Cite CMS Core Class<br>
 * Name:     company_address.class.php<br>
 * Purpose:  For all company_address methods<br>
 * @author Cite CMS Module Developer
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions
 * @link http://www.citecsoftware.com
*/

require(CLASS_PATH.'/getter/bookmark_getter.class.php');

class bookmark extends bookmark_getter {



    function add_bookmark($user_id,$bookmark_type,$bookmark_description,$bookmark_type_id) {
        global $db;
        global $error;

        $q = "INSERT INTO bookmark SET
                user_id                 = " . $db->qstr($user_id) . ",
                bookmark_type           = " . $db->qstr($bookmark_type) . ",
                bookmark_description    = " . $db->qstr($bookmark_description) . ",
                bookmark_type_id        = " . $db->qstr($bookmark_type_id) . " ,
                bookmark_create_date    = " . $db->qstr(time()) . ",
                bookmark_active         = '1'";

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}	

    }


    function load_active_by_user($user_id,$bookmark_type) {
        global $db;
        global $error;

        $q = "SELECT * FROM bookmark
                WHERE user_id = " . $db->qstr($user_id) . "
                AND bookmark_type = " . $db->qstr($bookmark_type);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}


	   $bookmarkArray = array();

        $counter = 0;

        $tempArray = $rs->GetArray();

        while($counter < count($tempArray)) {
            $bookmarkArray[$counter] = new bookmark();
            $bookmarkArray[$counter]->fields = $tempArray[$counter];
            $counter++;
        }

        return $bookmarkArray;

    }

    function delete_bookmark($bookmark_id) {
        global $db;
        global $error;

        $q = "DELETE FROM bookmark WHERE bookmark_id = " . $db->qstr($bookmark_id);

        if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

    }

}

?>