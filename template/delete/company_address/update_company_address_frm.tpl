<!-- update_company_address_frm -->
{include file="core/header.tpl"}
<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>

<script language="javascript" src="java/util.js" type="text/javascript"></script>

<script language="javascript" src="java/loadState.js" type="text/javascript"></script>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Company Address for {$company_id|display_company_name}</span></td>
		<td align="right"><a href="/index.php?page=company:view_company&company_id={$company_id}"><img src="images/icons/back_16.gif" alt="back" border="0"></a></td>
	</tr>
</table>

<br>

{validate field="company_country" 		criteria="notEmpty" message="<br><span class='errorText'><img src='images/icons/flag_16.gif' border='0'> The field company_country Must not be empty</span>"}
{validate field="company_street_1" 	criteria="notEmpty" message="<br><span class='errorText'><img src='images/icons/flag_16.gif' border='0'> The field Street Must not be empty</span>"}
{validate field="company_city" 			criteria="notEmpty" message="<br><span class='errorText'><img src='images/icons/flag_16.gif' border='0'> The field City Must not be empty</span>"}
{validate field="company_state" 			criteria="notEmpty" message="<br><span class='errorText'><img src='images/icons/flag_16.gif' border='0'> The field State Must not be empty</span>"}
{validate field="company_postal_code" criteria="notEmpty" message="<br><span class='errorText'><img src='images/icons/flag_16.gif' border='0'> The field Postal Code Must not be empty</span>"}
<br>

<form method="post" action="index.php?page=company_address:update_company_address" id="add_company_address_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>	
		<td class="formAreaTitle">Address type</td>
		<td class="fieldValue">{html_select_address_type name="company_address_type" address_type=$company_address->get_company_address_type()}</td>
	</tr><tr>
		<td class="formAreaTitle">Country</td>
		<td class="fieldValue">{html_select_country name="company_country"  value=$company_address->get_company_country()  state_div_id="billing" state_name="company_state" code_only=false} </td>
	</tr><tr>
	
		<td class="formAreaTitle">Street</td>
		<td class="fieldValue"><input type="text" name="company_street_1" value="{$company_address->get_company_street_1()}" id="company_street_1"></td>
	</tr><tr>
		<td class="formAreaTitle">Street 2</td>
		<td class="fieldValue"><input type="text" name="company_street_2" value="{$company_address->get_company_street_2()}" id="company_street_2"></td>
	</tr><tr>
		<td class="formAreaTitle">City</td>
		<td class="fieldValue"><input type="text" name="company_city" value="{$company_address->get_company_city()}" id="company_city"></td>
	</tr><tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue"><div id="billing">{html_select_state name="company_state" country_id=$company_address->get_company_country() value=$company_address->get_company_state()}</div></td>
	</tr><tr>
		<td class="formAreaTitle">Postal Code</td>
		<td class="fieldValue"><input type="text" name="company_postal_code" value="{$company_address->get_company_postal_code()}" id="company_postal_code"></td>
	</tr><tr>
		<td colspan="8">
			<input type="hidden" name="company_id" value="{$company_id}" size="" id="company_id">
			<input type="hidden" name="company_address_id" value="{$company_address_id}">
			<input type="submit" name="submit" value="Submit">
		</td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
