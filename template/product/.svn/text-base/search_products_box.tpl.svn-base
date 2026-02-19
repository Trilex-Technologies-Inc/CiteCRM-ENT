<!-- search_products_box.tpl -->
{display_box_top title="Search Products"}

<body onLoad="document.forms[0].upcCode.focus();">

<form method="POST" action="index.php?page=product:admin_search_products">
	<table cellpadding="3" cellspacing="0" class="formArea">
		<tr>
			<td class="small">UPC</td>
			<td class="small"><input type="text" name="upcCode" id="upcCode" value="{$upcCode}"></td>
		</tr><tr>	
			<td class="small">Manufacture</td>
			<td class="small">{html_select_product_manufacture fieldName="manufacture_id" value=$manufacture_id}</td>
		</tr><tr>	
			<td class="small">Model</td>
			<td class="small"><input type="text" name="product_model" value="{$product_model}"></td>
		</tr><tr>
			<td class="small">Status</td>
			<td class="small">{html_select_product_status fieldName="product_status" value=$product_status}</td>
		</tr><tr>	
			<td class="small">Virtual</td>
			<td class="small">
				<select name="product_virtual">
					<option value="">Select One</option>
					<option value="0">No</option>
					<option value="1">Yes</option>
				</select>
			</td>
		</tr><tr>			
			<td colspan="2" class="small"><input type="submit" name="submit" value="Search"></td>
	</tr>
	</table>
	
</form>
{display_box_bottom}