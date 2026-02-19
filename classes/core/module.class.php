<?php
require(CLASS_PATH."/getter/module_getter.class.php");

/** 
 * Type:     Cite CMS Core Class<br>
 * Name:    module<br>
 * Purpose:  For all core module methods<br>
 * @author Jaimie Garner jaimie@citesoftware.com
 * @access Public
 * @package CiteCMS
 * @version 1.0
 * @Copyright 2006 Cite Software Solutions 
 * @link http://www.citecsoftware.com
*/
class module extends module_getter {

	var $fields;

	var $language 			= DEFAULT_LANGUAGE;

	var $module_path 		= MODULE_PATH;

	var $template_path 	= TEMPLATE_PATH;
	
	var $class_path		= CLASS_PATH;

	function module() {
	
		global $smarty;
		global $translate;
		
		$translate = new translate();

		$translate_array = $translate->translate_module("module");


		if(!empty($translate_array)) {
		
			foreach($translate_array as $translate){
				
				$tans = "translate_".strtolower($translate['name']);
				
				$val = $translate['content'];
				
				$smarty->assign($tans,$val);
			}
		}
	
	
	}

/*****************/
/* Public Methods */
/*****************/

	/**
	 *
	 * Type:     Cite CMS Core Methods<br>
	 * Name:     search_modules<br>
	 * Purpose:  Loads All module rows paginated<br>
	 *
	 * @author Jaimie Garner
	 * @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object
	 * @param SmartyPaginate::getLimit() Smarty Paginate Object
	 * @access Public
	 * @return $moduleArray Array  The paginated result set  of modules
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object, $smarty Smarty Object
	 */	
	function search_module($start=0,$limit=50,&$total) {
		global $db;
		global $error;
		
		$q = "SELECT SQL_CALC_FOUND_ROWS * 
				FROM module  
				ORDER BY module_name LIMIT $start,$limit";

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$moduleArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$moduleArray[$counter] = new module();
			$moduleArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
	
		// now we get the total number of records from the table
		$q = "SELECT FOUND_ROWS()";
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
	
		$total = $rs->fields['FOUND_ROWS()'];

		return $moduleArray;
		
	}
	
	
	function load_all() {
	
		global $db;
		global $error;
		
		$q = "SELECT  * FROM module  ORDER BY module_name";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$moduleArray = array();

		$counter = 0;

		$tempArray = $rs->GetArray();
	
		while($counter < count($tempArray)) {
			$moduleArray[$counter] = new module();
			$moduleArray[$counter]->fields = $tempArray[$counter];
			$counter++;
		}
		
		return $moduleArray;
	}
	
	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     loadAdminMenu<br>
	 * Purpose:  Loads The Admin Menu<br>
	 *
	 * @author Cite CMS Module Developer
	 * 
	 * @access Public
	 * @return Array array of module Objects
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object
	*/	
	function loadAdminMenu() {
		global $db;
		global $error;
		
		$q = "SELECT  module_name, module_translate_name, module_id 
				FROM module WHERE  module_admin_menu = '1'
				ORDER BY module_order";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		$admin_menu_array = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
				
		
		while($counter < count($tempArray)) {

			$admin_menu_array[$counter] = new module();
			
			$admin_menu_array[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
			
		return $admin_menu_array;		
	}
	
	
	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     loadAdminMethods<br>
	 * Purpose:  Loads The module Methods<br>
	 *
	 * @author Cite CMS Module Developer
	 * @param $module_id String The module_id
	 * @access Public
	 * @return array Array of module_method Objects
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object
	*/
	function loadAdminMethods($moduleID){
		global $db;
		global $error;
		
		$q = "SELECT module_method_name,module_method_translate FROM module_method WHERE module_id = " . $db->qstr($moduleID) ." AND  module_method_admin_menu ='1'";
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
	
		$admin_method_array = array();
		
		$counter = 0;

		$tempArray = $rs->GetArray();
	
		
		while($counter < count($tempArray)) {

			$admin_method_array[$counter] = new module();
			
			$admin_method_array[$counter]->fields = $tempArray[$counter];
			
			$counter++;
		}
		
	
		return $admin_method_array;
		
	}


	/**
	 *
	 * Type:     Cite CMS Public Methods<br>
	 * Name:     view_module<br>
	 * Purpose:  Loads A single module row<br>
	 *
	 * @author Cite CMS Module Developer
	 * @param $module_id String The module_id
	 * @access Public
	 * @return module Object
	 * @version 1.0
	 * @uses $db Datbase object, $error the Error object
	*/
	function view_module($module_id) {
	
		global $db;
		global $error;

		$q = "SELECT * FROM module
		WHERE module_id = ". $db->qstr($module_id);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}

		$tempArray = $rs->GetArray();

		$this->fields = $tempArray[0];
	
	
	}
	
// delete Module
	function delete_module($module_id) {
		global $db;
		
		// Remove Page Setup
		$q = "SELECT  module_method.module_method_name,  module_name
				FROM module_method, module
				WHERE  module.module_id = " . $db->qstr($module_id) ."
				AND module_method.module_id= module.module_id";
				
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		
		while(!$rs->EOF){
		
			$this->module_name = $rs->fields['module_name'];
		
			
			$q = "DELETE FROM page_setup WHERE  page_setup_name = " . $db->qstr($rs->fields['module_method_name']);
			if(!$rs_2 = $db->Execute($q)) {
				$error->dbError($db->ErrorMsg(), $q);
			}
			
			$rs->MoveNext();
		}
		
		$core_class_path 		= $this->class_path."/core/".$this->module_name.".class.php";
		$getter_class_path	= $this->class_path."/getter/".$this->module_name."_getter.class.php";
		$module_path			= $this->module_path."/".$this->module_name;
		$template_path			= $this->template_path."/".$this->module_name;
		

		// Move Files to backup
		if(is_file($core_class_path)) {
			$backup_path = BACKUP_PATH."/classes/core/".$this->module_name.".class.php";
			rename($core_class_path, $backup_path);
		}
		
		if(is_file($getter_class_path)) {
			$backup_path = BACKUP_PATH."/classes/getter/".$this->module_name."_getter.class.php";
			rename($getter_class_path,$backup_path);
		}
	
		if(is_dir($module_path)) {
			$backup_path = BACKUP_PATH."/module/".$this->module_name;
			rename($module_path,$backup_path);
		}
	
	
		if(is_dir($template_path)) {
			$backup_path = BACKUP_PATH."/template/".$this->module_name;
			rename($template_path,$backup_path);
		}
	
	
		$q = "DELETE FROM module_method WHERE module_id = " . $db->qstr($module_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		$q = "DELETE FROM module WHERE module_id = " . $db->qstr($module_id);
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(), $q);
		}
		
		return true;	
	
	}
	
	
// New Module
	/**
	 *
	 * Type:     Public Method<br>
	 * Name:     newModule<br>
	 * Purpose:  Creates a new module <br>
	 * 
	 * @param $_REQUEST ARRAY The for submission VARS
	 * @author jaimie@citesoftware.com
	 * @access Public
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function newModule($_REQUEST) {
		global $db;
		global $error;

		// Add request to $this->fields
		foreach($_REQUEST as $key=>$val){
			$this->fields[$key] = $val;
		}


		// Build the Table
		$this->_buildDatabaseTable();


		// Insert Module
		$q = "INSERT INTO module SET
				module_name					=" . $db->qstr($this->fields['moduleName']) .",
				module_translate_name	=" . $db->qstr($this->fields['moduleTranslateName']) .",
				module_admin_menu 		=" . $db->qstr($this->fields['moduleAdminMenu']) .",
				module_user_menu 			=" . $db->qstr($this->fields['moduleUserMenu']) .",
				module_public_menu		=" . $db->qstr($this->fields['modulePublicMenu']);
				 
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}		 
		
		$this->fields['module_id'] = $db->Insert_ID();
				
				
		// Set up template name
		$this->fields['templateName']	= $this->fields['moduleName'];
			
				
		
				
		// Build the directory
		if( !$this->_createDirs() ) {
			$error->coreError('Unable to Create New Module');
		}


		// Build Pages
		if(!$this->_buildPages()) {
			$error->coreError('Unable to Build Methods');
		}
		

		// Create The classes
		if(!$this->_createClass()) {
			$error->coreError('Unable to build Classes');
		}


		// Language File
		if(!$this->_createLaguage()) {
			$error->coreError('Unable to build Language File');
		}

		// Build The XML DB schema
		$this->_buildSchema($data=false,$this->fields['moduleName']);

		// Build the Module Installer	
		
		return $this->fields['module_id'];
		
	}


/******************/
/* Private Methods */
/******************/

// Create Directories
	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createDirs()<br>
	 * Purpose:  Creates the module Directories <br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createDirs() {

		// Create Module Directory
		$moduleDir = MODULE_PATH . "/" . $this->fields['moduleName'];

		if(!is_dir($moduleDir) ) {

			/* directory does not exists create it */
			if(!mkdir($moduleDir, 0775)) {
				return false;
			}

		} else {
			return false;
		}		

		// Create Template Dir
		$templateDir = TEMPLATE_PATH . "/" . $this->fields['templateName'];


		if(!is_dir($templateDir) ) {

			/* directory does not exists create it */
			if(!mkdir($templateDir, 0775)) {
				return flase;
			}

		} else {
			return false;
		}		

		return true;
	}


// Build the PHP and tpl pages
	/**
	 *
	 * Type:     Private Method<br>
	 * Name:    _buildPages<br>
	 * Purpose:  Calles the Create method classes to build the php pages <br>
	 * @calls _createAddMethod, _createAddTemplate, _createSearchMethod, _createViewMethod,_createViewTemplate,_createUpdateMethod,_createUpdateTemplate,_createDeleteMethod,_createDeleteTemplate<br>
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _buildPages(){
	
		// Add	
		$this->_createAddMethod($this->fields['addAuth']);
		$this->_createAddTemplate();
		
		// Search
		$this->_createSearchMethod($this->fields['searchAuth']);
		$this->_createSearchTemplate();

		// View
		$this->_createViewMethod($this->fields['viewAuth']);
		$this->_createViewTemplate();	
		
		// Update
		$this->_createUpdateMethod($this->fields['updateAuth']);
		$this->_createUpdateTemplate();
		
		// Delete
		$this->_createDeleteMethod($this->fields['deleteAuth']);
		$this->_createDeleteTemplate();

		return true;
	}

// Build the XML Con structor

	function _buildConstructor() {}


// Buld Database Table //

	function _buildDatabaseTable() {
		global $db;
		global $error;
		
		$q = "CREATE TABLE ".$this->fields['moduleName']." (";
		
		$q .= $this->fields['moduleName']."_id INT(20) NOT NULL AUTO_INCREMENT ,";
				
		foreach($_REQUEST['field'] as $key=>$val){								


			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$default		= $val['default'];
			$extra		= $val['extra'];
				
			if($val['validate'] == "notEmpty") {
				$notNull = "NOT NULL";
			} else {
				$notNull = "NULL";
			}
						
			if($length == "") {
				$q .= " $fieldName $type ";
			} else {
				$q .= " $fieldName $type($length) "; 
			}
						
			if(!empty($default)) {
					$q .= " DEFAULT '$default' ";
			}
						
			$q .= " $extra $notNull,";	

		}
		
		
		$q .= "last_modified TIMESTAMP ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL ,";
		

		// Create Key
		foreach($_REQUEST['field'] as $key=>$val){
		
		
			$key 			= $val['key'];
			$fullText 	= $val['fullText'];
			$fieldName 	= $val['name'];
								
								
			if($key == "unique") {
				$q .= "		UNIQUE($fieldName),";
			}
						
			if(!empty($fullText)) {
				$q .= "	FULLTEXT($fieldName),";	
			}
					
			if($key == "index") {
				$q .= " INDEX($fieldName),";
			}							
			
		}
		
		$q .= "		PRIMARY KEY (".$this->fields['moduleName']."_id)";
		$q .= ") TYPE = MYISAM";
		
		
		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		return true;
	
	}

// Create The Classes

	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createClass()<br>
	 * Purpose:  Creates the the classes <br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createClass() {
	
		// Build Getter Class
		$this->_createGetterClass();
		
		// Build Core Class
		$this->_createCoreClass();
		
		return true;
	
	}


/***********/
/* Classes */
/**********/

// Getter
	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createGetterClass<br>
	 * Purpose:  Creates the getter class for a module<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $this Object
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createGetterClass() {
	
		$contents	
		 = "<?php\n";
		$contents .="/**\n"; 
		$contents .="* Type:     	Cite CMS Core Getter Class<br>\n";
		$contents .="* Name:    	".$this->fields['moduleName']."Getter<br>\n";
		$contents .="* Purpose:  	For all ".$this->fields['moduleTranslateName']." fields<br>\n";
		$contents .="* @author    Cite CMS Module Developer\n";
		$contents .="* @access Public\n";
		$contents .="* @package CiteCMS\n";
		$contents .="* @version 1.0\n";
		$contents .="* @Copyright 2006 Cite Software Solutions \n";
		$contents .="* @link http://www.citecsoftware.com\n";
		$contents .="*/\n";
		
		$contents .="class ".$this->fields['moduleName']."_getter {\n";
		
		$contents .="\n";
		$contents .="	/**\n";
		$contents .="	 	* Type:     Public Getter<br>\n";
		$contents .="	 	* Name:     get_".$this->fields['moduleName']."_id<br>\n";
		$contents .="	 	* Purpose:  Returns ".$this->fields['moduleName']."_id Database field<br>\n";
		$contents .="	 	*\n"; 
		$contents .="	 	* @author Cite CMS Developer Module\n";
		$contents .="	 	* @return String last_modified\n";
		$contents .="		 *\n";
		$contents .="		*/\n";			
		$contents .=" function get_".$this->fields['moduleName']."_id(){\n";
		$contents .="		return \$this->fields['".$this->fields['moduleName']."_id'];\n";
		$contents .="	}\n";
		
		foreach($this->fields['field'] as $key => $val) {
		
			foreach($val as $dbField => $value) {
			
				if($dbField == "name") {
					$contents .="	/**\n";
					$contents .="	 	* Type:     Public Getter<br>\n";
					$contents .="	 	* Name:     get_".$value."<br>\n";
					$contents .="	 	* Purpose:  Fetch ".$value." Database field<br>\n";
					$contents .="	 	*\n"; 
					$contents .="	 	* @author Cite CMS Developer\n";
					$contents .="	 	* @return String ".$value."\n";
					$contents .="		 *\n";
					$contents .="		*/\n";			
					$contents .="	function get_".$value."() {\n";
					$contents .="		return \$this->fields['".$value."'];\n";
					$contents .="	}\n";
					$contents .="\n";
				}
				
			}
		
		}
		
		$contents .="	/**\n";
		$contents .="	 	* Type:     Public Getter<br>\n";
		$contents .="	 	* Name:     get_last_modified<br>\n";
		$contents .="	 	* Purpose:  Returns last_modified Database field<br>\n";
		$contents .="	 	*\n"; 
		$contents .="	 	* @author Cite CMS Developer Module\n";
		$contents .="	 	* @return String last_modified\n";
		$contents .="		 *\n";
		$contents .="		*/\n";			
		$contents .=" function get_last_modified(){\n";
		$contents .="		return \$this->fields['last_modified'];\n";
		$contents .="	}\n";
		$contents .="\n";
		$contents .="}\n";
		$contents .="?>";
		
		$path = CLASS_PATH."/getter/".$this->fields['moduleName']."_getter.class.php";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save Getter Class:'. $path);
		} else {
			return true;
		}
	
	}

// Core Class
	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createCoreClass<br>
	 * Purpose:  Creates the core class for a module<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $this Object
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createCoreClass() {
	
		$contents ="<?php\n";
		$contents .="/**\n"; 
		$contents .=" * Type:     Cite CMS Core Class<br>\n";
		$contents .=" * Name:     ".$this->fields['moduleName'].".class.php<br>\n";
		$contents .=" * Purpose:  For all ".$this->fields['moduleName']." methods<br>\n";
		$contents .=" * @author Cite CMS Module Developer\n";
		$contents .=" * @access Public\n";
		$contents .=" * @package CiteCMS\n";
		$contents .=" * @version 1.0\n";
		$contents .=" * @Copyright 2006 Cite Software Solutions\n"; 
		$contents .=" * @link http://www.citecsoftware.com\n";
		$contents .="*/\n";
		$contents .="\n";
		$contents .="require(CLASS_PATH.'/getter/".$this->fields['moduleName']."_getter.class.php');\n";
		$contents .="\n";
		$contents .="class ".$this->fields['moduleName']." extends ".$this->fields['moduleName']."_getter {\n";
		$contents .="\n";
		
		// Constructor
		$contents .="\n";
		$contents .="function ".$this->fields['moduleName']."(){\n";		
		$contents .="	global \$smarty;\n";
		$contents .="	global \$translate;\n";		
		$contents .="	\$translate = new translate();\n";
		$contents .="	\$translate_array = \$translate->translate_module(\"".$this->fields['moduleName']."\");\n";
		$contents .="	if(!empty(\$translate_array)) {\n";		
		$contents .="		foreach(\$translate_array as \$translate){\n";				
		$contents .="			\$tans = \"translate_\".strtolower(\$translate['name']);\n";				
		$contents .="			\$val = \$translate['content'];\n";				
		$contents .="			\$smarty->assign(\$tans,\$val);\n";
		$contents .="		}\n";
		$contents .="	}\n";
		$contents .="}\n";
		
		$contents .="\n\n";
		
// Add Method
		$contents .="/**\n";
		$contents .="*\n";
		$contents .="* Type:     Cite CMS Public Methods<br>\n";
		$contents .="* Name:     add_".$this->fields['moduleName']."<br>\n";
		$contents .="* Purpose:  Adds A single ".$this->fields['moduleName']." row<br>\n";
		$contents .="*\n";
		$contents .="* @author Cite CMS Module Developer\n";
		$contents .="* @access Public\n";
		$contents .="* @return ".$this->fields['moduleName']." Object\n";
		$contents .="* @version 1.0\n";
		$contents .="* @uses \$db Datbase object, \$error the Error object\n";
		$contents .="*/\n";	
		$contents .="function add_".$this->fields['moduleName']."(){\n";
		$contents .="	global \$db;\n";
		$contents .="	global \$error;\n";
		$contents .="\n";
		
		$contents .="	\$q = \"INSERT INTO  ".$this->fields['moduleName']." SET\n";
		
			// Loop through the fields
		
			$fieldCount = 0;
					
			$count = count($_REQUEST['field']);
			
			foreach($_REQUEST['field'] as $key=>$val){								
				
				foreach($val as $field => $name){
							
					if($field == "name") {	
									
					$fieldCount++;
					
					$contents .= "		".$val['name']."					=\". \$db->qstr(\$_REQUEST['".$val['name']."'])";
					
						if($fieldCount < $count) {
							$contents .= " .\",\n";					
						} else {
							$contents .= ";\n\n";
						}
					
					} // End If
									
					
				} // Inner Foreach
			}
			
		$contents .="	if(!\$rs = \$db->Execute(\$q)) {\n";
		$contents .="		\$error->dbError(\$db->ErrorMsg(), \$q);\n";
		$contents .="	}\n";
		$contents .="\n";
		$contents .="\$_SESSION['CLEAR_CACHE'] = true;\n";
		$contents .="\n";
		$contents .=" return \$db->Insert_ID();\n";
		$contents .="}\n";		
		$contents .="\n";
		$contents .="\n";
		
// View Method
		$contents .="/**\n";
		$contents .="*\n";
		$contents .="* Type:     Cite CMS Public Methods<br>\n";
		$contents .="* Name:     view_".$this->fields['moduleName']."<br>\n";
		$contents .="* Purpose:  Loads A single ".$this->fields['moduleName']." row<br>\n";
		$contents .="*\n";
		$contents .="* @author Cite CMS Module Developer\n";
		$contents .="* @param $".$this->fields['moduleName']."_id String The ".$this->fields['moduleName']." ID\n";
		$contents .="* @access Public\n";
		$contents .="* @return ".$this->fields['moduleName']." Object\n";
		$contents .="* @version 1.0\n";
		$contents .="* @uses \$db Datbase object, \$error the Error object\n";
		$contents .="*/\n";	
		$contents .="function view_".$this->fields['moduleName']."($".$this->fields['moduleName']."_id){\n";
		$contents .="	global \$db;\n";
		$contents .="	global \$error;\n";
		$contents .="\n";
		$contents .="	\$q = \"SELECT * FROM ".$this->fields['moduleName']."\n";
		$contents .="	WHERE ".$this->fields['moduleName']."_id = \". \$db->qstr($".$this->fields['moduleName']."_id);\n";
		$contents .="\n";
		$contents .="	if(!\$rs = \$db->Execute(\$q)) {\n";
		$contents .="		\$error->dbError(\$db->ErrorMsg(), \$q);\n";
		$contents .="	}\n";
		$contents .="\n";
		$contents .="	\$tempArray = \$rs->GetArray();\n";
		$contents .="\n";
		$contents .="	\$this->fields = \$tempArray[0];\n";
		$contents .="\n";		
		$contents .="}\n";		
		$contents .="\n";
		$contents .="\n";
		
		
// search Method
		$contents .="/**\n";
		$contents .="*\n";
		$contents .="* Type:     Cite CMS Public Methods<br>\n";
		$contents .="* Name:     search_".$this->fields['moduleName']."<br>\n";
		$contents .="* Purpose:  Loads All ".$this->fields['moduleName']." rows paginated<br>\n";
		$contents .="*\n";
		$contents .="* @author Cite CMS Module Developer\n";
		$contents .="* @param SmartyPaginate::getCurrentIndex() Smarty Paginate Object\n";
		$contents .="* @param  SmartyPaginate::getLimit() Smarty Paginate Object\n";
		$contents .="* @access Public\n";
		$contents .="* @return \$".$this->fields['moduleName']."Array Array  The paginated result set  of ".$this->fields['moduleName']."s\n";
		$contents .="* @version 1.0\n";
		$contents .="* @uses \$db Datbase object, \$error the Error object, \$smarty Smarty Object\n";
		$contents .="*/\n";		
		$contents .="function search_".$this->fields['moduleName']."(){\n";
		$contents .="	global \$db;\n";
		$contents .="	global \$error;\n";
		$contents .="\n";
		$contents .="	\$q = sprintf(\"SELECT SQL_CALC_FOUND_ROWS * FROM ".$this->fields['moduleName']." LIMIT %d,%d\",SmartyPaginate::getCurrentIndex(), SmartyPaginate::getLimit() );\n";		
		$contents .="\n";
		$contents .="	if(!\$rs = \$db->Execute(\$q)) {\n";
		$contents .="		\$error->dbError(\$db->ErrorMsg(), \$q);\n";
		$contents .="}\n";
		$contents .="\n";
		$contents .="	\$".$this->fields['moduleName']."Array = array();\n";			
		$contents .="\n";
		$contents .="	\$counter = 0;\n";
		$contents .="\n";
		$contents .="	\$tempArray = \$rs->GetArray();\n";
		$contents .="\n";
		$contents .="	while(\$counter < count(\$tempArray)) {\n";
		$contents .="		\$".$this->fields['moduleName']."Array[\$counter] = new ".$this->fields['moduleName']."();\n";
		$contents .="		\$".$this->fields['moduleName']."Array[\$counter]->fields = \$tempArray[\$counter];\n";
		$contents .="		\$counter++;\n";
		$contents .="	}\n";
		$contents .="\n";
		$contents .="	// now we get the total number of records from the table\n";
		$contents .="	\$q = \"SELECT FOUND_ROWS()\";\n";
		$contents .="	if(!\$rs = \$db->Execute(\$q)) {\n";
		$contents .="		\$error->dbError(\$db->ErrorMsg(), \$q);\n";
		$contents .="	}\n";
		$contents .="\n";
		$contents .="	SmartyPaginate::setTotal(\$rs->fields['FOUND_ROWS()']);\n";
		$contents .="\n";
		$contents .="	return \$".$this->fields['moduleName']."Array;\n";
		$contents .="\n";									
		$contents .="}\n";		
		$contents .="\n";
		$contents .="\n";
		
		
// Update Mehtod
		$contents .="/**\n";
		$contents .="*\n";
		$contents .="* Type:     Cite CMS Public Methods<br>\n";
		$contents .="* Name:     update_".$this->fields['moduleName']."<br>\n";
		$contents .="* Purpose:  Updates A single ".$this->fields['moduleName']." row<br>\n";
		$contents .="*\n";
		$contents .="* @author Cite CMS Module Developer\n";
		$contents .="* @param \$_REQUEST Array The Form Fields\n";
		$contents .="* @access Public\n";
		$contents .="* @return Boolen True/ False\n";
		$contents .="* @version 1.0\n";
		$contents .="* @uses \$db Datbase object, \$error the Error object\n";
		$contents .="*/\n";	
		$contents .="function update_".$this->fields['moduleName']."(\$_REQUEST){\n";
		$contents .="	global \$db;\n";
		$contents .="	global \$error;\n";
		$contents .="\n";
		$contents .="	\$q = \"UPDATE ".$this->fields['moduleName']." SET\n";
		
			// Loop through the fields
						
			$fieldCount = 0;
					
			$count = count($_REQUEST['field']);
			
			foreach($_REQUEST['field'] as $key=>$val){								
				
				foreach($val as $field => $name){
							
					if($field == "name") {	
									
					$fieldCount++;
					
					$contents .= "		".$val['name']."					=\". \$db->qstr(\$_REQUEST['".$val['name']."']) .\"";
					
						if($fieldCount < $count) {
							$contents .= "	,\n";					
						} else {
							$contents .= "\n";
						}
					}
				
				}
			}
		
		$contents .="	WHERE ".$this->fields['moduleName']."_id = \" . \$db->qstr(\$_REQUEST['".$this->fields['moduleName']."_id']);\n";
		$contents .="\n";
		$contents .="	if(!\$rs = \$db->Execute(\$q)) {\n";
		$contents .="		\$error->dbError(\$db->ErrorMsg(), \$q);\n";
		$contents .="	}\n";
		$contents .="\n";
		$contents .="\$_SESSION['CLEAR_CACHE'] = true;\n";
		$contents .="\n";
		$contents .="	return true;\n";
		$contents .="}\n";		
		$contents .="\n";
		$contents .="\n";
		
		
// Delete Method
		$contents .="/**\n";
		$contents .="*\n";
		$contents .="* Type:     Cite CMS Public Methods<br>\n";
		$contents .="* Name:     delete_".$this->fields['moduleName']."<br>\n";
		$contents .="* Purpose:  Deletes A single ".$this->fields['moduleName']." row<br>\n";
		$contents .="*\n";
		$contents .="* @author Cite CMS Module Developer\n";
		$contents .="* @param \$_REQUEST Array The Form Fields\n";
		$contents .="* @access Public\n";
		$contents .="* @return Boolen True/ False\n";
		$contents .="* @version 1.0\n";
		$contents .="* @uses \$db Datbase object, \$error the Error object\n";
		$contents .="*/\n";	
		$contents .="function delete_".$this->fields['moduleName']."(\$".$this->fields['moduleName']."_id){\n";
		$contents .="	global \$db;\n";
		$contents .="	global \$error;\n";
		$contents .="\n";
		$contents .="	\$q = \"DELETE FROM ".$this->fields['moduleName']."\n";
		$contents .="	WHERE ".$this->fields['moduleName']."_id = \" . \$db->qstr(\$".$this->fields['moduleName']."_id);\n";
		$contents .="\n";
		$contents .="	if(!\$rs = \$db->Execute(\$q)) {\n";
		$contents .="		\$error->dbError(\$db->ErrorMsg(), \$q);\n";
		$contents .="	}\n";
		$contents .="\n";
		$contents .="\$_SESSION['CLEAR_CACHE'] = true;\n";
		$contents .="\n";
		$contents .="	return true;\n";		
		$contents .="}\n";		
		$contents .="\n";
		$contents .="\n";
		$contents .="}\n";
		$contents .="?>";
		
	
		$path = CLASS_PATH."/core/".$this->fields['moduleName'].".class.php";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save Class:'. $path);
		} else {
			return true;
		}
	
	}

