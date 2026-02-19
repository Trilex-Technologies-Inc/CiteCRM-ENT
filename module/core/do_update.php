<?php
$core->verifyAdmin();

print_r($_REQUEST);

$action = $_POST['action'];

switch($action) {

	case 'download':
		print "Please Wait Downloading File <img src=/images/theme/progressbar1.gif align=middle>";
		
	break;

	case 'backup':
		sleep(5);
	break;

}

?>