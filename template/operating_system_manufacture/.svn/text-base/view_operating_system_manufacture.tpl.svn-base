<!-- view_operating_system_manufacture -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">View operating_system_manufacture ID# {$operating_system_manufacture->get_operating_system_manufacture_id()}</span></td>
		<td align="right">
				<a href="{$ROOT_URL}/index.php?page=operating_system_manufacture:search_operating_system_manufacture"><img src="{$ROOT_URL}/images/icons/back_16.gif" alt="back" border="0"></a>
				<a href="{$ROOT_URL}index.php?page=operating_system_manufacture:update_operating_system_manufacture&operating_system_manufacture_id={$operating_system_manufacture->get_operating_system_manufacture_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="Edit"></a>
				<a href="{$ROOT_URL}index.php?page=operating_system_manufacture:delete_operating_system_manufacture&operating_system_manufacture_id={$operating_system_manufacture->get_operating_system_manufacture_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Delete"></a>
			</td>
</tr>
</table>

<br><br>

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">Operating System</td>
		<td class="fieldValue">{$operating_system_manufacture->get_operating_system_manufacture_name()}</td>
	</tr><tr>
		<td class="formAreaTitle">Web Site</td>
		<td class="fieldValue"><a href="{$operating_system_manufacture->get_operating_system_manufacture_website()}" target="new">{$operating_system_manufacture->get_operating_system_manufacture_website()}</a></td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{$operating_system_manufacture->get_operating_system_manufacture_active()|yesno}</td>
	</tr>
</table>

<br>

<a href="{$ROOT_URL}/?page=operating_system:add_operating_system&operating_system_manufacture_id={$operating_system_manufacture->get_operating_system_manufacture_id()}"><img src="images/icons/add_16.gif" alt="Add Operating System" border="0"></a>

</br>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">ID</td>
		<td class="productListing-heading">Operating System</td>
		<td class="productListing-heading">Version</td>
		<td class="productListing-heading">Active</td>
		<td class="productListing-heading">View</td>
	</tr>
	{foreach from=$operating_system_array item=operating_system}
	<tr>
		<td class="productListing-data">{$operating_system->get_operating_system_id()}</td>
		<td class="productListing-data">{$operating_system->get_operating_system_manufacture_id()|operating_system_manufacture_name}</td>
		<td class="productListing-data">{$operating_system->get_operating_system_name()}</td>
		<td class="productListing-data">{$operating_system->get_operating_system_active()|yesno}</td>
		<td class="productListing-data"><a href="index.php?page=operating_system:view_operating_system&operating_system_id={$operating_system->get_operating_system_id()}"><img src="images/icons/srch_16.gif" alt="View" border="0"></a></td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="5">No Results Found</td>
	</tr>
	{/foreach}
</table>

<br>

{include file="core/footer.tpl"}