////////////////
// PHP Pages //
///////////////

// Add

	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createAddMethod<br>
	 * Purpose:  Creats the add php page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $auth String The auth type user, admin public
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createAddMethod($auth) {
		global $db;
		global $error;
		
		// Insert The Page Details	
		$this->fields['AddPageName']	= $this->fields['moduleName'].":add_".$this->fields['moduleName'];
		
		$q = "INSERT INTO page_setup SET
				page_setup_name				=" . $db->qstr($this->fields['AddPageName']) .",
				page_setup_display_name 	=" . $db->qstr($this->fields['addTranslate']) .",
				page_setup_page_title 		=" . $db->qstr($this->fields['addPageTitle']) .",
				page_setup_description		=" . $db->qstr($this->fields['addDescription']) .", 
				page_setup_keywords 			=" . $db->qstr($this->fields['addKeywrods']) .",
				page_setup_order				=" . $db->qstr(0) .", 
				page_setup_active				=" . $db->qstr(1) .", 
				page_views						=" . $db->qstr(0); 

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		// Insert Module Methods
		$q = "INSERT INTO module_method SET
				module_id						=" . $db->qstr($this->fields['module_id']) .",
				module_method_name			=" . $db->qstr($this->fields['AddPageName']) .",
				module_method_translate 	=" . $db->qstr($this->fields['addTranslate']) .",
				module_method_admin_menu 	=" . $db->qstr($this->fields['addAdminMenu']) .",
				module_method_user_menu 	=" . $db->qstr($this->fields['addUserMenu']) .",
				module_method_public_menu	=" . $db->qstr($this->fields['addPublicMenu']);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}

		// Start The page Creation
		$contents = "<?php\n";
		$contents .= "	/**\n";  
		$contents .= "* Type:     Cite CMS PHP Page<br>\n";
		$contents .= "	* Name:     add_".$this->fields['moduleName'].".php<br>\n";
		$contents .= "	* Purpose:  Add New ".$this->fields['moduleTranslateName']."<br>\n";
		$contents .= "	* \n";
		$contents .= "	* @author Cite CMS Module Developer\n";
		$contents .= "	* @access Public\n";
		$contents .= "	* @version 1.0\n";
		$contents .= "	*/\n";
		$contents .= "\n";
		$contents .= "require(CLASS_PATH.'/core/".$this->fields['moduleName'].".class.php');\n";
		
		$contents .="\$".$this->fields['moduleName']." = new ".$this->fields['moduleName']."();\n";
		
		$contents .="\n";
		// If user Auth selected 
		if($auth == "user") {
			$contents .= "\$auth = &new Auth(\$db, '/index.php?page=user:userLogin', 'secret');\n";
		}

		// If Admin Write
		if($auth == "admin") {
			$contents .= "\$core->verifyAdmin();\n";
		}
		
		$contents .="\n";
		$contents .="// If form Submission\n";
		$contents .="if(isset(\$_REQUEST['submit']) ) {\n";
		$contents .="	// Conect to smarty validator\n";
		$contents .="	SmartyValidate::connect(\$smarty);\n";	
		$contents .="		// If valid Post Disconect and add new ".$this->fields['moduleName']."\n";
		$contents .="		if(SmartyValidate::is_valid(\$_POST)) {\n";	
		$contents .="			SmartyValidate::disconnect();\n";
		$contents .="			\$".$this->fields['moduleName']."_id = \$".$this->fields['moduleName']."->add_".$this->fields['moduleName']."(\$_REQUEST);\n";
		$contents .="			\$core->force_page(\"index.php?page=".$this->fields['moduleName'].":view_".$this->fields['moduleName']."&".$this->fields['moduleName']."_id=\".\$".$this->fields['moduleName']."_id);\n";
		$contents .="		} else {\n";
		$contents .="			// error, redraw the form\n";
		$contents .="			\$smarty->assign(\$_POST);\n";
		$contents .="			\$smarty->assign(\"errorOccurred\",true);\n";
		$contents .="			\$smarty->display('".$this->fields['moduleName']."/add_".$this->fields['moduleName']."_frm.tpl');\n";
		$contents .="		}\n";
		$contents .="} else {\n";
		$contents .="	// Display the Form\n";
		$contents .="	SmartyValidate::connect(\$smarty, true);\n";
		$contents .="	SmartyValidate::register_form('new_".$this->fields['moduleName']."_frm');\n";
				
		$contents .="	\$smarty->display('".$this->fields['templateName']."/add_".$this->fields['templateName']."_frm.tpl');\n";
		$contents .="}\n";
		$contents .="?>";

		// Write File
		$path = MODULE_PATH . "/" . $this->fields['moduleName'] ."/add_".$this->fields['moduleName'].".php";


		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save Add method:'. $path);
		} else {
			return true;
		}		

	}

	
