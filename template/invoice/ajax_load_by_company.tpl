<!-- ajax_load_by_company -->
<table width="100%">
	<tr>
		<td><span class="greetUser">Invoices</span></td>
		<td align="right"><a href="{$ROOT_PATH}/index.php?page=invoice:new_invoice&company_id=">New Invoice</a></td>	
	</tr>
</table>

	<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
		<tr>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_id'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_id','ASC','{$next}')" style="cursor:pointer">ID</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_id','DESC','{$next}')" style="cursor:pointer">ID</span>
				{/if}	
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_create_date'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_create_date','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_create_date}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_create_date','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_create_date}</span>
				{/if}				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_create_by'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_create_by','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_create_by}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_create_by','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_create_by}</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_due_date'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_due_date','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_due_date}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_due_date','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_due_date}</span>
				{/if}
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_amount'}
					<img src="/{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_amount','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_total_amount}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_amount','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_total_amount}</span>
				{/if}				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_status'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_status','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_status}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_status','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_status}</span>
				{/if}					
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_paid_date'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_paid_date','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_paid_date}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_paid_date','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_paid_date}</span>
				{/if}				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_paid_amount'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_paid_amount','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_paid_amount}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_paid_amount','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_paid_amount}</span>
				{/if}				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_payment_type'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_payment_type','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_payment_type}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_payment_type','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_payment_type}</span>
				{/if}
				
			</td>
			<td class="productListing-heading">
				{if $sort == 'DESC' && $field == 'invoice_payment_enter_by'}
					<img src="{$ROOT_PATH}/images/icons/sort_desc.gif"> <span onclick="load_company_invoices('Invoices','invoice_payment_enter_by','ASC','{$next}')" style="cursor:pointer">{$translate_field_invoice_payment_enter_by}</span>
				{else}
					<img src="{$ROOT_PATH}/images/icons/sort_asc.gif"> <span onclick="load_company_invoices('Invoices','invoice_payment_enter_by','DESC','{$next}')" style="cursor:pointer">{$translate_field_invoice_payment_enter_by}</span>
				{/if}				
			</td>
		</tr>
		{foreach from=$invoiceArray item=invoice}
		<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_PATH}/index.php?page=invoice:view_invoice&invoice_id={$invoice->get_invoice_id()}';">
			<td class="productListing-data" {if $field == 'invoice_id'} style="background-color: #ECECEC;"{/if}>{$invoice->get_invoice_id()}</td>
			<td class="productListing-data" {if $field == 'invoice_create_date'} style="background-color: #ECECEC;"{/if}>{$invoice->get_invoice_create_date()|date_format:"%Y-%m-%d"}</td>
			<td class="productListing-data" {if $field == 'invoice_create_by'} style="background-color: #ECECEC;"{/if}>{$invoice->get_invoice_create_by()|display_names}</td>
			<td class="productListing-data" {if $field == 'invoice_due_date'} style="background-color: #ECECEC;"{/if}>{$invoice->get_invoice_due_date()|date_format:"%Y-%m-%d"}</td>
			<td class="productListing-data" {if $field == 'invoice_amount'} style="background-color: #ECECEC;"{/if}>${$invoice->get_invoice_total_amount()|string_format:"%.2f"}</td>
			<td class="productListing-data" {if $field == 'invoice_status'} style="background-color: #ECECEC;"{/if}>{if $invoice->get_invoice_status() != 'Paid'} <span style="color:red;">{/if}{$invoice->get_invoice_status()}{if $invoice->get_invoice_status() != 'Paid'}</span>{/if}</td>
			<td class="productListing-data" {if $field == 'invoice_paid_date'} style="background-color: #ECECEC;"{/if}>{$invoice->get_invoice_paid_date()|date_format:"%Y-%m-%d"}</td>
			<td class="productListing-data" {if $field == 'invoice_paid_amount'} style="background-color: #ECECEC;"{/if}>${$invoice->get_invoice_paid_amount()|string_format:"%.2f"}</td>
			<td class="productListing-data" {if $field == 'invoice_payment_type'} style="background-color: #ECECEC;"{/if}>{$invoice->get_invoice_payment_type()|payment_type}</td>
			<td class="productListing-data" {if $field == 'invoice_payment_enter_by'} style="background-color: #ECECEC;"{/if}>{$invoice->get_invoice_payment_enter_by()|display_names}</td>
		</tr>
		{foreachelse}
		<tr>
			
			<td class="productListing-data" colspan="15">{$translate_text_no_results_found}</td>
		</tr>
		{/foreach}
		<tr>
			<td class="productListing-data" style="background-color: #ECECEC;" colspan="10"> 
				<table width="100%">
					<tr>
						<td class="data" nowrap>Viewing {$startItem} - {$endItem} of {$total} Records</td>
						<td class="data" width="75%"></td>
						<td class="data" nowrap>
							<a href="javascript:load_company_invoices('Invoices','{$field}','{$sort}','1');">First</a> |
							<a href="javascript:load_company_invoices('Invoices','{$field}','{$sort}','{paginate_prev id="invoice"}');">Prev</a> |

							<a href="javascript:load_company_invoices('Invoices','{$field}','{$sort}','{paginate_next id="invoice"}');" >Next</a> |
							<a href="javascript:load_company_invoices('Invoices','{$field}','{$sort}','{paginate_last id="invoice}');">Last</a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>