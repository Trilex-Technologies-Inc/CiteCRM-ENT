<!-- adminNewAddressFrm -->
{include file="core/header.tpl"}
<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>

<script language="javascript" src="java/util.js" type="text/javascript"></script>

{if $errorOccurred}
<table cellpadding="3" cellspacing="1" width="400" border="0" class="infoBoxNotice">
	<tr>
		<td class="infoBoxNoticeContents">
{/if}

{validate field="address_type"  			criteria="notEmpty"	message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_address_type</span><br>"}
{validate field="address_street"  		criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_address_street</span><br>"}
{validate field="address_city"  			criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_address_city</span><br>"}
{validate field="address_state"  		criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_address_state</span><br>"}
{validate field="address_postal_code" criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_address_postal_code</span><br>"}
{validate field="address_country"  	criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_address_country</span><br>"}

{if $errorOccurred}
		</td>
	</tr>
</table>
<br>
{/if}

<form method ="POST" action="/index.php?page=user_address:admin_new_user_address" id="new_user_frm">
		
<span class="greetUser">{$translate_field_address}</span>
	
<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_address_type}</td>
		<td class="fieldValue">{html_select_address_type}</td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_address_country}</td>
		<td class="fieldValue">{html_select_country name="address_country"   state_div_id="state" state_name="address_state" code_only=false value=$address_country}</td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_address_street}</td>
		<td class="fieldValue"><input type="text" name="address_street" size="20" value="{$address_street}"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_address_street_2}</td>
		<td class="fieldValue"><input type="text" name="address_street_2" size="20" value="{$address_street_2}"></td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_address_city}</td>
		<td class="fieldValue"><input type="text" name="address_city" size="20" value="{$address_city}"></td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_address_state}</td>
		<td class="fieldValue"><div id="state">{html_select_state name=address_state country_id=$address_country value=$address_state}</div></td>
	</tr><tr>
		<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_field_address_postal_code}</td>
		<td class="fieldValue"><input type="text" name="address_postal_code" size="20" value="{$address_postal_code}"></td>
	</tr><tr>
		<td colspan="2">
			<input type="hidden" name="user_id" value="{$user_id}">
			<input type="submit" name="submit" value="{$translate_button_submit}">
		</td>
	</tr>
</table>
	
</form>

{include file="core/footer.tpl"}