// search
		
	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createSearchMethod<br>
	 * Purpose:  Creats the search php page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $auth String The auth type user, admin public
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/	
	function _createSearchMethod(){
		global $error;
		global $db;
		
		// Insert The Page Details		
		$this->fields['searchPageName']	= $this->fields['moduleName'].":search_".$this->fields['moduleName'];
		
		$q = "INSERT INTO page_setup SET
				page_setup_name				=" . $db->qstr($this->fields['searchPageName']) .",
				page_setup_display_name 	=" . $db->qstr($this->fields['searchTranslate']) .",
				page_setup_page_title 		=" . $db->qstr($this->fields['searchPageTitle']) .",
				page_setup_description		=" . $db->qstr($this->fields['searchDescription']) .", 
				page_setup_keywords 			=" . $db->qstr($this->fields['searchKeywords']) .",
				page_setup_order				=" . $db->qstr(0) .", 
				page_setup_menu				=" . $db->qstr($this->fields['searchMenu']) .", 
				page_setup_active				=" . $db->qstr(1) .", 
				page_views						=" . $db->qstr(0); 

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		// Insert Module Methods
		$q = "INSERT INTO module_method SET
				module_id						=" . $db->qstr($this->fields['module_id']) .",
				module_method_name			=" . $db->qstr($this->fields['searchPageName']) .",
				module_method_translate 	=" . $db->qstr($this->fields['searchTranslate']) .",
				module_method_admin_menu 	=" . $db->qstr($this->fields['searchAdminMenu']) .",
				module_method_user_menu 	=" . $db->qstr($this->fields['searchUserMenu']) .",
				module_method_public_menu	=" . $db->qstr($this->fields['searchPublicMenu']);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
				
		$contents = "<?php\n";
		$contents .= "	/**\n";  
		$contents .= "* Type:     Cite CMS PHP Page<br>\n";
		$contents .= "	* Name:     search_".$this->fields['moduleName'].".php<br>\n";
		$contents .= "	* Purpose:  Search ".$this->fields['moduleTranslateName']."<br>\n";
		$contents .= "	* \n";
		$contents .= "	* @author Cite CMS Module Developer\n";
		$contents .= "	* @access Public\n";
		$contents .= "	* @version 1.0\n";
		$contents .= "	*/\n";
		$contents .= "\n";
		$contents .= "	require(CLASS_PATH.'/core/".$this->fields['moduleName'].".class.php');\n";
		$contents .= "	require(SMARTY_PATH.'/SmartyPaginate.class.php');\n";
		$contents .="\n";
		
		// If user Auth selected 
		if($auth == "user") {
			$contents .= "	\$auth = &new Auth(\$db, '/index.php?page=user:userLogin', 'secret');\n";
		}

		// If Admin Write
		if($auth == "admin") {
			$contents .= "	\$core->verifyAdmin();\n";
		}
		
		$contents .="// If the session is set to clear cache rebuild the cached page\n";
		$contents .="if(\$_SESSION['CLEAR_CACHE'] == true) {\n";
		$contents .="	print \"Cache file rebuilt\";\n";	
		$contents .="	\$smarty->clear_cache('".$this->fields['templateName']."/search_".$this->fields['templateName'].".tpl');\n";	
		$contents .="	\$_SESSION['CLEAR_CACHE'] = false;\n";	
		$contents .="}\n";
		$contents .="\$smarty->caching = true;\n";
		$contents .="// If we do not have a cached file build the page\n";
		$contents .="if(!\$smarty->is_cached('".$this->fields['templateName']."/search_".$this->fields['templateName'].".tpl')) {\n";				
		$contents .= "		// Paginate\n";
		$contents .= "		SmartyPaginate::connect();\n";
		$contents .= "		SmartyPaginate::setLimit(50);\n";
		$contents .= "		SmartyPaginate::setUrl('/?page=".$this->fields['moduleName'].":search_".$this->fields['templateName']."');\n";		
		$contents .="	\n";		
		$contents .="	\$".$this->fields['moduleName']." = new ".$this->fields['moduleName']."();\n";		
		$contents .="	\$".$this->fields['moduleName']."Array = \$".$this->fields['moduleName']."->search_".$this->fields['moduleName']."();\n";	
		$contents .="	\$smarty->assign('".$this->fields['moduleName']."Array', \$".$this->fields['moduleName']."Array);\n";		
		$contents .="	SmartyPaginate::assign(\$smarty);\n";		
		$contents .="}\n";				
		$contents .="	\$smarty->display('".$this->fields['templateName']."/search_".$this->fields['templateName'].".tpl');\n";		
		$contents .="\n";
		$contents .="?>";

		// Write File
		$path = MODULE_PATH . "/" . $this->fields['moduleName'] ."/search_".$this->fields['moduleName'].".php";


		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save Search method:'. $path);
		} else {
			return true;
		}			
	
	}
		
	
