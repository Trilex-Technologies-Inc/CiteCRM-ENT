<!-- Right Side -->
<table border="0"  cellspacing="0" cellpadding="2">
	<tr>
		<td>
	{if $SESSION_ADMIN !=1}	

			{if $SESSION_USER_ID > 0}

				{display_box_top title=$translate_text_your_account}
					<div style='height:5px; line-height:5px; background: url(images/theme/m_price.jpg) center repeat-x;'></div>
					<a style='color:#737373;text-decoration:none' href="{$ROOT_URL}/index.php?page=user:view_user"><img src='images/theme/b-1.gif' align='absmiddle' border=0 hspace='5'  vspace='0'>{$translate_text_view_account}</a><br>

					
					<div style='height:5px; line-height:5px; background: url(images/theme/m_price.jpg) center repeat-x;'></div>
					<a style='color:#737373;text-decoration:none' href="{$ROOT_URL}/index.php?page=user:user_change_password"><img src='images/theme/b-1.gif' align='absmiddle' border=0 hspace='5'  vspace='0'>{$translate_text_change_password}</a><br>
					
					<div style='height:5px; line-height:5px; background: url(images/theme/m_price.jpg) center repeat-x;'></div>
					<a style='color:#737373;text-decoration:none' href="{$ROOT_URL}/index.php?page=user:user_change_email"><img src='images/theme/b-1.gif' align='absmiddle' border=0 hspace='5'  vspace='0'>{$translate_text_change_email}</a><br>


					{* Systems Links *}
					<div style='height:5px; line-height:5px; background: url(images/theme/m_price.jpg) center repeat-x;'></div>
					<a style='color:#737373;text-decoration:none' href="{$ROOT_URL}/index.php?page=system:user_view_systems"><img src='images/theme/b-1.gif' align='absmiddle' border=0 hspace='5'  vspace='0'>Systems</a>


					{* Workorder Links *}
					<div style='height:5px; line-height:5px; background: url(images/theme/m_price.jpg) center repeat-x;'></div>
					<a style='color:#737373;text-decoration:none' href="{$ROOT_URL}/index.php?page=workorder:user_view_workorders"><img src='images/theme/b-1.gif' align='absmiddle' border=0 hspace='5'  vspace='0'>Workorders</a>
					
					
					{* Log Off *}
					<div style='height:5px; line-height:5px; background: url(images/theme/m_price.jpg) center repeat-x;'></div>
					<a style='color:#737373;text-decoration:none' href="{$ROOT_URL}/index.php?page=user:login_user&logoff=true"><img src='images/theme/b-1.gif' align='absmiddle' border=0 hspace='5'  vspace='0'>{$translate_text_log_off}</a>

				

				{display_box_bottom	}
			

			{else}
				{display_box_top title=$translate_text_login}
				<form method ="POST" action="{$ROOT_URL}/index.php?page=user:login_user" id="user_login">
				
				<table cellpadding="2" cellspacing="2" class="formArea">
					<tr>
						<td class="formAreaTitle" nowrap>{$translate_field_email}</td>
						<td class="fieldValue"><input type="text" name="user_email" size="20" value="{$user_email}">
						</td>
					</tr><tr>
						<td class="formAreaTitle">{$translate_field_password}</td>
						<td class="fieldValue"><input type="password" name="user_password" size="20">
						</td>
					</tr><tr>
						<td colspan="2">
						<input type="hidden" name="from" value="{$CURRENT_PAGE}">
						<input type="submit" name="submit" value="{$translate_button_submit}"></td>
					</tr>
				</table>
				</form>
				<p align="center"><a href="index.php?page=user:add_user">{$translate_text_sign_up}</a> || <a href="index.php?page=user:user_lost_password">{$translate_text_lost_password}</a></p>
				{display_box_bottom	}

			{/if}
			
{/if}
	
		</td>
	</tr>
</table>