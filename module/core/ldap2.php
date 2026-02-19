<?php
require(CLASS_PATH."/core/ldap.class.php");

$ldap = new ldap("192.168.0.25","DC=onsitepcs.net",3);

$ldap->connect();

$obj_class = $_GET['obj_class'];

if(empty($obj_class)) {
	// nisMailAlias, account, ipHost, device, account
	print "Options for obj_class: nisMailAlias, account, ipHost, device, account ";	
	die;
}


$info = $ldap->search_object_class($obj_class, "*");

$count =  $ldap->entries_count();

print "There where $count records found</br>";

print "<pre>";
print_r($info);
print "</pre>";

?>