// View

	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createAddMethod<br>
	 * Purpose:  Creats the add php page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $auth String The auth type user, admin public
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createViewMethod(){
		global $error;
		global $db;
		
		// Insert The Page Details
		
		$this->fields['viewPageName']	= $this->fields['moduleName'].":view_".$this->fields['moduleName'];
		
		$q = "INSERT INTO page_setup SET
				page_setup_name				=" . $db->qstr($this->fields['viewPageName']) .",
				page_setup_display_name 	=" . $db->qstr($this->fields['viewTranslate']) .",
				page_setup_page_title 		=" . $db->qstr($this->fields['viewPageTitle']) .",
				page_setup_description		=" . $db->qstr($this->fields['viewDescription']) .", 
				page_setup_keywords 			=" . $db->qstr($this->fields['viewKeywords']) .",
				page_setup_order				=" . $db->qstr(0) .", 
				page_setup_menu				=" . $db->qstr($this->fields['viewMenu']) .", 
				page_setup_active				=" . $db->qstr(1) .", 
				page_views						=" . $db->qstr(0); 

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		// Insert Module Methods
		$q = "INSERT INTO module_method SET
				module_id						=" . $db->qstr($this->fields['module_id']) .",
				module_method_name			=" . $db->qstr($this->fields['viewPageName']) .",
				module_method_translate 	=" . $db->qstr($this->fields['viewTranslate']) .",
				module_method_admin_menu 	=" . $db->qstr($this->fields['viewAdminMenu']) .",
				module_method_user_menu 	=" . $db->qstr($this->fields['viewUserMenu']) .",
				module_method_public_menu	=" . $db->qstr($this->fields['viewPublicMenu']);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		$contents = "<?php\n";
		$contents .= "	/**\n";  
		$contents .= "* Type:     Cite CMS PHP Page<br>\n";
		$contents .= "	* Name:     view_".$this->fields['moduleName'].".php<br>\n";
		$contents .= "	* Purpose:  View a Single ".$this->fields['moduleTranslateName']." row<br>\n";
		$contents .= "	* \n";
		$contents .= "	* @author Cite CMS Module Developer\n";
		$contents .= "	* @access Public\n";
		$contents .= "	* @version 1.0\n";
		$contents .= "	*/\n";
		$contents .= "\n";
		$contents .= "	require(CLASS_PATH.'/core/".$this->fields['moduleName'].".class.php');\n";
		$contents .="\n";
		
		// If user Auth selected 
		if($this->fields['viewAuth'] == "user") {
			$contents .= "	\$auth = &new Auth(\$db, '/index.php?page=user:userLogin', 'secret');\n";
		}

		// If Admin Write
		if($this->fields['viewAuth'] == "admin") {
			$contents .= "	\$core->verifyAdmin();\n";
		}
		
		$contents .= "// Set Cache ID\n";
		$contents .= "\$my_cache_id = \$_REQUEST['".$this->fields['moduleName']."_id'];\n";
		$contents .= "// If the session is set to clear cache rebuild the cached page\n";
		$contents .= "if(\$_SESSION['CLEAR_CACHE'] == true) {\n";
		$contents .= "	print \"Cache file rebuilt\";\n";	
		$contents .= "\$smarty->clear_cache('".$this->fields['moduleName']."/view_".$this->fields['moduleName'].".tpl',\$my_cache_id);\n";
		$contents .= "\$smarty->clear_cache('".$this->fields['moduleName']."/search_".$this->fields['moduleName'].".tpl');\n";	
		$contents .= "	\$_SESSION['CLEAR_CACHE'] = false;\n";	
		$contents .= "}\n";
		$contents .= "\$smarty->caching = true;\n";
		$contents .= "// If we do not have a cached file build the page\n";
		$contents .= "if(!\$smarty->is_cached('".$this->fields['moduleName']."/view_".$this->fields['moduleName'].".tpl',\$my_cache_id)) {\n";
		
		// File Contents
		$contents .= "		\$".$this->fields['moduleName']." = new ".$this->fields['moduleName']."();\n";
		$contents .= "\n";		
		$contents .= "	\$".$this->fields['moduleName']."->view_".$this->fields['moduleName']."(\$_REQUEST['".$this->fields['moduleName']."_id']);\n";
		$contents .= "\n";		
		$contents .= "	\$smarty->assign('".$this->fields['moduleName']."', \$".$this->fields['moduleName'].");\n";
		$contents .= "\n";
		$contents .= "}\n";
		$contents .= "\$smarty->display('".$this->fields['moduleName']."/view_".$this->fields['moduleName'].".tpl',\$my_cache_id);\n";
		$contents .= "\n";		
		$contents .= "?>";		
		
		// Write File
		$path = MODULE_PATH . "/" . $this->fields['moduleName'] ."/view_".$this->fields['moduleName'].".php";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save View method:'. $path);
		} else {
			return true;
		}	
		
	}
	
