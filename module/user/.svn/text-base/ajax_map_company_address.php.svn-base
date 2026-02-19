<?php

require_once(CLASS_PATH."/core/company_address.class.php");

$company_addressObj = new company_address();

$user_id = $_POST['user_id'];
$company_address_id = $_POST['company_address_id'];

$company_addressObj->clear_company_address_to_user($user_id);

$company_addressObj->add_company_address_to_user($user_id,$company_address_id);



?>