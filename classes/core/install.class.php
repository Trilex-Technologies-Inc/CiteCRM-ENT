<?php


class Install {


	function build_package($_REQUEST) {
	

		
		//print_r($_REQUEST);
		
		// Create Directory Structure
		$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']);
		$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']."/classes");
		$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']."/module");
		$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']."/template");
		$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']."/smarty");
		$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']."/smarty/plugins");
		
		$this->package_name = $_REQUEST['package_name'];
		
		
		$out = "<?xml version=\"1.0\"?>\n";
		$out .= "	<package>\n";
		$out .="		<name>".$_REQUEST['package_name']."</name>\n";
		$out .="		<description></description>\n";
		$out .="		<author></author>\n";
		$out .="		<version></version>\n";
		
		// Module Setup
		foreach($_REQUEST['modules'] as $module) {
				
				$out .= "		<module name=\"".$module."\">\n";
				
				// Create Module Dir
				$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']."/module/".$module);
				
				// load methods
				$methods = $this->_get_module_methods($module);
				
				// Create Template Dir
				$this->_create_install_dir(PACKAGE_PATH."/".$_REQUEST['package_name']."/template/".$module);
				
				// Load Templates
				$templates = $this->_copy_templates($module);
					
				
				if(!empty($methods)) {
					
					// Schema
					foreach($methods as $method) {
						$ext = substr($method, -3, 3);
						
						if($ext == "xml") {
							$out .= "			<schema name=\"".$method."\"></schema>\n";
						}
					}
					
					// Methods
					foreach($methods as $method){
						$this->_copy_methods($module,$method);
						
						$ext = substr($method, -3, 3);
											
						if($ext == "php") {
							$out .= "			<method name=\"".$method."\"></method>\n";
						} 
						
					}
					
				}

				// Templates
				if(!empty($templates)) {
					foreach($templates as $template){
						$out .= "			<template name=\"".$template."\"></template>\n";
					}
				}
				
				$out .= "		</module>\n";
				
		}
		
		// Classes
		$out .= "		<classe>\n";
		
		foreach($_REQUEST['modules'] as $module){
		
			$module 			= str_replace(".php", "", $module);
		
			$class_name 	= $module.".class.php";
		
			$getter_class 	= "".$module."_getter.class.php";
			
			$this->_copy_core_class($class_name);
			
			$this->_copy_getter_class($getter_class);
			
			$out .= "			<core_classe name=\"$class_name\">\n";
			$out .= "			</core_classe>\n";
			$out .= "			<getter_classe name=\"$getter_class\">\n";
			$out .= "			</getter_classe>\n";		
			
		}
		
		$out .= "		</classe>\n";
			
		// Smarty Plugins
		$out .= "		<plugin name=\"\">\n";
		$out .= "		</plugin>\n";
		
		// Validator
		$out .= "		<validator name=\"\">\n";
		$out .= "		</validator>\n";
		
		// Modifier
		$out .= "		<modifier name=\"\">\n";
		$out .= "		</modifier>\n";
		
		$out .= "	</package>\n";
		
		
		$this->_save_package_schema($out);
		
		
	}



	// Private Methods

	function _create_install_dir($dir) {
	
		if(!is_dir($dir)) {
			mkdir($dir, 0700);
		}
	
		return true;	
	}


	function _get_module_methods($module) {
	
			if ($handle_2 = opendir(MODULE_PATH."/".$module)) {
			
					while (false !== ($method = readdir($handle_2))) {
					
						if($method != "." && $method != "..") {
					
							$methods[] = $method;
							
						}
						
					}
			}
			
			return $methods;
	}


	function _get_templates($module) {
	
		if (is_dir(TEMPLATE_PATH."/".$module)) {
		
					$handle_2 = opendir(TEMPLATE_PATH."/".$module);
					
					while (false !== ($template = readdir($handle_2))) {
					
						if($template != "." && $template != "..") {
					
							$templates[] = $template;
							
						}
						
					}
			}
			
			return $templates;
	
	}


	function _copy_methods($module,$method) {
	
		$root_file = MODULE_PATH."/".$module."/".$method;
		
		$new_file = PACKAGE_PATH."/".$this->package_name."/module/".$module."/".$method;
	
	
		//print $new_file."<br>";
	
		if(is_file($root_file)) {
			copy($root_file, $new_file);		
		} else {
			$error[] = "error file $root_file Does not exist";
		}
		
	}
	
	function _copy_templates($module){
	
		$templates = $this->_get_templates($module);
		
		if(!empty($templates)) {
		
			foreach($templates as $template) {		
		
				$root_file = TEMPLATE_PATH."/".$module."/".$template;
				
				$new_file = PACKAGE_PATH."/".$this->package_name."/template/".$module."/".$template;
								
				if(is_file($root_file)) {
					copy($root_file, $new_file);		
				} else {
					$error[] = "error file $root_file Does not exist";
				}
				
			}
		}

		return $templates;

	}
	
	
	function _save_package_schema($contents) {
	
		$path = PACKAGE_PATH."/".$this->package_name."/install.".$this->package_name.".xml";
	
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
	
	function _copy_core_class($class_name) {
	
	
	}
	
	function _copy_getter_class($getter_class) {
	
	
	}
	
	function _copy_function(){
	
	}
	
	function _copy_validator() {
	
	}
	
	function _copy_modifier() {
	
	}
	
}

?>