// Update	

	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createUpdateMethod<br>
	 * Purpose:  Creats the update php page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $auth String The auth type user, admin public
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createUpdateMethod(){
		global $error;
		global $db;
		
		// Insert The Page Details
		
		$this->fields['updatePageName']	= $this->fields['moduleName'].":update_".$this->fields['moduleName'];
		
		$q = "INSERT INTO page_setup SET
				page_setup_name				=" . $db->qstr($this->fields['updatePageName']) .",
				page_setup_display_name 	=" . $db->qstr($this->fields['updateTranslate']) .",
				page_setup_page_title 		=" . $db->qstr($this->fields['updatePageTitle']) .",
				page_setup_description		=" . $db->qstr($this->fields['updateDescription']) .", 
				page_setup_keywords 			=" . $db->qstr($this->fields['updateKeywords']) .",
				page_setup_order				=" . $db->qstr(0) .", 
				page_setup_menu				=" . $db->qstr($this->fields['updateMenu']) .", 
				page_setup_active				=" . $db->qstr(1) .", 
				page_views						=" . $db->qstr(0); 

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
	
		// Insert Module Methods
		$q = "INSERT INTO module_method SET
				module_id						=" . $db->qstr($this->fields['module_id']) .",
				module_method_name			=" . $db->qstr($this->fields['updatePageName']) .",
				module_method_translate 	=" . $db->qstr($this->fields['updateTranslate']) .",
				module_method_admin_menu 	=" . $db->qstr($this->fields['updateAdminMenu']) .",
				module_method_user_menu 	=" . $db->qstr($this->fields['updateUserMenu']) .",
				module_method_public_menu	=" . $db->qstr($this->fields['updatePublicMenu']);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
	
		$contents = "<?php\n";
		$contents .= "	/**\n";  
		$contents .= "* Type:     Cite CMS PHP Page<br>\n";
		$contents .= "	* Name:     update_".$this->fields['moduleName'].".php<br>\n";
		$contents .= "	* Purpose:  Update a Single ".$this->fields['moduleTranslateName']." row<br>\n";
		$contents .= "	* \n";
		$contents .= "	* @author Cite CMS Module Developer\n";
		$contents .= "	* @access Public\n";
		$contents .= "	* @version 1.0\n";
		$contents .= "	*/\n";
		$contents .= "\n";
		
			// If user Auth selected 
		if($this->fields['updateAuth'] == "user") {
			$contents .= "	\$auth = &new Auth(\$db, '/index.php?page=user:userLogin', 'secret');\n";
		}

		// If Admin Write
		if($this->fields['updateAuth'] == "admin") {
			$contents .= "	\$core->verifyAdmin();\n";
		}
		
		
		$contents .= "	require(CLASS_PATH.'/core/".$this->fields['moduleName'].".class.php');\n";
		$contents .="\n";
		
		
	
		// File Contents
		$contents .="\n";
		$contents .="// If form Submission\n";
		$contents .="if(isset(\$_REQUEST['submit']) ) {\n";
		$contents .="	// Conect to smarty validator\n";
		$contents .="	SmartyValidate::connect(\$smarty);\n";	
		$contents .="		// If valid Post Disconect and add new ".$this->fields['moduleName']."\n";
		$contents .="		if(SmartyValidate::is_valid(\$_POST)) {\n";	
		$contents .="			SmartyValidate::disconnect();\n";
		$contents .="			\$".$this->fields['moduleName']." = new ".$this->fields['moduleName']."();\n";
		$contents .="			\$".$this->fields['moduleName']."->update_".$this->fields['moduleName']."(\$_REQUEST);\n";
		$contents .="			\$core->force_page(\"index.php?page=".$this->fields['moduleName'].":view_".$this->fields['moduleName']."&".$this->fields['moduleName']."_id=\".\$_REQUEST['".$this->fields['moduleName']."_id']);\n";
		$contents .="		} else {\n";
		$contents .="			// error, redraw the form\n";
		$contents .="			\$smarty->assign(\"errorOccurred\",true);\n";
		$contents .="			\$smarty->assign(\$_POST);\n";
		$contents .="			\$smarty->display('".$this->fields['moduleName']."/update_".$this->fields['moduleName']."_frm.tpl');\n";
		$contents .="		}\n";
		$contents .="} else {\n";
		$contents .="	// Display the Form\n";
		$contents .="\n";
		$contents .="\$".$this->fields['moduleName']." = new ".$this->fields['moduleName']."();\n";
		$contents .="\$".$this->fields['moduleName']."->view_".$this->fields['moduleName']."(\$_REQUEST['".$this->fields['moduleName']."_id']);\n";
		$contents .="\n";
		$contents .="	SmartyValidate::connect(\$smarty, true);\n";
		$contents .="	SmartyValidate::register_form('update_".$this->fields['moduleName']."_frm');\n";
		
		$contents .="\n";
		$contents .="\$smarty->assign('".$this->fields['moduleName']."',\$".$this->fields['moduleName'].");\n";
		$contents .="\$smarty->display('".$this->fields['templateName']."/update_".$this->fields['templateName']."_frm.tpl');\n";
		$contents .="}\n";
		
		
		$contents .= "?>";	
		
	
	
		// Write File
		$path = MODULE_PATH . "/" . $this->fields['moduleName'] ."/update_".$this->fields['moduleName'].".php";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save Update method:'. $path);
		} else {
			return true;
		}	
	
	}
		
