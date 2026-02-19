<!-- ajax_load_support_calls.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Account Calls</span></td>
		<td align="right"><a href="javascript:start_call('Support');">Record New Call</a></td>	
	</tr>
</table>

	<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
		<tr>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'support_call_enter_by'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_calls('Support','support_call_enter_by','ASC','{$next}')" style="cursor:pointer">Created BY</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_calls('Support','support_call_enter_by','DESC','{$next}')" style="cursor:pointer">Created BY</span>
				{/if}	
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'support_call_start'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_calls('Support','support_call_start','ASC','{$next}')" style="cursor:pointer">Start</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_calls('Support','support_call_start','DESC','{$next}')" style="cursor:pointer">Start</span>
				{/if}
			</td>
			<td class="productListing-heading">Minutes</td>
			<td class="productListing-heading">Billed</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'support_call_notes'}
					<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_calls('Support','support_call_notes','ASC','{$next}')" style="cursor:pointer">Notes</span>
				{else}
					<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_calls('Support','support_call_notes','DESC','{$next}')" style="cursor:pointer">Notes</span>
				{/if}			
			</td>
			
		</tr>
		{foreach from=$support_call_array item=call}
		<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="view_call('{$call->get_support_call_id()}')">
			<td class="productListing-data" {if $field == 'support_call_enter_by'} style="background-color: #ECECEC;"{/if}>{$call->get_support_call_enter_by()|display_names}</td>
			<td class="productListing-data" {if $field == 'support_call_start'} style="background-color: #ECECEC;"{/if}>{$call->get_support_call_start()|date_format:$DATE_TIME_FORMAT}</td>
			<td class="productListing-data">{$call->get_support_call_num_min()}</td>
			<td class="productListing-data">
				{if $call->get_support_calls_billing_rate() > 0}
					${$call->get_billed_amount()|string_format:"%.2f"} @ ${$call->get_support_calls_billing_rate()|string_format:"%.2f"} per min
				{else}
					N/A
				{/if}
			
			</td>
			<td class="productListing-data" >{$call->get_support_call_notes()|truncate:80:"..."}</td>
		</tr>
		{foreachelse}
		<tr>
			<td class="productListing-data" colspan="9">No Calls</td>
		</tr>
		{/foreach}
		<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_company_calls('Support','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_company_calls('Support','{$field}','{$sort}','{paginate_prev id="support_calls"}');">Prev</a> |

							<a href="javascript:load_company_calls('Support','{$field}','{$sort}','{paginate_next id="support_calls"}');" >Next</a> |
							<a href="javascript:load_company_calls('Support','{$field}','{$sort}','{paginate_last id="support_calls}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
