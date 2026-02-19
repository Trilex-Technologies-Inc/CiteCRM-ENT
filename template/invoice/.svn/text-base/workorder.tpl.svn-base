<!-- Workorder -->
{include file="core/header.tpl"}


<script language="javascript" type="text/javascript">
{literal}

	function calc_labor(hour, billing_rate, div ,div2) {
		alert(div);

		rate = document.getElementById( billing_rate ).value;		
		subTotal = hour * rate;	
		calc_total(subTotal);
		subTotal = formatAsMoney(subTotal);	

		document.getElementById(div).innerHTML = '$'+subTotal;	
		document.getElementById( billing_rate ).style.display="none";
		document.getElementById(div2).innerHTML = '$'+rate;
		
		
	}

	
	function formatAsMoney(mnt) {
   	 mnt -= 0;
   	 mnt = (Math.round(mnt*100))/100;
    	return (mnt == Math.floor(mnt)) ? mnt + '.00' : ( (mnt*10 == Math.floor(mnt*10)) ? mnt + '0' : mnt);
	}

	function calc_parts(qty,price) {
		subTotal = qty * price;
		calc_total(subTotal);
		subTotal = formatAsMoney(subTotal);	
		document.write('$'+subTotal);
	}


	function calc_total(subTotal){

		runningTotal = Number(document.getElementById('runningTotal').value);
		
		total = runningTotal + subTotal;
		
		document.getElementById('runningTotal').value = total;
		//document.getElementById('runTotal').innerHTML = '$'+formatAsMoney(total);
	
	}

	function calculate(){
		subTotal = Number(document.getElementById('runningTotal').value);
		shipping = Number(document.getElementById('invoice_shipping_amount').value);
		discount = Number(document.getElementById('invoice_discount_amount').value);
		taxPer = Number(document.getElementById('tax_per').value);

		if(discount > 100) {
			alert('Discount Amount can not be greater than 100%');
		} else {

			discountPer = discount * .01;					
			subTotal = subTotal + shipping;	
			discountAmount = formatAsMoney(subTotal * discountPer);

			total = subTotal - discountAmount;

			//Tax crap
			taxPer = taxPer * .01;
			taxAmount = total * taxPer;
		
			total = total + taxAmount;

			document.getElementById('discAmount').innerHTML = '$'+discountAmount;
			document.getElementById('taxAmount').innerHTML = '$'+formatAsMoney(taxAmount);
			document.getElementById('runTotal').innerHTML = '$'+formatAsMoney(total);
		}
	}


{/literal}
</script>

<input type="hidden" name="runningTotal" id="runningTotal" value="0">

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser"><a href="{$ROOT_PATH}/index.php?page=workorder:view_workorder&workorder_id={$workorder_id}">Invoice for Workorder #{$workorder_id}</a></span></td>
		<td align="right"></td>
	</tr>
</table>

<br>


<form method="POST" action="{$ROOT_PATH}/index.php?page=invoice:create">
<input type="hidden" name="workorder_id" id="workorder_id" value="{$workorderObj->get_workorder_id()}">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Customer Information</a></li>
</ul>
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-data">
			<table class="small" width="100%">
				<tr>
					<td>
					{if $company->get_company_id() != ""}

						<b>Bill TO:</b><br>
						<a href="index.php?page=company:view_company&company_id={$company->get_company_id()}">{$company->get_company_name()}</a><br>
						{$company_address->get_company_street_1()}<br>
						{if $company_address->get_company_street_2() !=""}
						{$company_address->get_company_street_2()}<br>
						{/if}
						{$company_address->get_company_city()}, {$company_address->get_company_state()} {$company_address->get_company_postal_code()}
						<input type="hidden" name="company_id" value="{$company->get_company_id()}">
					{/if}	
					
					{if $user->getUserID() != ""}
						<b>Bill TO:</b><br>
						<a href="{$ROOT_PATH}/index.php?page=user:admin_view_user_detail&userID={$user->getUserID()}">{$user->getUserID()|display_names}</a><br>
						{$user_address->getAddressStreet()}<br>
						{if $user_address->getAddressStreet2() != ""}
						{$user_address->getAddressStreet2()}<br>
						{/if}
						{$user_address->getAddressCity()}, {$user_address->getAddressState()} {$user_address->getAddressPostalCode()}
						<input type="hidden" name="user_id" value="{$user->getUserID()}">
					{/if}
					</td>
					<td>
						<table cellpadding="3" cellspacing="0" border="0" class="small" >
							<tr>
								<td><b>Employee:</b></td>
								<td>{$workorderObj->get_workorder_assigned_to()|display_names}</td>
							</tr><tr>
								<td><b>Status:</b></td> 
								<td>{$invoice->get_invoice_status|default:"New"}</td>
							</tr><tr>
								<td><b>Due Date</b></td>
								<td><input type="text" name="invoice_due_date" id="invoice_due_date" size="10">
									<input type="button" id="trigger_date" value="+">
									{literal}
										<script type="text/javascript">
											Calendar.setup(
												{
													inputField  : "invoice_due_date",
													ifFormat    : "%m-%d-%Y",
													button      : "trigger_date"
												}
											);
										</script>
									{/literal}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<br><b>Discount%</b> <input type="text" name="invoice_discount_amount" id="invoice_discount_amount" size="6" value="0">
		</td>
	</tr>
</table>	 

<br>
{* Resolution *}
{if $workorderObj->get_workorder_resolution() == "" }
	<span class="greetUser">Work Preformed</span>
