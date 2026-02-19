<!-- editAddressFrm -->
{include file="core/header.tpl"}

<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>

<script language="javascript" src="java/util.js" type="text/javascript"></script>

<script language="javascript" src="java/loadState.js" type="text/javascript"></script>

			
<span class="greetUser">Edit Address</span>

<br>
{validate field="address_type"			criteria="notEmpty"  message="<br><span class=\"errorText\">Please Select An Address Type!</span>"}
{validate field="address_street"			criteria="notEmpty"  message="<br><span class=\"errorText\">Please Enter Your Address!</span>"}
{validate field="address_city"			criteria="notEmpty"  message="<br><span class=\"errorText\">Please Enter Your City!</span>"}
{validate field="address_state"			criteria="notEmpty"  message="<br><span class=\"errorText\">Please Enter Your State!</span>"}
{validate field="address_postal_code"	criteria="notEmpty"  message="<br><span class=\"errorText\">Please Enter Your Zip/Postal Code!</span>"}
{validate field="address_country"		criteria="notEmpty"  message="<br><span class=\"errorText\">Please Enter Your Country!</span>"}
<br>

<form method ="POST" action="/index.php?page=user_address:update_user_address" id="new_user_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> Address Type</td>
		<td class="fieldValue">{html_select_address_type address_type=$address->getAddressType()}</td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> Country</td>
		<td class="fieldValue">{html_select_country name="address_country" value=$address->getAddressCountry()  state_div_id="state" state_name="address_state" code_only=false}
	</td><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> Street</td>
		<td class="fieldValue"><input type="text" name="address_street" size="20" value="{$address->getAddressStreet()}"></td>
	</tr><tr>
		<td class="formAreaTitle">Street 2</td>
		<td class="fieldValue"><input type="text" name="address_street_2" size="20" value="{$address->getAddressStreet2()}"></td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> City</td>
		<td class="fieldValue"><input type="text" name="address_city" size="20" value="{$address->getAddressCity()}"></td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> State</td>
		<td class="fieldValue">{html_select_state name=address_state country_id=$address->getAddressCountry() value=$address->getAddressState()}</td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> Postal Code/Zip</td>
		<td class="fieldValue"><input type="text" name="address_postal_code" size="20" value="{$address->getAddressPostalCode()}"></td>
	</tr><tr>
		<td colspan="2">
			<input type="hidden" name="user_id" value="{$address->getUserID()}">
			<input type="hidden" name="address_id" value="{$address->getAddressID()}">
			<input type="submit" name="submit" value="Submit">
		</td>
	</tr>
</table>


{include file="core/footer.tpl"}