<!-- search_module_box.tpl -->
{display_box_top title="Search Modules"}

<form method="POST" action="index.php?page=module:admin_search_module">
<table cellpadding="3" cellspacing="0" class="formArea">
	<tr>
		<td class="small">Name</td>
		<td class="small"><input type="text" name="username"></td>
	</tr><tr>	
		<td colspan="2" class="small"><input type="submit" name="submit" value="Search"></td>
	</tr>
</table>
</form>

{display_box_bottom}