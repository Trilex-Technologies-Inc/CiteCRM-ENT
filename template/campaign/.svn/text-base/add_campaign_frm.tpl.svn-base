<!-- add_campaign_frm -->
{include file="core/header.tpl"}

{literal}
<script language="javascript" type="text/javascript">


function add_new_type() {
	
	document.getElementById("addBox").innerHTML = "<input type=text name=campaign_type_text size=20><input type=hidden name=add_campaign_type value=1> <input type=button value=- onclick=load_type()>";
}

function load_type(){
	document.getElementById("addBox").innerHTML = "{/literal}{html_select_campaign_type|escape:'javascript'}{literal} <input type=button value=+ id=add_type onclick=add_new_type();>";
}
</script>
{/literal}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">{$translate_text_add_new_record_to} Campaign</td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="campaign_name" criteria="notEmpty" message="<img src=images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_campaign_name</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=campaign:add_campaign" id="add_campaign_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_name}</td>
		<td class="fieldValue"><input type="text" name="campaign_name" value="{$campaign_name}" size="" id="campaign_name"></td>
	</tr><tr>
		<td class="formAreaTitle">Campaign Type</td>
		<td class="fieldValue"><div id="addBox">{html_select_campaign_type value=$campaign_type_id} <input type="button" value="+" id="add_type" onclick="add_new_type();"></div></td>
	</tr><tr>
		<td class="formAreaTitle">Start Date</td>
		<td class="fieldValue">{html_select_date prefix="start" end_year="2030"}</td>
	</tr><tr>
		<td class="formAreaTitle">End Date</td>
		<td class="fieldValue">{html_select_date prefix="end" end_year="2030"}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_campaign_cost} $</td>
		<td class="fieldValue"><input type="text" name="campaign_cost" value="{$campaign_cost}" size="12" id="campaign_cost"></td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_campaign_active}</td>
		<td class="fieldValue">{html_select_yesno fieldName="campaign_active" value=$campaign_active|default:"1"}</td>
	</tr><tr>
		<td class="formAreaTitle" colspan="2">Description</td>
	</tr><tr>
		<td class="fieldValue" colspan="2"><textarea name="campaign_description" cols="60" rows="10">{$campaign_description}</textarea></td>
	</tr><tr>
		<td colspan="2"><input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
