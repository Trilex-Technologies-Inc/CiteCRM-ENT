<!-- add_company_address_frm -->
{include file="core/header.tpl"}

<script language="javascript" src="{$ROOT_URL}/java/loadState.js" type="text/javascript"></script>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Add New Company Address</td>
		<td align="right"></td>
</tr>
</table>

<br><br>

<form method="post" action="{$ROOT_URL}/index.php?page=company_address:add_company_address" id="add_company_address_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Address type</td>
		<td class="fieldValue">{html_select_address_type name="company_address_type"}</td>
	</tr><tr>
		<td class="formAreaTitle">Country</td>
		<td class="fieldValue">{html_select_country name="company_country"  value=$company_country  state_div_id="billing" state_name="company_state" code_only=false} 
			{validate field="company_country" criteria="notEmpty" message="<br><span class='error'>Form Error: The field company_country Must not be empty</span>"}
		</td>
	</tr><tr>
		<td class="formAreaTitle">Street</td>
		<td class="fieldValue"><input type="text" name="company_street_1" value="{$company_street_1}" size="" id="company_street_1">
			{validate id="company_street_1" message="<br><span class='error'>Form Error: The field company_street_1 Must not be empty</span>"}
		</td>
	</tr><tr>
		<td class="formAreaTitle">Street 2</td>
		<td class="fieldValue"><input type="text" name="company_street_2" value="{$company_street_2}" size="" id="company_street_2">
		</td>
	</tr><tr>
		<td class="formAreaTitle">City</td>
		<td class="fieldValue"><input type="text" name="company_city" value="{$company_city}" size="" id="company_city">
			{validate id="company_city" message="<br><span class='error'>Form Error: The field company_city Must not be empty</span>"}
		</td>
	</tr><tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue"><div id="billing">{html_select_state name=$state_name country_id=$country_id value=$state_name	}</div></td>
	</tr><tr>
		<td class="formAreaTitle">Postal Code</td>
		<td class="fieldValue"><input type="text" name="company_postal_code" value="{$company_postal_code}" size="" id="company_postal_code">
			{validate id="company_postal_code" message="<br><span class='error'>Form Error: The field company_postal_code Must not be empty</span>"}
		</td>
	</tr><tr>
		<td colspan="8">
			<input type="hidden" name="company_id" value="{$company_id}" size="" id="company_id">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
