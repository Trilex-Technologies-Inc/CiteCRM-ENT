<!-- ajax_load_employee_permisions.tpl -->
<table class="small" cellpadding="0" cellspacing="0" >
	<tr>
		<td>
			<table class="small" cellpadding="3" cellspacing="0">
				<tr>
					<td><strong nowrap>Can Read</strong></td>
					<td nowrap><input type="checkbox" name="CAN_READ" id="CAN_READ" value="1" {if $userObj->get_user_perms() >= 1} checked{/if}></td>
					<td nowrap ><em>Bit value 1</em></td>
				</tr><tr>
					<td nowrap><strong>Can Print</strong></td>
					<td nowrap ><input type="checkbox" name="CAN_PRINT" id="CAN_PRINT" value="2"value="" {if $userObj->get_user_perms() >= 2} checked{/if}></td>
					<td nowrap><em>Bit value 2</em></td>
				</tr><tr>
					<td nowrap><strong>Can Create</strong></td>
					<td nowrap><input type="checkbox" name="CAN_CREATE" id="CAN_CREATE" value="4" {if $userObj->get_user_perms() >= 4} checked{/if}></td>
					<td nowrap><em>Bit value 4</em></td>
				</tr><tr>
					<td nowrapnowrap><strong>Can Edit</strong></td>
					<td nowrap><input type="checkbox" name="CAN_EDIT" id="CAN_EDIT" value="8" {if $userObj->get_user_perms() >= 8} checked{/if}></td>
					<td nowrap><em>Bit value 8</em></td>
				</tr>
			</table>
		</td>
		<td width="10"><br></td>
		<td>
			<table class="small" cellpadding="3" cellspacing="0">
				<tr>		
					<td nowrap><strong>Can Delete</strong></td>
					<td nowrap><input type="checkbox" name="CAN_DELETE" id="CAN_DELETE" value="16" {if $userObj->get_user_perms() >= 16} checked{/if}></td>
					<td nowrap><em>Bit value 16</em></td>
				</tr><tr>
					<td nowrap><strong>Can Read Others</strong></td>
					<td nowrap><input type="checkbox" name="CAN_READ_OTHERS" id="CAN_READ_OTHERS" value="32" {if $userObj->get_user_perms() >= 32} checked{/if}></td>
					<td nowrap><em>Bit value 32</em></td>
				</tr><tr>
					<td nowrap><strong>Can Edit Others</strong></td>
					<td nowrap><input type="checkbox" name="CAN_EDIT_OTHER" id="CAN_EDIT_OTHER" value="64" {if $userObj->get_user_perms() >= 64} checked{/if}></td>
					<td nowrap><em>Bit value 64</em></td>
				</tr><tr>
					<td nowrap><strong>Full Admin</strong></td>
					<td nowrap><input type="checkbox" name="SUPER_USER" id="SUPER_USER" value="128" {if $userObj->get_user_perms() >= 128} checked{/if}></td>
					<td nowrap><em>Bit value 128</em></td>
				</tr>
			</table>
		</td>
		<td width="10"><br></td>
		<td valign="top">Cite CRM uses bitwise operators for permisions levels. The higher the bit value the more permisions a user has. If you give a user a permision value of 128 that user will have all permisions of the bit value 128 and under.</td>
	</tr><tr>
		<td colspan="3"><input type="button" name="save" value="Save" onclick="save('perms')"></td>
	</tr>
</table>