<?php

require_once(CLASS_PATH."/getter/service_getter.class.php");

class service extends service_getter {

    function add_service($service_name,$service_amount,$service_active) {
        global $db;
        global $error;

        $q = "INSERT INTO service SET
                service_name    = " . $db->qstr($service_name) . ",
                service_amount  = " . $db->qstr($service_amount) . ",
                service_active  = " . $db->qstr($service_active) . ",
                last_modifed    = NOW()";

        if( !$rs = $db->Execute($q) ) {
            $error->dbError( $db->ErrorMsg(), $q );
            exit;
        }
    
        return $db->Insert_ID();
    }


    function edit_service($service_id,$service_name,$service_amount,$service_active) {
        global $db;
        global $error;

        $q = "UPDATE service SET
                service_name    = " . $db->qstr($service_name) . ",
                service_amount  = " . $db->qstr($service_amount) . ",
                service_active  = " . $db->qstr($service_active) . ",
                last_modifed    = NOW()
                WHERE service_id = " . $db->qstr($service_id);

        if( !$rs = $db->Execute($q) ) {
            $error->dbError( $db->ErrorMsg(), $q );
            exit;
        }

    }


    function delete_service($service_id) {
        global $db;
        global $error;

        $q = "DELETE FROM  service
                WHERE service_id = " . $db->qstr($service_id);

        if( !$rs = $db->Execute($q) ) {
            $error->dbError( $db->ErrorMsg(), $q );
            exit;
        }

    }


    function load_active() {
        global $db;
        global $error;

        $q = "SELECT * FROM service WHERE service_active = '1'";

        if( !$rs = $db->Execute($q) ) {
            $error->dbError( $db->ErrorMsg(), $q );
            exit;
        }
        $serviceArray = array();       
        $counter = 0;
        $tempArray = $rs->GetArray();
        
        
        while($counter < count($tempArray)) {
            $serviceArray[$counter] = new service();          
            $serviceArray[$counter]->fields = $tempArray[$counter];            
            $counter++;
        }

        return $serviceArray;

    }


    function load_all() {
        global $db;
        global $error;

        $q = "SELECT * FROM service";

        if( !$rs = $db->Execute($q) ) {
            $error->dbError( $db->ErrorMsg(), $q );
            exit;
        }

        $serviceArray = array();       
        $counter = 0;
        $tempArray = $rs->GetArray();
        
        
        while($counter < count($tempArray)) {
            $serviceArray[$counter] = new service();          
            $serviceArray[$counter]->fields = $tempArray[$counter];            
            $counter++;
        }

        return $serviceArray;
    }


    function view_service($service_id) {
        global $db;
        global $error;

        $q = "SELECT * FROM service WHERE service_id = " . $db->qstr($service_id);

        if( !$rs = $db->Execute($q) ) {
            $error->dbError( $db->ErrorMsg(), $q );
            exit;
        }

		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];


    }


    function map_service_to_workorder() {
        global $db;
        global $error;
    }

    
}

?>