<table cellpadding="5" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="fieldValue" colspan="4">
			<textarea name="workorder_resolution" id="workorder_resolution" rows="5" cols="10">{$workorder_resolution}</textarea>
		</td>		
	</tr>
</table>
<br>
{/if}



<span class="greetUser">Labor</span>
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
	<tr>
		<td class="productListing-heading">Hours</td>
		<td class="productListing-heading">Date</td>
		<td class="productListing-heading">Description</td>
		<td class="productListing-heading">Rate</td>
		<td class="productListing-heading"  width="65">Sub Total</td>
	</tr>
{foreach from=$workorder_time_array item=workorder_time name=timeArray}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" >
		<td class="productListing-data">
			{$workorder_time->get_workorder_time_total()|string_format:"%.2f"}
			<input type="hidden" value="{$workorder_time->get_workorder_time_total()|string_format:"%.2f"}" name="labor_hours[{$smarty.foreach.timeArray.index}]">
		</td>
		<td class="productListing-data">{$workorder_time->get_workorder_time_start()|date_format:$DATE_FORMAT}</td>
		<td class="productListing-data"><input type="text" name="labor_description[{$smarty.foreach.timeArray.index}]" size="60"></td>
		<td class="productListing-data" align="right">
			<div id="div_{$smarty.foreach.timeArray.index}"></div>			
			<select name="billing_rate[{$smarty.foreach.timeArray.index}]" id="billing_rate_{$smarty.foreach.timeArray.index}" 
					onchange="calc_labor({$workorder_time->get_workorder_time_total()|string_format:"%.2f"}, 'billing_rate_{$smarty.foreach.timeArray.index}','value_{$smarty.foreach.timeArray.index}','div_{$smarty.foreach.timeArray.index}')">	
				<option value="">Select Rate</option>
			{foreach from=$billing_rate_array item=billing}
				<option value="{$billing->get_billing_rate_amount()|string_format:"%.2f"}">${$billing->get_billing_rate_amount()|string_format:"%.2f"} {$billing->get_billing_rate_text()}</option>
			{/foreach}		
			</select>			
		</td>
		<td class="productListing-data" width="65"><b><div id="value_{$smarty.foreach.timeArray.index}"></div></b></td>
	</tr>
{foreachelse}
	<tr>
		<td class="productListing-data" colspan="5">No time Available</td>
	</tr>
{/foreach}
</table>
<br>

<span class="greetUser">Parts</span>
<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-heading" width="25">Image</td>
		<td class="productListing-heading" width="50">SKU</td>
		<td class="productListing-heading">Model</td>
		<td class="productListing-heading">Manufacture</td>
		<td class="productListing-heading" width="25">Price</td>
		<td class="productListing-heading" width="25">Qty</td>
		<td class="productListing-heading" width="65">Sub Total</td>
	</tr>
	
{foreach from=$product_array item=product name="productArray"}
	<tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" >
		<td class="productListing-data"><img src="{$product->get_product_image()}" width="25" height="25" align="middle" border="0"></td>
		<td class="productListing-data">
			<input type="hidden" name="product_id[{$smarty.foreach.productArray.index}]" value="{$product->get_product_id()}">
			{$product->get_product_sku()}
		</td>
		<td class="productListing-data">{$product->get_product_model()}</td>
		<td class="productListing-data">{$product->get_manufacturer_id()|product_manufacture_name}</td>
		<td class="productListing-data" width="25">
			${$product->get_product_price()|string_format:"%.2f"}
			<input type="hidden" name="product_amount[{$smarty.foreach.productArray.index}]" value="{$product->get_product_price()}">
		</td>
		<td class="productListing-data" align="center">
			{$product->fields.product_to_workorder_qty}
			<input type="hidden" name="product_qty[{$smarty.foreach.productArray.index}]" value="{$product->fields.product_to_workorder_qty}">
		</td>
		<td class="productListing-data" width="65"  width="65">
			<b><script language="javascript" type="text/javascript">calc_parts({$product->fields.product_to_workorder_qty},{$product->get_product_price()})</script></b>
		

		</td>
	</tr>
{foreachelse}
	<tr>
		<td class="productListing-data" colspan="7">No Products Orderd</td>
	</tr>
{/foreach}
</table>
<br>



<table cellpadding="5" cellspacing="0" class="productListing" width="100%">
	<tr>
		<td class="productListing-data" align="right"><b>Shipping</b></td>
		<td class="productListing-data" width="65">$<input type="text" name="invoice_shipping_amount" id="invoice_shipping_amount" size="6" value="0"></td>
	</tr><tr>
		<td class="productListing-data" align="right"><b>Discount</b></td>
		<td class="productListing-data" width="65"><div id="discAmount"></div></td>
	</tr><tr>
		<td class="productListing-data" align="right"><b>Tax Amount</b></td>
		<td class="productListing-data" width="65"><input type="hidden" name="tax_per" id="tax_per" value="0.0"><div id="taxAmount"></div></td>
	</tr><tr>
		<td class="productListing-data" align="right"><b>Total</b></td>
		<td class="productListing-data" width="65">
			
			<div id="runTotal"></div></td>
	</tr>
</table>
<br>

	<input type="button" value="Calculate" onclick="calculate()"> <input type="submit" name="save" value="Save" id="save">  <span class="small">* Calculations are for display purpose only. The actual calculations happen after form submission. To reset the values click the refresh button on you browser.</span>

</form>
{include file="core/footer.tpl"}