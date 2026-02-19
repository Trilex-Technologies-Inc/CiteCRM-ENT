<!-- newAddressFrm -->
{include file="core/header.tpl"}

<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>

<script language="javascript" src="java/util.js" type="text/javascript"></script>

<script language="javascript" src="java/loadState.js" type="text/javascript"></script>

			
<span class="greetUser">{$translate_address}</span>

<br>
{validate field="address_type"			criteria="notEmpty"  message="<br><span class=\"errorText\">$translate_error_address_type</span>"}
{validate field="address_street"			criteria="notEmpty"  message="<br><span class=\"errorText\">$translate_error_address_street</span>"}
{validate field="address_city"			criteria="notEmpty"  message="<br><span class=\"errorText\">$translate_error_address_city</span>"}
{validate field="address_state"			criteria="notEmpty"  message="<br><span class=\"errorText\">$translate_error_address_state</span>"}
{validate field="address_postal_code"	criteria="notEmpty"  message="<br><span class=\"errorText\">$translate_error_address_postal_code</span>"}
{validate field="address_country"		criteria="notEmpty"  message="<br><span class=\"errorText\">$translate_error_address_country</span>"}
<br>

<form method ="POST" action="/index.php?page=user_address:new_user_address" id="new_user_frm">


<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle"><span class="inputRequirement">* </span>{$translate_address_type}</td>
		<td class="fieldValue">{html_select_address_type address_type=$address_type}</td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">* </span>{$translate_address_country}</td>
		<td class="fieldValue">{html_select_country name="address_country"   state_div_id="state" state_name="address_state" code_only=false}
		</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">* </span>{$translate_address_street}</td>
		<td class="fieldValue"><input type="text" name="address_street" size="20" value="{$address_street}"></td>
	</tr><tr>
		<td class="formAreaTitle">Street 2</td>
		<td class="fieldValue"><input type="text" name="address_street_2" size="20" value="{$address_street_2}"></td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">* </span>{$translate_address_city}</td>
		<td class="fieldValue"><input type="text" name="address_city" size="20" value="{$address_city}"></td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">* </span>{$translate_address_state}</td>
		<td class="fieldValue">
			<div id="state">{html_select_state name=address_state country_id=$country_id value=$address_state}</div>				
		</td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">* </span>{$translate_address_postal_code}</td>
		<td class="fieldValue"><input type="text" name="address_postal_code" size="20" value="{$address_postal_code}"></td>
	</tr><tr>
		<td colspan="2">
		<input type="hidden" name="user_id" value="{$user_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>


{include file="core/footer.tpl"}