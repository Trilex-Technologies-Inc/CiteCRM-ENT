<!-- ajax_load_file.tpl-->
<table width="100%">
	<tr>
		<td><span class="greetUser">Files</span></td>
		<td align="right"><a href="javascript:add_file('Files');">Add File</a></td>	
	</tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'file_size'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_files('Files','file_size','ASC','{$next}')" style="cursor:pointer">{$translate_field_file_size}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_files('Files','file_size','DESC','{$next}')" style="cursor:pointer">{$translate_field_file_size}</span>
			{/if}
			
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'file_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_files('Files','file_name','ASC','{$next}')" style="cursor:pointer">{$translate_field_file_name}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_files('Files','file_name','DESC','{$next}')" style="cursor:pointer">{$translate_field_file_name}</span>
			{/if}
			
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'file_create_date'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_files('Files','file_create_date','ASC','{$next}')" style="cursor:pointer">{$translate_field_file_create_date}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_files('Files','file_create_date','DESC','{$next}')" style="cursor:pointer">{$translate_field_file_create_date}</span>
			{/if}
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'file_upload_by'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_files('Files','file_upload_by','ASC','{$next}')" style="cursor:pointer">{$translate_field_file_upload_by}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_files('Files','file_upload_by','DESC','{$next}')" style="cursor:pointer">{$translate_field_file_upload_by}</span>
			{/if}
			
		</td>
		<td class="productListing-heading">
			{if $sort == 'DESC' && $field == 'file_mime_type'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_files('Files','file_mime_type','ASC','{$next}')" style="cursor:pointer">{$translate_field_file_mime_type}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_files('Files','file_mime_type','DESC','{$next}')" style="cursor:pointer">{$translate_field_file_mime_type}</span>
			{/if}
		
		</td>
		<td class="productListing-heading"></td>
	</tr>
	{foreach from=$fileArray item=file}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'">
		<td class="productListing-data" {if $field == 'file_size'} style="background-color: #ECECEC;"{/if}>{$file->get_file_size()|format_mb}</td>
		<td class="productListing-data" {if $field == 'file_name'} style="background-color: #ECECEC;"{/if}>{$file->get_file_name()}</td>
		<td class="productListing-data" {if $field == 'file_create_date'} style="background-color: #ECECEC;"{/if}>{$file->get_file_create_date()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data" {if $field == 'file_upload_by'} style="background-color: #ECECEC;"{/if}>{$file->get_file_upload_by()|display_names}</td>
		<td class="productListing-data" {if $field == 'file_mime_type'} style="background-color: #ECECEC;"{/if}>{$file->get_file_mime_type()}</td>
		<td class="productListing-data"><a href="{$ROOT_URL}/index.php?page=file:get_file&file_id={$file->get_file_id()}"><img src="{$ROOT_URL}/images/icons/redo_16.gif" border="0"></a>&nbsp;
        <a href="javascript:delete_file({$file->get_file_id()})";"><img src="{$ROOT_URL}/images/icons/del_16.gif" border="0"></a>
            
        </td>
	</tr>
	{foreachelse}
	<tr>
		<td class="productListing-data" colspan="6">{$translate_text_no_results_found}</td>
	</tr>
	{/foreach}
	<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="6" > 
				<table width="100%">
					<tr>
						<td class="data" nowrap>
							{if $endItem > $total}
								Viewing {$startItem} - {$total} of {$total} Records
							{else}
								Viewing {$startItem} - {$endItem} of {$total} Records
							{/if}
							
						</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_files('Files','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_files('Files','{$field}','{$sort}','{paginate_prev id="files"}');">Prev</a> |

							<a href="javascript:load_files('Files','{$field}','{$sort}','{paginate_next id="files"}');" >Next</a> |
							<a href="javascript:load_files('Files','{$field}','{$sort}','{paginate_last id="files"}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
</table>
