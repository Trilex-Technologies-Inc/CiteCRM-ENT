<!-- view_module -->
{include file="core/header.tpl"}

<script language="javascript" type="text/javascript">
{literal}
function delete_module() {
	
	var answer = confirm ('Are you sure you want to Delete This Module?');
	
	if(answer){
		 window.location='index.php?page=module:delete_module&module_id={/literal}{$module->get_module_id()}{literal}';
	}
	
}
{/literal}
</script>


<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td><span class="greetUser">{$translate_text_view_module}  {$module->get_module_translate_name()}</span></td>
		<td align="right">
			<a href="{$from}"><img src="images/icons/back_16.gif" alt="back" border="0"></a>
			<a href="index.php?page=translate:view_translate&module_id={$module->get_module_id()}"><img src="images/icons/lgicn_16.gif" border="0" alt="Translation"></a>
			<a href="index.php?page=module:update_module&module_id={$module->get_module_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
			<img src="images/icons/del_16.gif" border="0" alt="Delete" onclick="delete_module()">
		</td>
	</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="0" class="formArea">
	<tr>
		<td class="formAreaTitle">{$translate_field_module_translate_name}</td>
		<td class="fieldValue">{$module->get_module_translate_name()}</td>
	</tr><tr>
		<td class="formAreaTitle">{$translate_field_module_name}</td>
		<td class="fieldValue">{$module->get_module_name()}</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">{$translate_field_module_admin_menu}</td>
		<td class="fieldValue">{$module->get_module_admin_menu()|yesno}</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">{$translate_field_module_user_menu}</td>
		<td class="fieldValue">{$module->get_module_user_menu()|yesno}</td>
	</tr><tr>
		<td class="formAreaTitle" nowrap="true">{$translate_field_module_public_menu}</td>
		<td class="fieldValue">{$module->get_module_public_menu()|yesno}</td>
	</tr><tr>
		<td class="fieldValue" colspan="2">
		
			<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td><span class="greetUser">{$translate_text_methods}</span></td>
					<td align="right">
						<a href="index.php?page=module_method:new_module_method&module_id={$module->get_module_id()}"><img src="images/icons/add_16.gif" alt="New Method" border="0"></a>
						</td>
				</tr>
			</table>
		
			{* Load the methods for smarty *}
			{assign var=module_method_array value=$module_method->load_methods_for_module($module->get_module_id())}
		
			<table cellpadding="5" cellspacing="5" class="formArea" width="100%">
			
			{* Loop through each method *}
			{foreach from=$module_method_array item=module_method}
			
				{* Load Page Setup *}
				{$page_setup->view_page_setup_by_name($module_method->get_module_method_name())}
				
				<tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_module_method_translate}</td>
					<td class="fieldValue">{$module_method->get_module_method_translate()}</td>
					<td class="fieldValue" align="right">
						<a href="index.php?page=module_method:update_module_method&module_method_id={$module_method->get_module_method_id()}"><img src="images/icons/edit_16.gif" border="0" alt="Edit"></a>
						<a href="index.php?page=module_method:delete_module_method&module_method_id={$module_method->get_module_method_id()}"><img src="images/icons/del_16.gif" border="0" alt="Delete"></a>
					</td>
				</tr><tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_module_method_name}</td>
					<td class="fieldValue" colspan="2">{$module_method->get_module_method_name()}</td>
				</tr><tr>
					<td class="formAreaTitle" colspan="3"><span class="greetUser">{$translate_text_menu}</span></td>
				</tr><tr>
					<td class="formAreaTitle" align="left">{$translate_text_admin}</td>
					<td class="formAreaTitle" align="center">{$translate_text_user}</td>
					<td class="formAreaTitle" align="right">{$translate_text_public}</td>
				</tr><tr>
					<td class="fieldValue" align="left">{$module_method->get_module_method_admin_menu()|yesno}</td>
					<td class="fieldValue" align="center">{$module_method->get_module_method_user_menu()|yesno}</td>
					<td class="fieldValue" align="right">{$module_method->get_module_method_public_menu()|yesno}</td>
				</tr><tr>
					<td class="formAreaTitle" colspan="3"><span class="greetUser">{$translate_text_page_setup}</span></td>
				</tr><tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_page_setup_page_title}</td>
					<td class="fieldValue" colspan="2">{$page_setup->get_page_setup_page_title()}</td>
				</tr><tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_page_setup_description}</td>
					<td class="fieldValue" colspan="2">{$page_setup->get_page_setup_description()}</td>
				</tr><tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_page_setup_keywords}</td>
					<td class="fieldValue" colspan="2">{$page_setup->get_page_setup_keywords()}</td>
				</tr><tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_page_setup_active}</td>
					<td class="fieldValue" colspan="2">{$page_setup->get_page_setup_active()|yesno}</td>
				</tr><tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_page_views}</td>
					<td class="fieldValue" colspan="2">{$page_setup->get_page_views()}</td>
				</tr><tr>
					<td class="formAreaTitle" nowrap="true">{$translate_field_last_modified}</td>
					<td class="fieldValue" colspan="2">{$module_method->get_last_modified()}</td>
				</tr><tr>
					<td colspan="3" height="3"></td>
				</tr><tr>
					<td colspan="3"><hr></td>
				</tr><tr>
					<td colspan="3" height="3"></td>
				</tr>
				
			{foreachelse}
				<tr>
					<td class="formAreaTitle" colspan="3">{$translate_text_no_methods_defined}</td>
				</tr>
			{/foreach}
			
			</table>
		
		</td>
	</tr>
</table>


{include file="core/footer.tpl"}