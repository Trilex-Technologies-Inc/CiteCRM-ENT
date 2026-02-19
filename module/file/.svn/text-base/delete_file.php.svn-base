<?php
/**
* Type:     Cite CMS PHP Page<br>
* Name:     delete_file.php<br>
* Purpose:  delete a Single Files row<br>
* 
* @author Cite CMS Module Developer
* @access Public
* @version 1.0
*/
$core->verifyAdmin(CAN_DELETE);



require(CLASS_PATH.'/core/file.class.php');

$fileObj = new file();

$file_id = $_POST['file_id'];

$fileObj->view_file($file_id);


$file_path = $fileObj->get_file_path();
if(is_file($file_path)){
	unlink($file_path);	
}

$fileObj->delete_file($file_id);


?>