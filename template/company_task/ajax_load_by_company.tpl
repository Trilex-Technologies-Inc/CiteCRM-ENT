<!-- ajax_load_by_company.tpl -->
<table width="100%">
    <tr>
        <td><span class="greetUser">{$translate_text_company_tasks}</span></td>
        <td align="right"><a href="javascript:add_task()">{$translate_text_new_task}</a></td>
    </tr>
</table>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
    <tr>
        <td class="productListing-heading" width="80">
			{if $sort == 'DESC' && $field == 'company_task_priority'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_task('Task','company_task_priority','ASC','{$next}')" style="cursor:pointer">{$translate_field_company_task_priority}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_task('Task','company_task_priority','DESC','{$next}')" style="cursor:pointer">{$translate_field_company_task_priority}</span>
			{/if}
		</td>
        <td class="productListing-heading">
        	{if $sort == 'DESC' && $field == 'company_task_name'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_task('Task','company_task_name','ASC','{$next}')" style="cursor:pointer">{$translate_field_company_task_name}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_task('Task','company_task_name','DESC','{$next}')" style="cursor:pointer">{$translate_field_company_task_name}</span>
			{/if}
			
		</td>
        <td class="productListing-heading" width="100">
        	{if $sort == 'DESC' && $field == 'company_task_due'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_task('Task','company_task_due','ASC','{$next}')" style="cursor:pointer">{$translate_field_company_task_due}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_task('Task','company_task_due','DESC','{$next}')" style="cursor:pointer">{$translate_field_company_task_due}</span>
			{/if}			
		</td>
        <td class="productListing-heading" width="100">
        	{if $sort == 'DESC' && $field == 'company_task_category_id'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_task('Task','company_task_category_id','ASC','{$next}')" style="cursor:pointer">{$translate_field_company_task_category_id}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_task('Task','company_task_category_id','DESC','{$next}')" style="cursor:pointer">{$translate_field_company_task_category_id}</span>
			{/if}			
		</td>
        <td class="productListing-heading" width="100">
        	{if $sort == 'DESC' && $field == 'company_task_status'}
				<img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_company_task('Task','company_task_status','ASC','{$next}')" style="cursor:pointer">{$translate_field_company_task_status}</span>
			{else}
				<img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_company_task('Task','company_task_status','DESC','{$next}')" style="cursor:pointer">{$translate_field_company_task_status}</span>
			{/if}			
		</td>
    </tr>
    {foreach from=$task_array item=task}
    <tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblclick="javascript:edit_task('{$task->get_company_task_id()}')">
    	<td class="productListing-data" {if $field == 'company_task_priority'} style="background-color: #ECECEC;"{/if} width="50">{$task->get_company_task_priority()}</td>
    	<td class="productListing-data" {if $field == 'company_task_name'} style="background-color: #ECECEC;"{/if}>{$task->get_company_task_name()}</td>
    	<td class="productListing-data" {if $field == 'company_task_due'} style="background-color: #ECECEC;"{/if} width="100">
			{if $task->get_company_task_due() > 1}
				{$task->get_company_task_due()|link_date_time}
			{else}
				{$translate_text_not_applicable}
			{/if}
		</td>
    	<td class="productListing-data" {if $field == 'company_task_category_id'} style="background-color: #ECECEC;"{/if} width="100">
			{if $task->get_company_task_category_id() > 0}
				{$task->get_company_task_category_id()}
			{else}
				{$translate_text_not_applicable}
			{/if}	
		</td>
    	<td class="productListing-data" {if $field == 'company_task_status'} style="background-color: #ECECEC;"{/if} width="100">{$task->get_company_task_status()}</td>
    </tr>
    {foreachelse}
    <tr>
        <td class="productListing-data" colspan="5">{$translate_text_no_results_found}</td>
    </tr>
    {/foreach}
</table>
    	