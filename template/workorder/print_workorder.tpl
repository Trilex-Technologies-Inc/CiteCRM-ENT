<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html dir="LTR" lang="en">
<head>
	<title>{$core->getPageTitle()}</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<meta name="keywords" content="{$core->getKeywords()}">
	<meta name="description" content="{$core->getDescription()}">
	
	<link rel="stylesheet" type="text/css" href="{$CSS_URL}/print.css">
</head>

<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">

<div id="#content">
	<table cellpadding="3" cellspacing="0"  border="1" width="625" style="border-collapse: collapse;">
		<tr>
			<td width="157" ><img src="images/theme/logo.jpg" alt="{$SITE_NAME}"  width="95%" height="95%"></td>
			<td width="315" align="center" >
				<span class="header">TECHNICIAN COPY</span><br>
				<span class="medium">Work Order ID# {$workorder->get_workorder_id()}</span>
			</td>
			<td width="157" align="center" ><span class="powerdBy">Powerd By<br>Cite CRM</td>
		</tr><tr>
			<td align="center" width="157"><span class="header">Service Location</span></td>
			<td align="center" width="315"><span class="header">Service Details</span></td>
			<td align="center" width="157"><span class="header">Summary</span></td>
		</tr><tr>
			<td  valign="top" width="157">
				<span class="header">{$company->get_company_name()}</span><br>
				<span class="medium">{$company_address->get_company_street_1()}<br>
				{if $company_address->get_company_street_2() != ""}
					{$company_address->get_company_street_2()}<br>
				{/if}
				{$company_address->get_company_city()}<br>
				{$company_address->get_company_city()}, {$company_address->get_company_state()} {$company_address->get_company_postal_code()}<br>
				 <br>
				 
				 {foreach from=$company_contact_array item=company_contact}
				 	<b>{$company_contact->get_company_contact_type()}:</b><br> 
				 		&nbsp;&nbsp;{$company_contact->get_company_contact_value()}<br>
				 {/foreach}
				 
				<br><br>
				
				<span class="header">Schedule</span><br>
				<b>Start: </b> {$workorder->get_workorder_start_time()|date_format:"%Y-%d-%m %H:%M"}<br>
				<b>End: </b> {$workorder->get_workorder_end_time()|date_format:"%Y-%d-%m %H:%M"}<br>
				<b>Notes:</b><br>
				
				<br><br>		
				
				<span class="header">Company Contact</span><br>
				<b>{$SITE_NAME}</b><br>
				{$COMPANY_STREET_1}<br>
				{if $COMPANY_STREET_2 != ""}
					{$COMPANY_STREET_2}
				{/if}
				{$COMPANY_CITY}, {$COMPANY_STATE} {$COMPANY_POSTAL_CODE}<br>
				{$COMPANY_COUNTRY}<br>
				<br>
				{$COMPANY_PHONE}
				<br>
				
				<br><br><br>
			
				<span class="header">Thank You</span>
				
				
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<center><img src="images/barcode/WRD{$workorder->get_workorder_id()}.png" align="middle"><br><center>
				</span>
			</td>
			<td valign="top" width="315">
				<span class="medium">
					<span class="header">Job Scope:</span></br>
						{$workorder->get_workorder_scope()}
					
					
					<br><br>
					
				
					<span class="header">Desription:</span><br>
						{$workorder->get_workorder_desription()}
						
					<br><br>
									
					<span class="header">Commnets:</span><br>
					{foreach from=$workorder_comment_array item=workorder_comment}
						<b>Create By: </b>{$workorder_comment->get_workorder_comment_create_by()|display_names} {$workorder_comment->get_last_modified()}<br>
						{$workorder_comment->get_workorder_comment_text()}
						<br>					
					{/foreach}
					
					<br><br>
					
					
					<span class="header">Notes:</span><br>
					
					{foreach from=$workorder_note_array item=workorder_note}
						<b>Cretaed By: </b>{$workorder_note->get_workorder_note_create_by()|display_names} {$workorder_note->get_last_modified()}<br>
						{$workorder_note->get_workorder_note_text()}
						<br>
					{/foreach}
					<br>
				
				
				<br><br>
				<span class="header">System:</span><br>
				
				{foreach from=$system_array item="system"}
				
					<b>Name: </b>{$system->get_system_name()}<br>
					<b>Serial Number: </b>{$system->get_system_serial_num()|default:"N/A"}<br>
					<b>Host Name: </b>{$system->get_system_host_name()}<br>
					<b>IP Address: </b>{$system->get_system_ip_address()}<br>
					<b>Manufacture: </b>{$system->get_system_manufacture_id()|system_manufacture_name}<br>
					<b>Model: </b>{$system->get_system_model_id()|system_model_name}<br>
					<b>Opreating System: </b>{$system->get_operating_system_manufacture_id()|operating_system_manufacture_name} {$system->get_operating_system_id()|operating_system_name}<br>
					<br>
					<center><img src="images/barcode/SYS{$system->get_system_id()}.png" align="middle"></center>
					<br>
					<br>
				{/foreach}
			
			
				<span class="header">Parts:</span><br>
				<table class="small" width="100%">
					<tr>
						<td><b>Image</b></td>
						<td><b>SKU</b></td>
						<td><b>Model</b></td>
						<td><b>Manufacture</b></td>
						<td><b>Price</b></td>
						<td><b>QTY</b></td>
					</tr>
				{foreach from=$product_array item=product}

				<tr>
					<td><img src="{$product->get_product_image()}" width="25" height="25" align="middle" border="0"></td>
					<td>{$product->get_product_sku()}</td>
					<td>{$product->get_product_model()}</td>
					<td>{$product->get_manufacturer_id()|product_manufacture_name}</td>
					<td>${$product->get_product_price()|string_format:"%.2f"}</td>
					<td>{$product->fields.product_to_workorder_qty}</td>
				</tr>
				{foreachelse}
					<tr><td>No products</td></tr>
				{/foreach}
				</table>
				
				</span>
			</td>
			<td  valign="top" width="157">
				<span class="medium">
					<b>Opened: </b>{$workorder->get_workorder_open_date()|date_format:$DATE_FORMAT}<br>
					<b>Status: </b>{$workorder->get_workorder_status()|workorder_status}<br>
					<b>Tech: </b>{$workorder->get_workorder_assigned_to()|display_names}<br>
					<b>Update: </b><br> 
						{$workorder->get_last_modified()}<br>
					
					<br><br>
					
					<span class="header">Service Time</span><br>
					
					<table width="100%" cellpadding="3" cellspacing="0" border="0" class="small">
						<tr>
							<td><b>User</b></td>
							<td><b>Start</b></td>
							<td><b>End</b></td>
							<td><b>Total</b></td>
						</tr>
									
					{foreach from=$workorder_time_array item=workorder_time}
					<tr>
						<td>{$workorder_time->get_user_id()|display_names}</td>
						<td>{$workorder_time->get_workorder_time_start()|date_format:"%Y-%d-%m %H:%M"}</td>
						<td>{$workorder_time->get_workorder_time_end()|date_format:"%Y-%d-%m %H:%M"}</td>
						<td>{$workorder_time->get_workorder_time_total()|string_format:"%.2f"}</td>
					{foreachelse}
						<tr>
							<td colspan="4"><b>Start: </b>________________________<br></td>
						</tr><tr>
							<td colspan="4"><b>End: </b>_________________________<br></td>
						</tr>
					{/foreach}

					</table>
					
					<br><br>
					
					<span class="header">Notes</span><br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					_______________________________<br>
					
					<br><br>
					
					<span class="header">Signature</span><br>
					<b>Client</b><br>
					<b>Name:</b>_________________________<br>
					<b>Signature:</b>____________________<br>
					<br>
					<b>Tech</b><br>
					<b>Name:</b>_________________________<br>
					<b>Signature:</b>____________________<br>
				</span>
				
				<br><br>
				
			</td>
		</tr><tr>
			<td align="center" colspan="3"  ><span class="small">This Work Order is confidential and contains privileged information.</span></td>
		</tr>
	</table>
</div>
</body>
</html>
 
	
	