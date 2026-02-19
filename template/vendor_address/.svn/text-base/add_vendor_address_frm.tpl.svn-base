<!-- add_vendor_address_frm -->
{include file="core/header.tpl"}
<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>
<script language="javascript" src="java/util.js" type="text/javascript"></script>
<script language="javascript" src="java/loadState.js" type="text/javascript"></script>


<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record}</td>
		<td align="right"></td>
	</tr>
</table>

{if $errorOccurred}
<br>
<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
	<tr>
		<td class="infoBoxNoticeContents">
{/if}


{validate field="vendor_address_type" criteria="notEmpty"	message="<img src='images/icons/flag_16.gif'> <span class='errorText'>$translate_error_vendor_address_type</span><br>"}
{validate field="vendor_street_1" 		criteria="notEmpty"	message="<img src='images/icons/flag_16.gif'> <span class='errorText'>$translate_error_vendor_street_1</span><br>"}
{validate field="vendor_city" 			criteria="notEmpty"	message="<img src='images/icons/flag_16.gif'> <span class='errorText'>$translate_error_vendor_city</span><br>"}
{validate field="vendor_state_id" 		criteria="notEmpty"	message="<img src='images/icons/flag_16.gif'> <span class='errorText'>$translate_error_vendor_state_id</span><br>"}
{validate field="vendor_postal_code"	criteria="notEmpty" message="<img src='images/icons/flag_16.gif'> <span class='errorText'>$translate_error_vendor_postal_code</span><br>"}
{validate field="vendor_country_id" 	criteria="notEmpty"	message="<img src='images/icons/flag_16.gif'> <span class='errorText'>$translate_error_vendor_country_id</span><br>"}


{if $errorOccurred}
		</td>
	</tr>
</table>
<br>
{/if}

<form method="post" action="index.php?page=vendor_address:add_vendor_address" id="add_vendor_address_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_vendor_address_type}</td>
		<td class="fieldValue">{html_select_address_type name="vendor_address_type" address_type=$vendor_address_type }</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_country_id}</td>
		<td class="fieldValue">{html_select_country name="vendor_country_id"   state_div_id="state" state_name="vendor_state_id" code_only=false value="$vendor_country_id"}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_street_1}</td>
		<td class="fieldValue"><input type="text" name="vendor_street_1" value="{$vendor_street_1}" size="" id="vendor_street_1"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_street_2}</td>
		<td class="fieldValue"><input type="text" name="vendor_street_2" value="{$vendor_street_2}" size="" id="vendor_street_2"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_city}</td>
		<td class="fieldValue"><input type="text" name="vendor_city" value="{$vendor_city}" size="" id="vendor_city"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_state_id}</td>
		<td class="fieldValue"><div id="state">{html_select_state name="vendor_state_id" country_id=$country_id value=$vendor_state_id}</div></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_vendor_postal_code}</td>
		<td class="fieldValue"><input type="text" name="vendor_postal_code" value="{$vendor_postal_code}" size="" id="vendor_postal_code"></td>
	</tr><tr>
		<td colspan="9">
		<input type="hidden" name="vendor_id" value="{$vendor_id}" id="vendor_id">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
