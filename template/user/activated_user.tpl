<!-- activated_user -->
{include file="core/header.tpl"}

<span class="greetUser">Congratulations Your {$SITE_NAME} account is active</span>

<p>{$translate_please_login_in_to_view_your_account}</p>

{if $errorOccurred}
<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
	<tr>
		<td class="infoBoxNoticeContents">
{/if}

{validate field="user_email" 		criteria="isEmail"	message="<br><img src=\"images/icons/flag_16.gif\"><span class=\"errorText\">$translate_error_user_email</span>"}
{validate field="user_password" 	criteria="notEmpty"	message="<br><img src=\"images/icons/flag_16.gif\"><span class=\"errorText\">$translate_error_enter_your_password</span>"}

{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}

<span class="greetUser">{$translate_please_login}</span>

<form method ="POST" action="index.php?page=user:login_user" id="user_login">

	<table cellpadding="5" cellspacing="5" class="formArea" width="400">
		<tr>
			<td class="formAreaTitle" nowrap>{$translate_user_email}</td>
			<td class="fieldValue"><input type="text" name="user_email" size="20" value="{$user_email}"></td>
		</tr><tr>
			<td class="formAreaTitle">{$translate_user_password}</td>
			<td class="fieldValue"><input type="password" name="user_password" size="20"></td>
		</tr><tr>
			<td colspan="2"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
	
</form>

{include file="core/footer.tpl"}