// Delete 
	/**
	 *
	 * Type:     Private Method<br>
	 * Name:     _createDeleteMethod<br>
	 * Purpose:  Creats the delete php page<br>
	 * 
	 * @author jaimie@citesoftware.com
	 * @param $auth String The auth type user, admin public
	 * @access Private
	 * @return Boolen True/False
	 * @version 1.0
	*/
	function _createDeleteMethod() {
		global $error;
		global $db;
		
		// Insert The Page Details
		
		$this->fields['deletePageName']	= $this->fields['moduleName'].":delete_".$this->fields['moduleName'];
		
		$q = "INSERT INTO page_setup SET
				page_setup_name				=" . $db->qstr($this->fields['deletePageName']) .",
				page_setup_display_name 	=" . $db->qstr($this->fields['deleteTranslate']) .",
				page_setup_page_title 		=" . $db->qstr($this->fields['deletePageTitle']) .",
				page_setup_description		=" . $db->qstr($this->fields['deleteDescription']) .", 
				page_setup_keywords 			=" . $db->qstr($this->fields['deleteKeywords']) .",
				page_setup_order				=" . $db->qstr(0) .", 
				page_setup_menu				=" . $db->qstr($this->fields['deleteMenu']) .", 
				page_setup_active				=" . $db->qstr(1) .", 
				page_views						=" . $db->qstr(0); 

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		// Insert Module Methods
		$q = "INSERT INTO module_method SET
				module_id						=" . $db->qstr($this->fields['module_id']) .",
				module_method_name			=" . $db->qstr($this->fields['deletePageName']) .",
				module_method_translate 	=" . $db->qstr($this->fields['deleteTranslate']) .",
				module_method_admin_menu 	=" . $db->qstr($this->fields['deleteAdminMenu']) .",
				module_method_user_menu 	=" . $db->qstr($this->fields['deleteUserMenu']) .",
				module_method_public_menu	=" . $db->qstr($this->fields['deletePublicMenu']);

		if(!$rs = $db->Execute($q)) {
			$error->dbError($db->ErrorMsg(),$q);
			exit;
		}
		
		$contents = "<?php\n";
		$contents .= "	/**\n";  
		$contents .= "* Type:     Cite CMS PHP Page<br>\n";
		$contents .= "	* Name:     delete_".$this->fields['moduleName'].".php<br>\n";
		$contents .= "	* Purpose:  delete a Single ".$this->fields['moduleTranslateName']." row<br>\n";
		$contents .= "	* \n";
		$contents .= "	* @author Cite CMS Module Developer\n";
		$contents .= "	* @access Public\n";
		$contents .= "	* @version 1.0\n";
		$contents .= "	*/\n";
		$contents .= "\n";
		$contents .= "	require(CLASS_PATH.'/core/".$this->fields['moduleName'].".class.php');\n";
		$contents .="\n";
		
		// If user Auth selected 
		if($this->fields['deleteAuth'] == "user") {
			$contents .= "	\$auth = &new Auth(\$db, '/index.php?page=user:userLogin', 'secret');\n";
		}

		// If Admin Write
		if($this->fields['deleteAuth'] == "admin") {
			$contents .= "	\$core->verifyAdmin();\n";
		}
	
		$contents .= "\n";
		
		$contents .= "\$".$this->fields['moduleName']." = new ".$this->fields['moduleName']."();\n";
		$contents .= "\n";
		$contents .= "\$".$this->fields['moduleName']."->delete_".$this->fields['moduleName']."(\$_REQUEST['".$this->fields['moduleName']."_id']);\n";
		$contents .= "\n";
		$contents .= "\$smarty->display('".$this->fields['moduleName']."/delete_".$this->fields['moduleName'].".tpl')\n";
		$contents .= "\n";
		$contents .= "?>";	
	
		// Write File
		$path = MODULE_PATH . "/" . $this->fields['moduleName'] ."/delete_".$this->fields['moduleName'].".php";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save Delete method:'. $path);
		} else {
			return true;
		}	
	}
		

/******************/	
/* Template Forms */
/*****************/


// Add Template
	function _createAddTemplate() {
		global $error;
		
		$contents = "<!-- add_".$this->fields['moduleName']."_frm -->\n";
		$contents .= "{include file=\"core/header.tpl\"}\n";
		$contents .= "\n";
		$contents .= "<table cellpadding=\"0\" cellspacing=\"0\" width=\"400\">\n";
		$contents .= "	<tr>\n";
		$contents .= "		<td><span class=\"greetUser\">{\$translate_text_add_new_record_to} ".$this->fields['moduleTranslateName']."</td>\n";
		$contents .= "		<td align=\"right\"></td>\n";
		$contents .= "</tr>\n";
		$contents .= "</table>\n";
		$contents .="\n";
		
		$contents .="<br>\n";
		$contents .="{if \$errorOccurred}\n";
		$contents .="	<table cellpadding=\"5\" cellspacing=\"1\" width=\"600\" border=\"0\" class=\"infoBoxNotice\">\n";
		$contents .="		<tr>\n";
		$contents .="			<td class=\"infoBoxNoticeContents\">\n";
		$contents .="{/if}\n";
		
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "\$translate_field_".$val['name'];
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
		
			if(!empty($validate)) {
					$contents .="{validate field=\"$fieldName\" criteria=\"$validate\" message=\"<img src=images/icons/flag_16.gif> <span class=errorText>\$translate_error_".$validate."_".$fieldName."</span><br>\"}\n";
				}
		}
		
		
		$contents .="{if \$errorOccurred}\n";
		$contents .="		</td>\n";
		$contents .="	</tr>\n";
		$contents .="</table>\n";
		$contents .="{/if}\n";
		
		$contents .="<br>\n";
		$contents .="\n";
		$contents .="<form method=\"post\" action=\"index.php?page=".$this->fields['moduleName'].":add_".$this->fields['moduleName']."\" id=\"add_".$this->fields['moduleName']."_frm\">\n";
		$contents .="\n";
		$contents .="<table cellpadding=\"5\" cellspacing=\"5\" class=\"formArea\" width=\"400\">\n";
		
		$colCount =1;
		
		// Loop for Form Headings
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "{\$translate_field_".$val['name']."}";
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
			
			// Headings
			$contents .="	<tr>\n";
			
			if($input_type != "hidden"){
			$contents .="		<td class=\"formAreaTitle\">$translate</td>\n";			
			$contents .="		<td class=\"fieldValue\"><input type=\"$input_type\" name=\"$fieldName\" value=\"{\$$fieldName}\" size=\"\" id=\"$fieldName\">\n";
			
			
			
			$contents .="</td>\n";
			
			}
			$contents .="	</tr>\n";
			
			$colCount++;
		}
	
		$contents .="	<tr>\n";
		$contents .="		<td colspan=\"$colCount\">\n";
		
		// Loop for Form Headings
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "{\$translate_field_".$val['name']."}";
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
		
			if($input_type == "hidden"){
				$contents .="			<input type=\"$input_type\" name=\"$fieldName\" value=\"{\$$fieldName}\" size=\"\" id=\"$fieldName\">\n";
				
				if(!empty($validate)) {
					$contents .="{validate field=\"$fieldName\" criteria=\"$validate\" message=\"<img src=images/icons/flag_16.gif> <span class=errorText>\$translate_error_".$validate."_".$fieldName."</span><br>\"}\n";
				}
			}
		
		
		}
		
		$contents .="		<input type=\"submit\" name=\"submit\" value=\"{\$translate_button_submit}\"></td>\n";
		$contents .="	</tr>\n";
		$contents .="</table>\n";
		
		$contents .="\n";
		
		$contents .="</form>\n";
		
		$contents .="\n";
		
		$contents .= "{include file=\"core/footer.tpl\"}\n";
		
	
		// Write File
		$path = TEMPLATE_PATH . "/" . $this->fields['moduleName'] ."/add_".$this->fields['moduleName']."_frm.tpl";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save add Template:'. $path);
		} else {
			return true;
		}	
	}



