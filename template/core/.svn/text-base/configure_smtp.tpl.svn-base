<!-- configure_smtp.tpl -->
{include file="core/header.tpl"}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Configure SMTP Mail Server</a></li>
</ul>
{if $error}
	<br>
	<span class="error">{$errorMsg}</span>
	<br>
{/if}
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
		
			<table cellpadding="3" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
					<form method="post" action="{$ROOT_URL}/index.php?page=core:configure_smtp">
						<table cellpadding="3" cellspacing="0" class="formArea" width="600">
							<tr>
								<td class="formAreaTitle">SMTP Server</td>
								<td class="fieldValue"><input type="text" name="smtp_server" id="smtp_server" value="{$smtp_server}" size="40"></td>	
							</tr><tr>
								<td class="formAreaTitle">SMTP User</td>
								<td class="fieldValue"><input type="text" name="smtp_user" id="smtp_user" value="{$smtp_user}" size="40"></td>
							</tr><tr>
								<td class="formAreaTitle">SMTP Password</td>
								<td class="fieldValue"><input type="text" name="smtp_password" id="smtp_password" value="{$smtp_password}" size="20"></td>
							</tr><tr>
								<td class="formAreaTitle">Email From Name</td>
								<td class="fieldValue"><input type="text" name="email_from" id="email_from" value="{$email_from}" size="20"></td>
							</tr><tr>
								<td class="formAreaTitle">Reply To</td>
								<td class="fieldValue"><input type="text" name="reply_to" id="reply_to" value="{$reply_to}" size="20"></td>
							</tr><tr>
								<td class="fieldValue" colspan="2"><input type="submit" name="submit" value="Save"></td>
							</tr>
						</table>
					</form>
					</td>
				</tr>
			</table>
			
		</td>
	</tr>
</table>

{include file="core/footer.tpl"}