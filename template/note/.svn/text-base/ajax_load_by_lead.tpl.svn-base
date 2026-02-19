<!-- ajax_load_by_lead.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Notes</span></td>
        <td align="right"><a href="javascript:add_note('Notes');">New Note</a></td>	
	</tr>
</table>
        
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'note_text'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_notes('Notes','note_text','ASC','{$next}')" style="cursor:pointer">{$translate_field_note_text}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_notes('Notes','note_text','DESC','{$next}')" style="cursor:pointer">{$translate_field_note_text}</span>
			{/if}
			
		</td>
		<td class="productListing-heading" nowrap width="100">
			{if $sort == 'DESC' && $field == 'note_enter_by'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_notes('Notes','note_enter_by','ASC','{$next}')" style="cursor:pointer">{$translate_field_note_enter_by}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_notes('Notes','note_enter_by','DESC','{$next}')" style="cursor:pointer">{$translate_field_note_enter_by}</span>
			{/if}
		</td>
		<td class="productListing-heading" nowrap width="100">
			{if $sort == 'DESC' && $field == 'note_create_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_notes('Notes','note_create_date','ASC','{$next}')" style="cursor:pointer">{$translate_field_note_create_date}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_notes('Notes','note_create_date','DESC','{$next}')" style="cursor:pointer">{$translate_field_note_create_date}</span>
			{/if}
		</td>
	</tr>
	{foreach from=$noteArray item=note}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="javascript:edit_note('{$note->get_note_id()}')">
		<td class="productListing-data" {if $field == 'note_text'} style="background-color: #ECECEC;"{/if} >
            <img src="{$ROOT_URL}/images/icons/copy_16.gif" onMouseOver="ddrivetip('{$note->get_note_text()|truncate:100:'---' |escape:'javascript'}')" onMouseOut="hideddrivetip()" style="cursor:pointer" border="0"></a>
                {$note->get_note_subject()|truncate:150:'---'}
            </td>
		<td class="productListing-data" {if $field == 'note_enter_by'} style="background-color: #ECECEC;"{/if} nowrap valign="top">{$note->get_note_enter_by()|display_names}</td>
		<td class="productListing-data"{if $field == 'note_create_date'} style="background-color: #ECECEC;"{/if}   nowrap valign="top">{$note->get_note_create_date()|date_format:$DATE_TIME_FORMAT}</td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="3">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_notes('Notes','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_notes('Notes','{$field}','{$sort}','{paginate_prev id="note"}');">Prev</a> |

							<a href="javascript:load_notes('Notes','{$field}','{$sort}','{paginate_next id="note"}');" >Next</a> |
							<a href="javascript:load_notes('Notes','{$field}','{$sort}','{paginate_last id="note"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>