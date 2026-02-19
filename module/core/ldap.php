<?php
ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);






$ldap_server = "192.168.0.25";
$auth_user = "Manager";
$auth_pass = "69hg34.5";

// Set the base dn to search the entire directory.

$base_dn = "DC=onsitepcs.net";

// Show only user persons
$filter = "(&(objectClass=account)(cn=*))";

// Enable to show only users
// $filter = "(&(objectClass=user)(cn=$*))";

// Enable to show everything
// $filter = "(cn=*)";



// connect to server

if (!($connect=ldap_connect($ldap_server))) {
     die("Could not connect to ldap server");
}

// bind to server

if (!($bind=ldap_bind($connect))) {
     die("Unable to bind to server");
}



if (!($search=ldap_search($connect, $base_dn, $filter))) {
     die("Unable to search ldap server");
}

$number_returned = ldap_count_entries($connect,$search);
$info = ldap_get_entries($connect, $search);

echo "The number of entries returned is ". $number_returned."<p>";

print "<pre>";
print_r($info);
print "</pre>";

foreach($info as $i){
	
	print "UID: " . $i['uid'][0] . "<br>";
	print "Shell: " . $i['loginshell'][0] . "<br>";
}



?>