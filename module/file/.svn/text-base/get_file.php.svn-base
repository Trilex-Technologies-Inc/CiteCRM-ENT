<?php
$core->verifyAdmin();

require_once(CLASS_PATH."/core/file.class.php");

$fileObj = new file();

$file_id = $_GET['file_id'];

$fileObj->view_file($file_id);

$file 		= $fileObj->get_file_path();

$filepath	= $fileObj->get_file_path();

if($fileObj->isReal_file($filepath)) {

	$type 		= $fileObj->get_ext($file);
	$file_name 	= $fileObj->get_real_file_name($file);
	$data		= $fileObj->re_pack($filepath);	

	// General download headers:
	header("Pragma: public"); // required
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false); // required for certain browsers 
	header("Content-Transfer-Encoding: binary");
	
	// Filetype header
	header("Content-Type: " . $type);
	
	// Filesize header
	header("Content-Length: " . strlen($data));
	
	// Filename header
	header("Content-Disposition: attachment; filename=\"" . $file_name . "\";" );
	
	// Send file data
	echo $data;

} else {

	echo "File Error";
}



?>