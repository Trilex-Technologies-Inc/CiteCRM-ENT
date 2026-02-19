<!-- ajax_view_workorder_notes -->
<table width="100%">
	<tr>
		<td><span class="greetUser"><span class="greetUser">Work Order Note</span></td>
		<td align="right"><a href="javascript:add_window('Notes');">Add Note</a></td>	
	</tr>
</table>


<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading" width="78" nowrap>
			{if $sort == 'DESC' && $field == 'workorder_note_create_by'}
				<img src="/images/icons/sort_desc.gif"><span onclick="load_window('Notes','workorder_note_create_by','ASC','{$next}')" style="cursor:pointer">Enterd By</span>
			{else}
				<img src="/images/icons/sort_asc.gif"> <span onclick="load_window('Notes','workorder_note_create_by','DESC','{$next}')" style="cursor:pointer">Enterd By</span>
			{/if}
			
		</td>
		<td class="productListing-heading" width="100%">Details</td>
		<td class="productListing-heading" width="25" nowrap>
			{if $sort == 'DESC' && $field == 'last_modified'}
				<img src="/images/icons/sort_desc.gif"> <span onclick="load_window('Notes','last_modified','ASC','{$next}')" style="cursor:pointer">Date</span>
			{else}
				<img src="/images/icons/sort_asc.gif"> <span onclick="load_window('Notes','last_modified','DESC','{$next}')" style="cursor:pointer">Date</span>
			{/if}
		</td>
		
	</tr>
	{foreach from=$workorder_note_array item=workorder_note}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" ondblclick="edit_workorder_note({$workorder_note->get_workorder_note_id()})">
		<td class="productListing-data" nowrap {if $field == 'workorder_note_create_by'} style="background-color: #ECECEC;"{/if}>{$workorder_note->get_workorder_note_create_by()|display_names}</td>
		<td class="productListing-data"><img src="images/icons/copy_16.gif" onMouseOver="ddrivetip('{$workorder_note->get_workorder_note_text()|escape:'javascript'}')" onMouseOut="hideddrivetip()" style="cursor:pointer" border="0">
            {$workorder_note->get_workorder_subject()}</td>
		<td class="productListing-data" nowrap {if $field == 'last_modified'} style="background-color: #ECECEC;"{/if}>{$workorder_note->get_last_modified()|date_format:$DATE_TIME_FORMAT}</td>
		
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="4">No notes</td>
	</tr>
	{/foreach}	
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="7"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_window('Notes','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_window('Notes','{$field}','{$sort}','{paginate_prev id="notes"}');">Prev</a> |

							<a href="javascript:load_window('Notes','{$field}','{$sort}','{paginate_next id="notes"}');">Next</a> |
							<a href="javascript:load_window('Notes','{$field}','{$sort}','{paginate_last id="notes"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>

