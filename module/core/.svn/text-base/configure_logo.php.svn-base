<?php

/**
 * @author Jaimie
 * @copyright 2007
 */

$core->verifyAdmin(SUPER_USER);

$error = false;
$errorMsg = '';
$max_size = 200000;
$max_height = 350;
$max_width = 350;

$smarty->assign('max_size',$max_size);
$smarty->assign('max_height',$max_height);
$smarty->Assign('max_width',$max_width);
	

if(isset($_POST['submit'])){
	
	$info = getimagesize($_FILES['logo']['tmp_name']);

	//check file-size (in bytes):	
	if(($_FILES['logo']['size'] > $_POST['MAX_FILE_SIZE']) || ($_FILES['logo']['size'] > $max_size)) {
		$error = true;
    	$errorMsg .= "Error: Upload file size too large: (" . $_FILES['logo']['size'] . "). Must not exceed ".$max_size."kb.";
	}
	
	//check the extension.
     $array = explode(".", $_FILES['logo']['name']); 
     $nr    = count($array); 
     $ext  = $array[$nr-1];
     if(($ext !="jpg") && ($ext !="jpeg")){ 
     	$error = true;
	    $errorMsg .= "Error: file extension un-recognized. Be sure your image follows the correct extension (.jpg or .jpeg)";
	 }
	
	//CHECK TYPE: (what the browser sent)
	if(($_FILES['logo']['type'] != "image/jpeg") && ($_FILES['logo']['type'] != "image/pjpeg")) {
		$error = true;
		$errorMsg .="Error: Upload file type un-recognized. Only .JPG  images allowed.";
	}
	
	//DOUBLE CHECK TYPE: if image MIME type from GD getimagesize() -In case it was a FAKE!							
	if(($info['mime'] != "image/jpeg") && ($info['mime'] != "image/pjpeg")) {
		$error = true;
		$errorMsg .= "Error: Upload file type un-recognized mime info falied. Only .JPG images allowed.";
	}

	//check file size (length & width)
	if(($info[0] > $max_width) || ($info[1] >$max_height)) {
		$error = true;
	    $errorMsg .= "Error: Image size error (<b>" . $info[0] . "</b> x <b>" . $info[1] . "</b>). Must not exceed ". $max_height . " x ". $max_width .".";
	}
	
	// If Error 
	if($error){
		$smarty->assign('error',$error);
		$smarty->assign('errorMsg', $errorMsg);
		$smarty->display('core/configure_logo.tpl');		
	} else {
		//rename file, move it to location.
		if(is_uploaded_file($_FILES['logo']['tmp_name'])) {		
		  if(move_uploaded_file($_FILES['logo']['tmp_name'] , ROOT_PATH."/images/logo.jpg")) {
			  $core->save_config_value('COMPANY_LOGO', "logo.jpg");
			  $core->write_config();	
			  $core->force_page(ROOT_URL.'/index.php?page=core:configure_logo');
		   }
		}
	}
		
	
} else {
	
	
	$smarty->display('core/configure_logo.tpl');
}

?>