// Search Template
	function _createSearchTemplate(){
		global $error;
		
		// Contents
		
		$contents = "<!-- search_".$this->fields['moduleName']." -->\n";
		
		$contents .= "{include file=\"core/header.tpl\"}\n";
		
		
		
		$contents .=	"<span class=\"greetUser\">{\$translate_text_records_found} {\$paginate.total}</span><br>\n";

		$contents .="<table width=\"100%\" cellpadding=\"3\" cellspacing=\"0\" border=\"0\" class=\"productListing\">\n";
		$contents .="	<tr>\n";
		$contents .="		<td class=\"productListing-heading\" width=\"25%\">{\$translate_text_displaying_page} {\$paginate.page_current} {\$translate_text_of} {\$paginate.page_total}</td>\n";
		$contents .="		<td class=\"productListing-heading\" width=\"75%\" align=\"right\" valign=\"middle\">\n";
		$contents .="			{paginate_first text=\"<img src='images/icons/rewnd_24.gif' alt='First' border='0' align='middle'>\"}\n";
		$contents .="			{paginate_prev text=\"<img src='images/icons/back_24.gif' alt='Previous' border='0' align='middle'>\"}\n";
		$contents .="			{paginate_middle format=select}\n";
		$contents .="			{paginate_next text=\"<img src='images/icons/forwd_24.gif' alt='Next' border='0' align='middle'>\"}\n";
		$contents .="			{paginate_last text=\"<img src='images/icons/fastf_24.gif' alt='Last' border='0' align='middle'>\"}\n";
		$contents .="		</td>\n";
		$contents .="	</tr>\n";
		$contents .="</table>\n";
		$contents .="<br><br>\n";
		$contents .="\n";
		
		$contents .="<table width=\"100%\" cellpadding=\"3\" cellspacing=\"0\" border=\"0\" class=\"productListing\">\n";
		$contents .="	<tr>\n";
		
		
		// Loop through Translate Fields
		$contents .="		<td class=\"productListing-heading\">{\$translate_field_".$this->fields['moduleName']."}</td>\n";
		
		$colCount = 2;
		
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "{\$translate_field_".$val['name']."}";
			$validate	= $val['validate'];
			
			
			// Headings
			$contents .="		<td class=\"productListing-heading\">$translate</td>\n";
			
			$colCount++;
		}
		
		$contents .="		<td class=\"productListing-heading\">{\$translate_text_view}</td>\n";
		
		$contents .="	</tr>\n";
		
		$contents .="	{foreach from=\$".$this->fields['moduleName']."Array item=".$this->fields['moduleName']."}\n";
		$contents .="	<tr>\n";
			
		$contents .="		<td class=\"productListing-data\">{\$".$this->fields['moduleName']."->get_".$this->fields['moduleName']."_id()}</td>\n";
				
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$default		= $val['default'];
			$extra		= $val['extra'];
			
			$contents .="		<td class=\"productListing-data\">{\$".$this->fields['moduleName']."->get_".$fieldName."()}</td>\n";
			
		}
		
		$contents .="		<td class=\"productListing-data\"><a href=\"index.php?page=".$this->fields['moduleName'].":view_".$this->fields['moduleName']."&".$this->fields['moduleName']."_id={\$".$this->fields['moduleName']."->get_".$this->fields['moduleName']."_id()}\"><img src=\"images/icons/srch_16.gif\" alt=\"View\" border=\"0\"></a></td>\n";
		$contents .="	</tr>\n";
		$contents .="	{foreachelse}\n";
		
		$contents .="	<tr>\n";
		$contents .="		<td class=\"productListing-data\" colspan=\"$colCount\">{\$translate_text_no_results_found}</td>\n";
		$contents .="	</tr>\n";
		$contents .="	{/foreach}\n";
		$contents .="</table>\n";
		
		$contents .="\n";
		
		
		
		
		$contents .= "{include file=\"core/footer.tpl\"}\n";
		
		
	
	// Write File
		$path = TEMPLATE_PATH . "/" . $this->fields['moduleName'] ."/search_".$this->fields['moduleName'].".tpl";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save search Template:'. $path);
		} else {
			return true;
		}	
		
	}
	
	
// Delete Template
	function _createDeleteTemplate(){
		global $error;
	
		$contents = "<!-- delete_".$this->fields['moduleName']." -->\n";
		$contents .= "{include file=\"core/header.tpl\"}\n";
		$contents .= "\n";
		$contents .= "<table cellpadding=\"0\" cellspacing=\"0\" width=\"400\">\n";
		$contents .= "	<tr>\n";
		$contents .= "		<td><span class=\"greetUser\">Delete ".$this->fields['moduleName']." ID# {\$".$this->fields['moduleName']."_id}</span></td>\n";
		$contents .= "		<td align=\"right\"></td>\n";
		$contents .= "</tr>\n";
		$contents .= "</table>\n";
		
		
		$contents .= "{include file=\"core/footer.tpl\"}\n";
	
		// Write File
		$path = TEMPLATE_PATH . "/" . $this->fields['moduleName'] ."/delete_".$this->fields['moduleName'].".tpl";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save delete Template:'. $path);
		} else {
			return true;
		}	
	}
	
	
// Update Template
	function _createUpdateTemplate(){
		global $error;
	
		$contents = "<!-- update_".$this->fields['moduleName']."_frm -->\n";
		$contents .= "{include file=\"core/header.tpl\"}\n";
		$contents .= "\n";
		$contents .= "<table cellpadding=\"0\" cellspacing=\"0\" width=\"400\">\n";
		$contents .= "	<tr>\n";
		$contents .= "		<td><span class=\"greetUser\">Update ".$this->fields['moduleTranslateName']." ID# {\$".$this->fields['moduleName']."->get_".$this->fields['moduleName']."_id()}</span></td>\n";
		$contents .= "		<td align=\"right\"></td>\n";
		$contents .= "</tr>\n";
		$contents .= "</table>\n";
		
		$contents .="\n";
		
		$contents .="<br>\n";
		$contents .="{if \$errorOccurred}\n";
		$contents .="	<table cellpadding=\"5\" cellspacing=\"1\" width=\"600\" border=\"0\" class=\"infoBoxNotice\">\n";
		$contents .="		<tr>\n";
		$contents .="			<td class=\"infoBoxNoticeContents\">\n";
		$contents .="{/if}\n";
		
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "\$translate_field_".$val['name'];
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
		
			if(!empty($validate)) {
					$contents .="{validate field=\"$fieldName\" criteria=\"$validate\" message=\"<img src=images/icons/flag_16.gif> <span class=errorText>\$translate_error_".$validate."_".$fieldName."</span><br>\"}\n";
				}
		}
		
		
		$contents .="{if \$errorOccurred}\n";
		$contents .="		</td>\n";
		$contents .="	</tr>\n";
		$contents .="</table>\n";
		$contents .="{/if}\n";
		
		$contents .="<br>\n";
		
		$contents .="\n";
		$contents .="<form method=\"post\" action=\"index.php?page=".$this->fields['moduleName'].":update_".$this->fields['moduleName']."\" id=\"add_".$this->fields['moduleName']."_frm\">\n";
		$contents .="\n";
		$contents .="<table cellpadding=\"5\" cellspacing=\"5\" class=\"formArea\" width=\"400\">\n";
		
		$colCount =1;
		
		// Loop for Form Headings
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "{\$translate_field_".$val['name']."}";
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
			
			// Headings
			$contents .="	<tr>\n";
			
			if($input_type != "hidden"){
			$contents .="		<td class=\"formAreaTitle\">$translate</td>\n";			
			$contents .="		<td class=\"fieldValue\"><input type=\"$input_type\" name=\"$fieldName\" value=\"{\$".$this->fields['moduleName']."->get_$fieldName()}\" id=\"$fieldName\">\n";
			
			
			
			$contents .="</td>\n";
			
			}
			$contents .="	</tr>\n";
			
			$colCount++;
		}
	
		$contents .="	<tr>\n";
		$contents .="		<td colspan=\"$colCount\">\n";
		// Loop for Form Headings
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "\$translate_field_".$val['name'];
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
		
			if($input_type == "hidden"){
				$contents .="			<input type=\"$input_type\" name=\"$fieldName\" value=\"{\$$fieldName}\" size=\"\" id=\"$fieldName\">\n";
				
				if(!empty($validate)) {
					$contents .="{validate field=\"$fieldName\" criteria=\"$validate\" message=\"<img src=images/icons/flag_16.gif> <span class=errorText>\$translate_error_".$validate."_".$fieldName."</span><br>\"}\n";
				}
			}
		
		
		}
		$contents .="		<input type=\"hidden\" name=\"".$this->fields['moduleName']."_id\" value=\"{\$".$this->fields['moduleName']."_id}\">\n";
		$contents .="		<input type=\"submit\" name=\"submit\" value=\"{\$translate_button_submit}\"></td>\n";
		$contents .="	</tr>\n";
		$contents .="</table>\n";
		
		$contents .="\n";
		
		$contents .="</form>\n";
		
		$contents .="\n";
		
		
		
		$contents .= "{include file=\"core/footer.tpl\"}\n";
		
		// Write File
		$path = TEMPLATE_PATH . "/" . $this->fields['moduleName'] ."/update_".$this->fields['moduleName']."_frm.tpl";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save Update Template:'. $path);
		} else {
			return true;
		}	
	}
	
	
