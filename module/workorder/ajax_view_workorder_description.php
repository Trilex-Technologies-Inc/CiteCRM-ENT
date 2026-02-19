<?php
$core->verifyAdmin(CAN_READ);

require(CLASS_PATH.'/core/workorder.class.php');

$workorderObj = new workorder();

$workorder_id = $_REQUEST['workorder_id'];
$edit_description = $_REQUEST['edit_description'];


if(isset($_POST['submit'])) {

	$workorder_desription = $core->prepare_post($_POST['workorder_desription']);

	$workorderObj->update_description($workorder_id,$workorder_desription);

} else {
	
	$workorderObj->load_description($workorder_id);
    $is_active = $workorderObj->is_active($workorder_id);

	if($edit_description) {
		print "<textarea name=\"workorder_desription\" id=\"workorder_desription\" rows=\"15\">" . $core->prepare_edit($workorderObj->get_workorder_desription()) ."</textarea><br>";
		print "<input type=\"button\" name=\"save\" value=\"Save\" onclick=\"update_description()\">";

	} else {
		print "<table width=\"100%\" class=\"small\">
                    <tr>
                        <td>" . $workorderObj->get_workorder_desription() . "</td>
                        <td valign=\"bottom\" align=\"right\" width=\"20\">";

                        if($is_active){
                            print "<a href=\"javascript:edit_description();\">Edit</a>";
                        }


         print "               </td>
                    </tr>
                </table>";
	}

}

?>