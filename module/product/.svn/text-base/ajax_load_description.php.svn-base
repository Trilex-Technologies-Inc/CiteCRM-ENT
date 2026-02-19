<?php

require_once(CLASS_PATH."/core/product_description.class.php");

$product_descriptionObj = new product_description();

$product_id = $_GET['product_id'];

$product_descriptionObj->load_by_product_id($product_id);

print "<table cellpadding=\"5\" cellspacing=\"0\" class=\"formArea\" width=\"400\">
	<tr>
		<td class=\"fieldValue\">".$product_descriptionObj->fields['product_description']."
        <br>
        <a href=\"javascript:edit_description()\">Edit</a></td>
    </tr>
</table>";

?>