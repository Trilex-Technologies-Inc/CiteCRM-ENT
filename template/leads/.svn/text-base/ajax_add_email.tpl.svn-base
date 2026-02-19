<!-- ajax_add_email.tpl -->


<div id="content">
<span class="greetUser">Email Lead</span>
{if $errorMsg}
	<br><span class="error">{$errorMsg}</span><br>
{/if}
<form method="post" action="{$ROOT_URL}/index.php?page=leads:add_activity">
<table cellpadding="5" cellspacing="0" class="formArea" width="600">
	<tr>
		<td class="formAreaTitle">Date</td>
		<td class="fieldValue">{$smarty.now|date_format:$DATE_TIME_FORMAT}</td>
	</tr><tr>
		<td class="formAreaTitle">To</td>
		<td class="fieldValue"><div id="selectBox">{html_select_lead_email lead_id=$lead_id} <input type="button" name="add" value="+" onclick="add_email_user()"></div> </td>
	</tr><tr>
		<td class="formAreaTitle">Subject</td>
		<td class="fieldValue"><input type="text" name="email_subject" id="email_subject" size="60"></td>
	</tr><tr>
		<td colspan="2" class="fieldValue"><textarea name="email_text" cols="60" rows="20" id="email_text"></textarea></td>
	</tr><tr>
		<td colspan="2" class="fieldValue">
			<input type="hidden" name="lead_id" id="lead_id" value="{$lead_id}">
			<input type="hidden" name="activity" value="Email" id="activity">
			<input type="submit" name="Submit" value="Send" id="submit" >
		</td>
	</tr>
</table>
</form>
<br>
</div>
