<?php

/**
 * Project:     SmartyValidate: Form Validator for the Smarty Template Engine
 * File:        validate_criteria.notEmpty.php
 * Author:      Monte Ohrt <monte at newdigitalgroup dot com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @link http://www.phpinsider.com/php/code/SmartyValidate/
 * @copyright 2001-2005 New Digital Group, Inc.
 * @author Monte Ohrt <monte at newdigitalgroup dot com>
 * @package SmartyValidate
 */

/**
 * test if a value is not empty
 *
 * @param string $value the value being tested
 * @param boolean $empty if field can be empty
 * @param array params validate parameter values
 * @param array formvars form var values
 */
function smarty_validate_criteria_validateSql($value, $empty, &$params, &$formvars) {

	global $db;
	global $smarty;
   /*
   print "<pre>";
	print_r($formvars['field']);
	print "<pre>";
	*/
	
	$module_name = $formvars['moduleName'];
	

	// Create Temp Table		
	$q = "CREATE TEMPORARY TABLE ".$module_name." (";
		
	$q .= $module_name."_id INT(20) NOT NULL AUTO_INCREMENT ,";
	
	
	foreach($formvars['field'] as $key=>$val){								

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
		foreach($formvars['field'] as $key=>$val){
		
		
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
		
		$q .= "		PRIMARY KEY (".$module_name."_id)";
		$q .= ") ";
	
	// Execute SQL
	if(!$db->execute($q)) {
	
		$smarty->assign('sqlError', $db->ErrorMsg());
		$smarty->assign('sql', $q);
		return false;
		
	} else {
	
		// Drop Table
		$q = "DROP TEMPORARY TABLE ".$module_name;
		
		@$db->execute($q);
		
		
		return true;
	
	}
	
   
}

?>
