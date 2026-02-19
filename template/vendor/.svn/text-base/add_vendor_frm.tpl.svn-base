<!-- add_vendor_frm -->
{include file="core/header.tpl"}
<link rel="stylesheet" type="text/css" media="all" href="include/jscalendar/calendar-blue.css" title="win2k-1" />
<script type="text/javascript" src="include/jscalendar/calendar_stripped.js"></script>
<script type="text/javascript" src="include/jscalendar/lang/calendar-english.js"></script>
<script type="text/javascript" src="include/jscalendar/calendar-setup_stripped.js"></script>
<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>
<script language="javascript" src="java/util.js" type="text/javascript"></script>
<script language="javascript" src="java/loadState.js" type="text/javascript"></script>

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to_vendor}</td>
		<td align="right"></td>
	</tr>
</table>



{if $errorOccurred}
<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
	<tr>
		<td class="infoBoxNoticeContents">
{/if}

<br>

{validate field="vendor_street_1" 		criteria="notEmpty"	message="<br><span class='error'>Form Error: The field vendor_street_1 Must not be empty</span>"}
{validate field="vendor_city" 			criteria="notEmpty"	message="<br><span class='error'>Form Error: The field vendor_city Must not be empty</span>"}
{validate field="vendor_state_id" 		criteria="notEmpty"	message="<br><span class='error'>Form Error: The field vendor_state_id Must not be empty</span>"}
{validate field="vendor_postal_code" 	criteria="notEmpty"	message="<br><span class='error'>Form Error: The field vendor_postal_code Must not be empty</span>"}
{validate field="vendor_country_id" 	criteria="notEmpty"	message="<br><span class='error'>Form Error: The field vendor_country_id Must not be empty</span>"}
<br>

{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}

<form method="post" action="index.php?page=vendor:add_vendor" id="add_vendor_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="vendor_name" value="{$vendor_name}" size="" id="vendor_name"></td>
	</tr><tr>
		<td class="formAreaTitle">Website</td>
		<td class="fieldValue"><input type="text" name="vendor_website" value="{$vendor_website}" size="" id="vendor_website"></td>
	</tr><tr>
		<td class="formAreaTitle">Date Created</td>
		<td class="fieldValue">
			<input type="text" name="vendor_create_date" value="{$vendor_create_date}" size="10" id="vendor_create_date">
			<input type="button" id="trigger_date" value="+">
			{literal}
    			<script type="text/javascript">
				 	Calendar.setup(
						{
					 		inputField  : "vendor_create_date",
					 		ifFormat    : "%Y-%m-%d",
					 		button      : "trigger_date"
						}
				 	);
				</script>
			{/literal}
		</td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{html_select_yesno fieldName="vendor_active" value=$vendor_active}</td>
	</tr>
</table>

<br><br>

<span class="greetUser">Address</span>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Country</td>
		<td class="fieldValue">{html_select_country name="vendor_country_id"   state_div_id="state" state_name="vendor_state_id" code_only=false value="$vendor_country_id"}</td>
	</tr><tr>
		<td class="formAreaTitle">Street </td>
		<td class="fieldValue"><input type="text" name="vendor_street_1" value="{$vendor_street_1}" size="" id="vendor_street_1"></td>
	</tr><tr>
		<td class="formAreaTitle">Street Cont</td>
		<td class="fieldValue"><input type="text" name="vendor_street_2" value="{$vendor_street_2}" size="" id="vendor_street_2"></td>
	</tr><tr>
		<td class="formAreaTitle">City</td>
		<td class="fieldValue"><input type="text" name="vendor_city" value="{$vendor_city}" size="" id="vendor_city"></td>
	</tr><tr>
		<td class="formAreaTitle">State</td>
		<td class="fieldValue"><div id="state">{html_select_state name="vendor_state_id" country_id=$country_id value=$vendor_state_id}</div></td>
	</tr><tr>
		<td class="formAreaTitle">Postal Code</td>
		<td class="fieldValue"><input type="text" name="vendor_postal_code" value="{$vendor_postal_code}" size="" id="vendor_postal_code"></td>
	</tr>
</table>

<input type="hidden" name="vendor_address_type" value="Business" id="vendor_address_type">

<br><br>

<span class="greetUser">Contact</span>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Business Phone</td>
		<td class="fieldValue"><input type="text" name="vendor_contact_value" value="{$vendor_contact_value}" size="" id="vendor_contact_value"></td>
	</tr><tr>
		<td colspan="2">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

<input type="hidden" name="vendor_contact_type" value="Business Phone" id="vendor_contact_type">

</form>

{include file="core/footer.tpl"}
