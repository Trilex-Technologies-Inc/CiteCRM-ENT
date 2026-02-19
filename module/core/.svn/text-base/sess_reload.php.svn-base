<?php
$core->verifyAdmin();

$session_id =  session_id();

$q = "SELECT * FROM sessions WHERE sesskey = " . $db->qstr($session_id);

$rs = $db->Execute($q);

$cur_expire = $rs->fields['expiry'];

$new_expire = $currentTimeoutInSecs + $cur_expire;

$q = "UPDATE sessions SET expiry = " . $db->qstr($new_expire) ." WHERE sesskey = " . $db->qstr($session_id);

$rs = $db->Execute($q);


?>