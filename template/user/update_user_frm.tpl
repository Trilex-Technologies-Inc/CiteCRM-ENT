<!-- update user -->
{include file="core/header.tpl"}

{if $errorOccurred}
<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
	<tr>
		<td class="infoBoxNoticeContents">
{/if}
	
{validate field="user_first_name"	criteria="notEmpty" message="<img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_first_name</span>"}
{validate field="user_last_name"		criteria="notEmpty" message="<br><img src=\"images/icons/flag_16.gif\"> <span class=\"errorText\">$translate_error_user_last_name</span>"}

{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}

<form method ="POST" action="{$ROOT_URL}/index.php?page=user:update_user" id="new_user_frm">
			
	<span class="greetUser">{$translate_update_personal_information}</span>
	
	<table cellpadding="5" cellspacing="5" class="formArea" width="400">
		<tr>
			<td class="formAreaTitle">{$translate_user_first_name}</td>
			<td class="fieldValue"><input type="text" name="user_first_name" value="{$user->getUserFirstName()}"></td>
		</tr><tr>
			<td class="formAreaTitle">{$translate_user_last_name}</td>
			<td class="fieldValue"><input type="text" name="user_last_name" value="{$user->getUserLastName()}"></td>
		</tr>
			<td colspan="2"><input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</table>
	
</form>

{include file="core/footer.tpl"}
