<?php

$core->verifyAdmin();

require(CLASS_PATH."/core/install.class.php");

$install = new Install();

if(!empty($_REQUEST['submit'])) {
	


	$install->build_package($_REQUEST);
	
	

	
} else {
	
	

	$smarty->display("install/build_package.tpl");
}

?>