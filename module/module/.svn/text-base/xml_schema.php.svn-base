<?php
require( ADODB_PATH."/adodb-xmlschema.inc.php" );

$schema = new adoSchema( $db );

$data = false;

$table = "address";

$modules = $schema->db->MetaTables( 'TABLES' );

foreach($modules as $module) {
	$data = false;

	$table = $module;	
	
	$out = $schema->ExtractSchema($data,$table);

	$file_name = "schema.$module.xml";
	
	$file_path = MODULE_PATH."/".$module."/".$file_name;
	
	$file_data = $out;
	
	 if (!$handle = fopen($file_path, 'w')) {
	 		echo "Cannot open file $file_path";
			exit;
	 }
  		 	
	 if (fwrite($handle, $file_data) === FALSE) {
	 	echo "Cannot write to file $file_path";
	 	exit;
	 }
   		
	 fclose($handle);
		

}




?>