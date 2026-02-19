<?php
$core->verifyAdmin(CAN_READ);
require(CLASS_PATH.'/core/workorder.class.php');

$workorderObj = new workorder();

$workorder_id = $_REQUEST['workorder_id'];
$edit_scope = $_REQUEST['edit_scope'];


if(isset($_POST['submit'])) {
	
	$workorder_scope = $core->prepare_post($_POST['workorder_scope']);	

	$workorderObj->update_scope($workorder_id,$workorder_scope);

} else {
	$workorderObj->load_scope($workorder_id);
    $is_active = $workorderObj->is_active($workorder_id);

	if($edit_scope) {
		print "<input type=\"text\" name=\"workorder_scope\" id=\"workorder_scope\" value=\"".$core->prepare_edit($workorderObj->get_workorder_scope())."\" size=\"60\"><br>";
		print "<input type=\"button\" name=\"save\" value=\"Save\" onclick=\"update_scope()\">";
	} else {
		print "<table width=\"100%\" class=\"small\">
                <tr>
                    <td>".$workorderObj->get_workorder_scope()."</td>
                    <td valign=\"bottom\" align=\"right\" width=\"25\">";
                    if($is_active){
                        print "<a href=\"javascript:edit_scope()\">Edit</a>";
                    }
        print "</td>
                </tr>
            </table>";
	}
}
?>