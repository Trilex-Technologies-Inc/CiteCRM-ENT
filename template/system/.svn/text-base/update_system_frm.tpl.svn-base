<!-- update_system_frm -->
{include file="core/header.tpl"}
<link rel="stylesheet" type="text/css" media="all" href="include/jscalendar/calendar-blue.css" title="win2k-1" />
<script type="text/javascript" src="include/jscalendar/calendar_stripped.js"></script>
<script type="text/javascript" src="include/jscalendar/lang/calendar-english.js"></script>
<script type="text/javascript" src="include/jscalendar/calendar-setup_stripped.js"></script>
<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>
<script language="javascript" src="java/util.js" type="text/javascript"></script>
<script language="javascript" src="java/loadState.js" type="text/javascript"></script>

{literal}
<script language="javascript" type="text/javascript" src="/include/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "specific_textareas",
		theme : "{/literal}{$TINY_MCE_THEME}{literal}",
		width : "100%"
	}); 

</script>
{/literal}

<table cellpadding="0" cellspacing="0">
	<tr>
		<td><span class="greetUser">Update System ID# {$system->get_system_id()}</span></td>
		<td align="right"></td>
	</tr>
</table>

<br>
{validate field="system_name" criteria="notEmpty" message="<br><span class='errorText'>Form Error: The field system_name Must not be empty</span>"}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=system:update_system" id="add_system_frm">

<table cellpadding="5" cellspacing="5" class="formArea">
	<tr>
		<td class="formAreaTitle">Company</td>
		<td class="fieldValue">{html_select_company value=$company->get_company_id() div="user"}</td>
	</tr><tr>
		<td class="formAreaTitle">User</td>
		<td class="fieldValue">
			<div id="user" name="user">
				{if $company->get_company_id() != ""}
					{html_select_company_users value=$user->getUserID() company_id=$company->get_company_id()}
				{else}
					{$user_id|display_names} <a href="">Assign to new User</a>
				{/if}
			</div>
		
		</td>
	</tr><tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="system_name" value="{$system->get_system_name()}" id="system_name"></td>
	</tr><tr>
		<td class="formAreaTitle">Serial Number</td>
		<td class="fieldValue"><input type="text" name="system_serial_num" value="{$system->get_system_serial_num()}" id="system_serial_num"></td>
	</tr><tr>
		<td class="formAreaTitle">Host Name</td>
		<td class="fieldValue"><input type="text" name="system_host_name" value="{$system->get_system_host_name()}" id="system_host_name"></td>
	</tr><tr>
		<td class="formAreaTitle">IP Address</td>
		<td class="fieldValue"><input type="text" name="system_ip_address" value="{$system->get_system_ip_address()}" id="system_system_ip_address"></td>
	</tr><tr>
		<td class="formAreaTitle">Manufacture</td>
		<td class="fieldValue">{html_select_system_manufacture value=$system->get_system_manufacture_id() div="model"}</td>
	</tr><tr>
		<td class="formAreaTitle">Model</td>
		<td class="fieldValue">
			<div id="model">{html_select_system_model value=$system->get_system_model_id() system_manufacture_id=$system->get_system_manufacture_id()}</div>
		</td>
	</tr><tr>
		<td class="formAreaTitle">Opreating System</td>
		<td class="fieldValue">
			{html_select_operating_system_manufacture value=$system->get_operating_system_manufacture_id() div="operating_system" }
		</td>
	</tr><tr>
		<td class="formAreaTitle">Operating System Version</td>
		<td class="fieldValue">
			<div id="operating_system" name="operating_system">
				{html_select_opreating_system value=$system->get_operating_system_id() operating_system_manufacture_id=$system->get_operating_system_manufacture_id()}
			</div>
		
		</td>
	</tr><tr>
		<td class="formAreaTitle">Purchase Date</td>
		<td class="fieldValue">
			<input type="text" name="system_purchase_date" value="{$system->get_system_purchase_date()|date_format:"%Y-%m-%d"}" id="system_purchase_date"  size="10">
			<input type="button" id="trigger_date" value="+">		
		{literal}
    			<script type="text/javascript">
				 	Calendar.setup(
						{
					 		inputField  : "system_purchase_date",
					 		ifFormat    : "%Y-%m-%d",
					 		button      : "trigger_date"
						}
				 	);
				</script>
			{/literal}	
			</td>
	</tr><tr>	
		<td class="formAreaTitle">Purchase Price</td>
		<td class="fieldValue"><input type="text" name="system_purchase_price" value="{$system->get_system_purchase_price()}" id="system_purchase_price" size="10">
	</tr><tr>
		<td class="formAreaTitle" valign="top" colspan="2">Waranty Text</td>
	</tr><tr>
		<td class="fieldValue" colspan="2">
			<textarea name="system_waranty_text" rows="15" cols="70" {if $TINY_MCE_EDIT == true} mce_editable="true"{/if}>{$system->get_system_waranty_text()}</textarea>
		</td>
	</tr><tr> 
		<td class="formAreaTitle">Waranty Expire Date</td>
		<td class="fieldValue">
			<input type="text" name="system_warenty_expire_date" value="{$system->get_system_warenty_expire_date()|date_format:"%Y-%m-%d"}" id="system_warenty_expire_date" size="10">
			<input type="button" id="trigger_date" value="+">
			{literal}
    			<script type="text/javascript">
				 	Calendar.setup(
						{
					 		inputField  : "system_warenty_expire_date",
					 		ifFormat    : "%Y-%m-%d",
					 		button      : "trigger_date"
						}
				 	);
				</script>
			{/literal}	
		</td>
	</tr><tr>
		<td class="formAreaTitle">Last Service</td>
		<td class="fieldValue">
			<input type="text" name="system_last_service" value="{$system->get_system_last_service()|date_format:"%Y-%m-%d"}" id="system_last_service" size="10">
			<input type="button" id="trigger_date" value="+">		
		{literal}
    			<script type="text/javascript">
				 	Calendar.setup(
						{
					 		inputField  : "system_last_service",
					 		ifFormat    : "%Y-%m-%d",
					 		button      : "trigger_date"
						}
				 	);
				</script>
			{/literal}	
		</td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{html_select_yesno name="system_active" value=$system->get_system_active() fieldName="system_active"}</td>
	</tr><tr>
		<td colspan="6">
		<input type="hidden" name="system_id" value="{$system_id}">
		<input type="submit" name="submit" value="Submit"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
