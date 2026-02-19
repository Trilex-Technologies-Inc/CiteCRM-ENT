<!-- ajax_edit_description.tpl -->
<table cellpadding="5" cellspacing="5" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle" nowrap="true">Product Name</td>
        <td class="fieldValue"><input type="text" name="product_name" id="product_name" value="{$product_descriptionObj->get_product_name()}" size="60"></td>
    </tr><tr>
        <td class="formAreaTitle" colspan="2">Description</td>
    </tr><tr>
        <td class="fieldValue" colspan="2"><textarea id="product_description" cols="15" rows="15">{$product_descriptionObj->get_product_description()}</textarea></td>
    </tr><tr>
        <td class="formAreaTitle">Product URL</td>
        <td class="fieldValue"><input type="text" id="product_url" value="{$product_descriptionObj->get_product_url()}" size="60"></td>
    </tr><tr>
         <td class="fieldValue" colspan="2">
            <input type="hidden" id="product_description_id" value="{$product_descriptionObj->get_product_description_id()}">
            <input type="button" id="submit" value="Save" onclick="update_description()">
            <input type="button" id="cancel" value="Cancel" onclick="load_activity('Description')">
        </td>
    </tr>
</table>