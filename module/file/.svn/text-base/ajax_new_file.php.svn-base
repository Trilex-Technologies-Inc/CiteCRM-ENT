<?php
$core->verifyAdmin();

if(isset($_POST['submit'])) {

	require_once(CLASS_PATH."/core/file.class.php");

	$fileObj = new file();

	if (isset($_FILES['file']) == false OR $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE) {
		$errorMsg = "No file uploaded";
	}
	
	// No problems?
	if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
		$errorMsg = $_FILES['file']['error'];
	}




	if($errorMsg) {
		echo $errorMsg;
		die;
	} else {

		// Get next auto increament value forfile name
		$next_file_id = $fileObj->get_net_id();

		// Strip White space out of file name and replace with _
		$file_name = $next_file_id.'-';
		
		$file_name .= preg_replace('/\s\s+/','_',$_FILES['file']['name']);



		// Get file extension
		$ext = explode('.', $file_name);
		$extension = $ext[count($ext)-1];
	

		// Get file data
		$data = implode('', file($_FILES['file']['tmp_name']));
	
		// Pad javascript into file
		$file = "<?php echo(\"<script type='text/javascript'> window.location = ".ROOT_URL."'/index.php?page=error:403' </script>\"); ?>\n"; 

		// Re - encode file
		$file .= base64_encode($data);

		

		// New File path
		$newfile = FILE_SAVE_PATH .  $file_name.'.php';

		// Write File
		$f = fopen($newfile, 'w');
		fwrite($f, $file);
		fclose($f);
	
		
		$file_type			= $_POST['file_type'];
		$file_type_id		= $_POST['file_type_id'];
		$file_size			= $_FILES['file']["size"];	
		$file_name			= $_POST['file_name'];
		$file_description	= $_POST['file_description'];
		$file_ext			= $extension;
		$file_create_date	= time();
		$file_upload_by		= $_SESSION['SESSION_USER_ID'];
		$file_active		= '1';
		$file_mime_type		= $_FILES['file']['type'];
		$file_path			= $newfile;

		// Save file data
		$fileObj->add_file($file_type,$file_type_id,$file_size,$file_name,$file_ext,$file_create_date,$file_upload_by,$file_active,$file_mime_type,$file_path);

		if($file_type == 'company_id') {
			$core->force_page(ROOT_URL.'/index.php?page=company:view_company&company_id='.$file_type_id);
		}
		if($file_type == 'workorder_id') {
			$core->force_page(ROOT_URL.'/index.php?page=workorder:view_workorder&workorder_id='.$file_type_id);
		}
		if($file_type == 'user_id' and $_REQUEST['employee'] == '1') {
			$core->force_page(ROOT_URL.'/index.php?page=user:view_employee&user_id='.$file_type_id);	
		}
        if($file_type == 'user_id') {
            $core->force_page(ROOT_URL.'/index.php?page=user:my_home');
        }

		if($file_type == 'lead_id'){
			$core->force_page(ROOT_URL.'/index.php?page=leads:view_lead&lead_id='.$file_type_id);
		}
	
		

	}

} else {

	$max_file_size = (ini_get('upload_max_filesize') * 1024) * 1024;

	if($_REQUEST['employee'] == '1'){
		$smarty->assign('employee','1');
	}

	$smarty->assign('MAX_FILE_SIZE', $max_file_size);
	$smarty->assign('upload_max_filesize', ini_get('upload_max_filesize'));
	$smarty->assign('file_type', $_GET['file_type']);
	$smarty->assign('file_type_id',$_GET['file_type_id']);
	$smarty->display('file/ajax_new_file.tpl');

}


?>