// View Template
	function _createViewTemplate(){
		global $error;
	
		$contents = "<!-- view_".$this->fields['moduleName']." -->\n";
		
		$contents .= "{include file=\"core/header.tpl\"}\n";
		$contents .= "\n";
		$contents .= "<table cellpadding=\"0\" cellspacing=\"0\" width=\"400\">\n";
		$contents .= "	<tr>\n";
		$contents .= "		<td><span class=\"greetUser\">View ".$this->fields['moduleName']." ID# {\$".$this->fields['moduleName']."->get_".$this->fields['moduleName']."_id()}</span></td>\n";
		$contents .= "		<td align=\"right\">\n";
		$contents .= "				<a href=\"{\$from}\"><img src=\"images/icons/back_16.gif\" alt=\"back\" border=\"0\"></a>\n";
		$contents .= "				<a href=\"index.php?page=".$this->fields['moduleName'].":update_".$this->fields['moduleName']."&".$this->fields['moduleName']."_id={\$".$this->fields['moduleName']."->get_".$this->fields['moduleName']."_id()}\"><img src=\"images/icons/edit_16.gif\" border=\"0\" alt=\"Edit\"></a>\n";
		$contents .= "				<a href=\"index.php?page=".$this->fields['moduleName'].":delete_".$this->fields['moduleName']."&".$this->fields['moduleName']."_id={\$".$this->fields['moduleName']."->get_".$this->fields['moduleName']."_id()}\"><img src=\"images/icons/del_16.gif\" border=\"0\" alt=\"Delete\"></a>\n";
		$contents .= "			</td>\n";
		$contents .= "</tr>\n";
		$contents .= "</table>\n";
		$contents .= "\n";
		$contents .= "<br><br>\n";
		$contents .= "\n";
		$contents .= "<table cellpadding=\"5\" cellspacing=\"5\" class=\"formArea\" width=\"400\">\n";
		
		// Loop Through the fields
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= "{\$translate_field_".$val['name']."}";
			$validate	= $val['validate'];
		
				$contents .= "	<tr>\n";
				$contents .= "		<td class=\"formAreaTitle\">$translate</td>\n";
				$contents .= "		<td class=\"fieldValue\">{\$".$this->fields['moduleName']."->get_$fieldName()}</td>\n";
				$contents .= "	</tr>\n";
				
		}
		
		$contents .= "</table>\n";
		$contents .= "\n";
		$contents .= "<br><br>\n";
		$contents .= "\n";
		$contents .= "{include file=\"core/footer.tpl\"}\n";
		
		// Write File
		$path = TEMPLATE_PATH . "/" . $this->fields['moduleName'] ."/view_".$this->fields['moduleName'].".tpl";
		
		if(!$this->_writeFile($path,$contents)) {
			$error->coreError('Unable to save View Template:'. $path);
		} else {
			return true;
		}	
	}
		

/******************/
/* Module Methods */
/*****************/
	
//Write File

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
	
	function _buildSchema($data,$module){
		global $db;
	
		require( ADODB_PATH."/adodb-xmlschema.inc.php" );

		$schema = new adoSchema( $db );

		$out = $schema->ExtractSchema($data,$module);

		$file_name = "schema.$module.xml";
	
		$file_path = MODULE_PATH."/".$module."/".$file_name;
	
		$file_data = $out;
		
		$this->_writeFile($file_path,$file_data);
		
		return true;
	
	}
	
	
	function _createLaguage() {
	
		$data = "<?xml version=\"1.0\"?>\n";
		$data .="<language id=\"".$this->fields['moduleName']."\">\n";
	
		// Fields
		$data .="\n";
		$data .="<!-- Fields -->\n";
	
		// Loop for Form Headings
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= $val['translate'];
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
	
			$data .="<field_".$fieldName.">".$translate."</field_".$fieldName.">\n";
			
		}
	
		// Errors
		$data .="\n";
		$data .="<!-- Error -->\n";
		foreach($_REQUEST['field'] as $key=>$val){		
		
			$fieldName 	= $val['name'];
			$type			= $val['type'];
			$length		= $val['length'];
			$extra		= $val['extra'];
			$default		= $val['default'];
			$translate	= $val['translate'];
			$validate	= $val['validate'];
			$input_type	= $val['inputType'];
			
			$data .= $this->_translateErrorMsg($validate,$fieldName,$translate);
			
		}
		
		
		// Text
		$data .="\n";
		$data .="<!-- Text -->\n";
		$data .="<text_add_new_record_to>Add New Record to</text_add_new_record_to>\n";
		$data .="<text_records_found>Records Found</text_records_found>\n";
		$data .="<text_displaying_page>Displaying Page</text_displaying_page>\n";
		$data .="<text_of>Of</text_of>\n";
		$data .="<text_view>View</text_view>\n";
		$data .="<text_no_results_found>No Results Found</text_no_results_found>\n";
		
		$data .="\n";
		$data .="</language>\n";
		
		$path = $this->module_path."/".$this->fields['moduleName']."/language.".$this->language.".".$this->fields['moduleName'].".xml";
		
		if(!$this->_writeFile($path,$data)) {
			$error->coreError('Unable to save View Template:'. $path);
		} else {
			return true;
		}	
		
	}
	
	function _translateErrorMsg($criteria,$field,$translate) {
	
		switch($criteria) {
		
			case 'notEmpty':
				$msg .="<error_notEmpty_".$field.">The field ".$translate." must not be empty</error_notEmpty_".$field.">\n";
				return $msg;
			break;
			
			case 'isCCExpDate':
				$msg .="<error_isCCExpDate_".$field.">The field ".$translate." is not a valid expiration date</error_isCCExpDate_".$field.">\n";
				return $msg;
			break;
			
			case 'isCCNum':
				$msg .="<error_isCCNum_".$field.">The field ".$translate." is not a valid credit card number</error_isCCNum_".$field.">\n";
				return $msg;
			break;
		
			case 'isDate':
				$msg .="<error_isDate_".$field.">The field ".$translate." is not a valid date</error_isDate_".$field.">\n";
				return $msg;
			break;
			
			case 'isEmail':
				$msg .="<error_isEmail_".$field.">The field ".$translate." is not a valid email address</error_isEmail_".$field.">\n";
				return $msg;
			break;
			
			case 'isFloat' :
				$msg .="<error_isFloat_".$field.">The field ".$translate." is not a valid decimal number</error_isFloat_".$field.">\n";
				return $msg;
			break;
			
			case 'isInt' :
				$msg .="<error_isInt_".$field.">The field ".$translate." is not a valid integer</error_isInt_".$field.">\n";
				return $msg;
			break;
			
			case 'isNumber' :
				$msg = "<error_isNumber_".$field.">The field ".$translate." is not a valid number</error_isNumber_".$field.">\n";
				return $msg;
			break;
			
			case 'isPrice' :
				$msg = "<error_isPrice_".$field.">The field ".$translate." is not a valid price</error_isPrice_".$field.">\n";
				return $msg;
			break;
			
			case 'isURL' :
				$msg = "<error_isURL_".$field.">The field ".$translate." is not a Valid URL</error_isURL_".$field.">\n";
				return $msg;
			break;	
		}
	}
	
	
	function getValidateErrorMsg($criteria,$field) {
	
		switch ($criteria) {

			case 'notEmpty' :
				$msg = "{\$translate_error_notEmpty_".$field."}";								
				return $msg;
			break;
			
			case 'isCCExpDate' :
				$msg = "{\$translate_error_isCCExpDate_".$field."}";
				return $msg;
			break;
			
			case 'isCCNum' :
				$msg = "{\$translate_error_isCCNum_".$field."}";
				return $msg;
			break;
			
			case 'isDate' :
				$msg = "{\$translate_error_isDate_".$field."}";
				return $msg;
			break;
			
			case 'isEmail' :
				$msg = "{\$translate_error_isEmail_".$field."}";
				return $msg;
			break;
			
			case 'isFloat' :
				$msg = "{\$translate_error_isFloat_".$field."}";
				return $msg;
			break;
			
			case 'isInt' :
				$msg = "{\$translate_error_isInt_".$field."}";
				return $msg;
			break;
			
			case 'isNumber' :
				$msg = "{\$translate_error_isNumber_".$field."}";
				return $msg;
			break;
			
			case 'isPrice' :
				$msg = "{\$translate_error_isPrice_".$field."}";
				return $msg;
			break;
			
			case 'isURL' :
				$msg = "{\$translate_error_isURL_".$field."}";
				return $msg;
			break;	
		}
	
	}

	function update_module($_REQUEST) {
		global $db;
		global $error;
	
	}
	
	

}

?>