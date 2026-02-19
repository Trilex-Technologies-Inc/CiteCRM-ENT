<!-- update_module_method_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">Update module_method ID# {$module_method->get_module_method_id()} {$module_method->get_module_method_name()}</span></td>
</tr>
</table>

<br>

<form method="POST" action="index.php?page=module_method:update_module_method" id="update_module_method_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Method Name</td>
		<td class="fieldValue">{$module_method->get_module_method_translate()}</td>
	</tr><tr>
		<td class="formAreaTitle">Method Location</td>
		<td class="fieldValue">{$module_method->get_module_method_name()}</td>
	</tr><tr>
		<td colspan="2">
			<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
				<tr>
					<td class="formAreaTitle" colspan="3"><span class="greetUser">Menu</span></td>
				</tr><tr>
					<td class="formAreaTitle">Admin</td>
					<td class="formAreaTitle">User</td>
					<td class="formAreaTitle">Public</td>
				</tr><tr>
					<td class="fieldValue">
						{html_select_yesno fieldName="module_method_admin_menu" value=$module_method->get_module_method_admin_menu()}
					</td>
					<td class="fieldValue">
						{html_select_yesno fieldName="module_method_user_menu" value=$module_method->get_module_method_user_menu()}
					</td>
					<td class="fieldValue">
						{html_select_yesno fieldName="module_method_public_menu" value=$module_method->get_module_method_public_menu()}
					</td>
				</tr><tr>
					<td colspan="3"><br></td>
				</tr><tr>
					<td class="formAreaTitle" colspan="3"><span class="greetUser">Page Setup</span></td>
				</tr><tr>
					<td class="formAreaTitle">Meta Title</td>
					<td class="fieldValue" colspan="2">
						<input type="text" name="page_setup_page_title" value="{$page_setup->get_page_setup_page_title()}" size="60">
					</td>
				</tr><tr>
					<td class="formAreaTitle" colspan="3">Meta Description</td>
				</tr><tr>
					<td class="fieldValue" colspan="3"><textarea name="page_setup_description">{$page_setup->get_page_setup_description()}</textarea></td>
				</tr><tr>
					<td  class="formAreaTitle" colspan="3">Meta Keywords</td>
				</tr><tr>
					<td class="fieldValue" colspan="3"><textarea name="page_setup_keywords">{$page_setup->get_page_setup_keywords()}</textarea></td>
				</tr><tr>
					<td class="formAreaTitle">Active</td>
					<td class="fieldValue" colspan="2">
						{html_select_yesno fieldName="page_setup_active" value=$page_setup->get_page_setup_active()}
					</td>
				</tr><tr>
					<td class="formAreaTitle">Page Views</td>
					<td class="fieldValue" colspan="2"><input type="text" name="page_views" value="{$page_setup->get_page_views()}" size="10"></td>
				</tr>
			</table>		
		</td>
</table>

<br>

<input type="hidden" name="page_setup_id" value="{$page_setup->get_page_setup_id()}">
<input type="hidden" name="module_method_id" value="{$module_method->get_module_method_id()}">
<input type="submit" name="submit" value="Submit">
	
</form>

{include file="core/footer.tpl"}
