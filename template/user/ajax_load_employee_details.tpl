<!-- ajax_load_employee_details.tpl -->
<table>
	<tr>
		<td valign="top"	>
			<a href="javascript:edit_window('edit')">Edit</a> <span class="small">|</span> <a href="javascript:edit_window('reset_pwd')">Reset Password</a>
			<table cellpadding="3" cellspacing="0" class="small">
				<tr>
					<td><strong>User ID</strong></td>
					<td>{$userObj->getUserID()}</td>
				</tr><tr>
					<td ><strong>Name</strong></td>
					<td >{$userObj->getUserFirstName()} {$userObj->getUserLastName()}</td>
				</tr><tr>
					<td ><strong>User Type</strong></td>
					<td >{$userObj->getUserTypeID()|user_type}</td>
				</tr><tr>
					<td ><strong>Admin</strong></td>
					<td >{$userObj->getUserAdmin()|yesno}</td>
				</tr>
			</table>
			
		</td>
		<td width="15"><br></td>
		<td>
			<table cellpadding="3" cellspacing="0" class="small">
				<tr>
					<td ><strong>Email</strong></td>
					<td >{$userObj->getUserEmail()}</td>
				</tr><tr>
					<td valign="top"><strong>Status</strong></td>
					<td >
						{if $userObj->getUserStatus() == "Active"}
							{$userObj->getUserStatus()} <a href="javascript:delete_employee()">Suspend</a>
						{/if}
						
						{if $userObj->getUserStatus() == "Suspended"}
							<span style="color:red">{$userObj->getUserStatus()}</span> &nbsp;<a href="javascript:un_delete_employee()">Un-Suspend</a>
							<table  cellpadding="0" cellspacing="0" class="small">
								<tr>
									<td ><strong>Suspended By</strong></td>
									<td >{$suspended_by|display_names}</td>
								</tr><tr>
									<td ><strong>Date</strong></td>
									<td >{$suspension_date|date_format:"%Y-%m-%d"}</td>
								</tr><tr>
									<td colspan="2"><strong>Reason</strong></td>									
								</tr><tr>
									<td colspan="2">{$suspension_reason}</td>
								</tr>
							</table>
							
						{/if}
						
						{if $userObj->getUserStatus() == "Closed"}
							{$userObj->getUserStatus()} 
						{/if}
						
						{if $userObj->getUserStatus() == "Pending"}
							{$userObj->getUserStatus()} 
							<a href="{$ROOT_URL}/index.php?page=user:admin_activate_user&user_id={$userObj->getUserID()}&code={$userObj->getUserActivationCode()}">Activate User</a>
							<a href="{$ROOT_URL}/index.php?page=user:admin_new_activation_code&user_id={$userObj->getUserID()}">New Code</a>
						{/if}
						
					</td>
				</tr><tr>
					<td ><strong>User Created</strong></td>
					<td >{$userObj->getUserCreateDate()|date_format:"%Y-%m-%d"}</td>
				</tr><tr>
					<td ><strong>User Activated</strong></td>
					<td >
						{if $userObj->getUserActivationDate() != 0}
							{$userObj->getUserActivationDate()|date_format:"%Y-%m-%d"}
						{else}
							User Not Activated
						{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>