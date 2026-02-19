<table cellpadding="0" cellspacing="0" class="box" width="100%" height="100%">
	<tr>
		<td>
			<div id="content">

				<div id="results">
				{foreach from=$company_address_array item=company_address}
				<table cellpadding="0" cellspacing="0" width="400" height="100%">
					<tr>
						<td><span class="greetUser">{$company_address->get_company_address_type()} Address</span></td>
						<td align="right">
							<a href="{$ROOT_URL}/index.php?page=company_address:add_company_address&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" alt="Add" align="middle"></a> 
							<a href="{$ROOT_URL}/index.php?page=company_address:update_company_address&company_address_id={$company_address->get_company_address_id()}&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" alt="delete" align="middle"></a>
							<a href="{$ROOT_URL}/index.php?page=company_address:delete_company_address&company_address_id={$company_address->get_company_address_id()}&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0" alt="Edit" align="middle"></a>
						</td>
					</tr>
				</table>
				<table cellpadding="5" cellspacing="5" class="formArea" width="400">
					<tr>
					</tr><tr>
						<td colspan="2" class="fieldValue">{$company_address->get_company_street_1()}</td>
					</tr><tr>
						<td colspan="2" class="fieldValue">{$company_address->get_company_street_2()}</td>
					</tr><tr>
						<td colspan="2" class="fieldValue">{$company_address->get_company_city()}, {$company_address->get_company_state()} {$company_address->get_company_postal_code()}<br>
						{$company_address->get_company_country()}</td>
					</tr><tr>
						<td class="formAreaTitle">Last Modified</td>
						<td class="fieldValue">{$company_address->get_last_modified()}</td>
				</table>
				<br>
				{foreachelse}
					<table cellpadding="0" cellspacing="0" width="400">
						<tr>
							<td><span class="greetUser">New Address</span></td>
							<td align="right"><a href="{$ROOT_URL}/index.php?page=company_address:add_company_address&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" alt="Add" align="middle"></a></td>
						</tr>
					</table>
				{/foreach}
				
				
				</div>
			</div>
		</td>
	</tr>
</table>