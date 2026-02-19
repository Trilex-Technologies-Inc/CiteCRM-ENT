<!-- admin_update_user.tpl -->
{include file="core/header.tpl"}

<script language="javascript" src="java/ajaxCaller.js" type="text/javascript"></script>

<script language="javascript" src="java/util.js" type="text/javascript"></script>

<script language="javascript" src="java/loadState.js" type="text/javascript"></script>

{if $errorOccurred}
<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
	<tr>
		<td class="infoBoxNoticeContents">
{/if}

{validate field="user_first_name"		criteria="notEmpty" 									message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_first_name</span>"}
{validate field="user_last_name"			criteria="notEmpty"  									message="<br><img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_last_name</span>"}
{validate field="user_username"			criteria="isLength"  field2="6" field3="16" 	message="<br><img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_username</span>"}
{validate field="user_email"				criteria="isEmail"  									message="<br><img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_email</span>"}
{validate field="user_email"				criteria="isEqual" field2="user_email_2" 		message="<br><img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_email</span>"}

{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}


<table>
	<tr>
		<td valign="top">
			<!-- Form Contents -->
			<form method ="POST" action="index.php?page=user:admin_update_user" id="update_user_frm">
			
			<span class="greetUser">{$translate_update_personal_information} for {$user_id|display_names}</span>
			
			<table cellpadding="5" cellspacing="5" class="formArea" width="400">
				<tr>
					<td class="formAreaTitle" id="user_first_name"><span class="inputRequirement">*</span> {$translate_user_first_name}</td>
					<td class="fieldValue" ><input type="text" name="user_first_name" size="20" value="{$user->getUserFirstName()}" id="user_first_name"></td>
				</tr><tr>
					<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_user_last_name}</td>
					<td class="fieldValue"><input type="text" name="user_last_name" size="20" value="{$user->getUserLastName()}"></td>
				</tr><tr>
					<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_user_username}</td>
					<td class="fieldValue"><input type="text" name="user_username" size="20" value="{$user->getUserUsername()}"></td>
				</tr><tr>
					<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_user_email}</td>
					<td class="fieldValue"><input type="text" name="user_email" size="20" value="{$user->getUserEmail()}"></td>
				<tr><tr>
					<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_verify_email}</td>
					<td class="fieldValue"><input type="text" name="user_email_2" size="20" value="{$user->getUserEmail()}"></td>
				</tr><tr>
					<td class="formAreaTitle"><span class="inputRequirement">*</span> User Type</td>
					<td class="fieldValue">{html_select_user_type user_type="user_type_id" value=$user->getUserTypeID()}</td>
				</tr><tr>
					<td class="formAreaTitle"><span class="inputRequirement">*</span> Admin</td>
					<td class="fieldValue">{html_select_yesno fieldName="user_admin" value=$user->getUserAdmin()}</td>
				</tr><tr>
					<td class="formAreaTitle" colspan="2">
					<input type="hidden" name="user_id" value="{$user_id}">
					<input type="submit" name="submit" value="Update"></td>
				</tr>
				
			</table>
			
		</form>
	</td>
</tr>
</table>

{include file="core/footer.tpl"}