<?php
require(CLASS_PATH."/core/contact.class.php");

$auth = &new Auth($db, '/index.php?page=user:userLogin', 'secret');


$contact = new contact();
		
$contact->deleteContact($_REQUEST);
		
$core->force_page('/index.php?page=user:userView');




?>