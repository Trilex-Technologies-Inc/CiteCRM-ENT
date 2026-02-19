<?php
require_once(CLASS_PATH."/core/xml_parser.class.php");

class translate {

	var $language 			= DEFAULT_LANGUAGE;

	var $module_path 		= MODULE_PATH;

	// Public Methods
	
	 function translate_module($module) {
	
		$this->file_name = $this->module_path."/".$module."/language.".$this->language.".".$module.".xml";
		
		
		
		
		if(is_file($this->file_name)) {
			$xml_parser = new xmlParser($this->file_name);			
						
			$translate_array = $xml_parser->data[0]['child'];		
         
         
		} else {
		
			$error[] =  "Cannot Open Language File ".$this->file_name;
			
			$_SESSION['error'] = $error;
			
		}

		return $translate_array;
	
	}


	function load_translate_by_module($module_id) {
	
		global $db;
		global $error;
	
		$q = "SELECT  module_name FROM module WHERE  module_id = " . $db->qstr($module_id);
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$module = $rs->fields['module_name'];
	
		$this->file_name = $this->module_path."/".$module."/language.".$this->language.".".$module.".xml";
		
		
		if(is_file($this->file_name)) {
		
			$xml_obj = $xml_parser = new xmlParser($this->file_name);
			
			$translate_array = $xml_obj->data[0]['child'];		
         	
		} else {
		
			$error[] =  "Cannot Open Language File ".$this->file_name;
			
			$_SESSION['error'] = $error;
			
		}

		return $translate_array;
	
	
	}
	
	function load_all(){
	
	}
	
	
	function update_translate($_REQUEST) {
	
		global $db;
		global $error;
		
		$q = "SELECT  module_name FROM module WHERE  module_id = " . $db->qstr($_REQUEST['module_id']);
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$module = $rs->fields['module_name'];
		
		$data = "<?xml version=\"1.0\"?>\n";
		$data .="<language id=\"".$module."\">\n";
		
		foreach($_REQUEST['translate'] as $name => $value) {
		
			$data .="<$name>$value</$name>\n";
			
		}

		$data .="</language>\n";
		
		$path = $this->module_path."/".$module."/language.".$this->language.".".$module.".xml";
	
		$this->_writeFile($path,$data);
		
		$_SESSION['CLEAR_CACHE'] = true;

	}
	
	// Private Methods
	
	function _save(){
	
	
	}
	
	function _delete() {
	
	}

	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _writeFile<br>
	 * Purpose:  Writes a File<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $path String The file path to be writen
	 * @param $contents String The contents of the file
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _writeFile($path,$contents) {
		
			 if (!$handle = fopen($path, 'w')) {
         	echo "Cannot open file $path";
         	exit;
  		 	}
  		 	
  		 	if (fwrite($handle, $contents) === FALSE) {
       		echo "Cannot write to file $path";
       		exit;
   		}
   		
   		fclose($handle);
		
			return true;		
	}
	
}

?>