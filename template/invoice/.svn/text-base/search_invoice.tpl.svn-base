<!-- search_invoice -->
{include file="core/header.tpl"}

{literal}
<script language="javascript" type="text/javascript">

function load_window(field,sort,next) {
	
	var invoice_id					= document.getElementById("invoice_id").value;
	var invoice_create_by			= document.getElementById("invoice_create_by").value;
	var invoice_payment_enter_by	= document.getElementById("invoice_payment_enter_by").value;
	var invoice_create_date			= document.getElementById("invoice_create_date").value;
	var invoice_create_date_c		= document.getElementById("invoice_create_date_c").value;
	var invoice_due_date			= document.getElementById("invoice_due_date").value;
	var invoice_due_date_c			= document.getElementById("invoice_due_date_c").value;
	var invoice_paid_date			= document.getElementById("invoice_paid_date").value;
	var invoice_paid_date_c			= document.getElementById("invoice_paid_date_c").value;
	var invoice_status				= document.getElementById("invoice_status").value;
	var invoice_payment_type		= document.getElementById("invoice_payment_type").value;
	
	display_progress();
	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next,invoice_id:invoice_id,invoice_create_by:invoice_create_by,invoice_payment_enter_by:invoice_payment_enter_by,invoice_create_date:invoice_create_date,invoice_create_date_c:invoice_create_date_c,invoice_due_date:invoice_due_date,invoice_due_date_c:invoice_due_date_c,invoice_paid_date:invoice_paid_date,invoice_paid_date_c:invoice_paid_date_c,invoice_status:invoice_status,invoice_payment_type:invoice_payment_type}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_search_invoice", bodyVars, urlVars, on_response,false, "a postVars request");
}

function load_search_box() {
	searchWindow=dhtmlmodal.open('searBox', 'div', 'search_box', 'Search Invoices', 'width=400px,height=305px,center=1,resize=1,scrolling=1');
}

function search_invoice(field,sort,next) {
	parent.searchWindow.hide();
	load_window(field,sort,next)
}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src=/images/theme/progressbar1.gif align=middle>";
}
</script>
{/literal}

<body onload="load_window('invoice_id','DESC','1')">

<div id="search_box" style="display:none; background-color: #ECECEC;">
	<table cellpadding="5" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="small">Invoice ID</td>
		<td class="small"><input type="text" name="invoice_id" id="invoice_id"></td>
	</tr><tr>
		<td class="small">Created By</td>
		<td class="small">{html_select_employee fieldName=invoice_create_by}</td>
	</tr><tr>
		<td class="small">Payment Type</td>
		<td class="small">{html_select_payment_options fieldName="invoice_payment_type"}</td>
	</tr><tr>
		<td class="small">Payment Enterd By</td>
		<td class="small">{html_select_employee fieldName=invoice_payment_enter_by}</td>
	</tr><tr>
		<td class="small">Status</td>
		<td class="small">
			<select name="invoice_status" id="invoice_status">
				<option value="">All</option>
				<option value="Un-Paid">Un-Paid</option>
				<option value="Paid">Paid</option>
				<option value="Pending">Pending</option>
			</select>
		</td>
	</tr><tr>
		<td colspan="2" class="small"></td>
	</tr><tr>
		<td class="small">Date Created</td>
		<td class="small">From <input type="text" name="invoice_create_date" id="invoice_create_date" size="10"> To <input type="text" name="invoice_create_date_c" id="invoice_create_date_c" size="10"></td>
	</tr><tr>
		<td class="small">Due Date</td>
		<td class="small">From <input type="text" name="invoice_due_date" id="invoice_due_date" size="10"> To <input type="text" name="invoice_due_date_c" id="invoice_due_date_c" size="10"></td>
	</tr><tr>
		<td class="small">Date Paid</td>
		<td class="small">From <input type="text" name="invoice_paid_date" id="invoice_paid_date" size="10"> To <input type="text" name="invoice_paid_date_c" id="invoice_paid_date_c" size="10"></td>
	</tr><tr>
		<td colspan="2" class="small"><input type="submit" name="submit" value="Search" id="submit" onclick="search_invoice('invoice_id','DESC','1')"></td>
	</tr><tr>
		<td colspan="2" class="small">Date Format mm/dd/yyyy</td>
	<tr>
</table>

</div>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Search Invoices</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><a href="javascript:load_search_box()">Search</a></td>
					<td>
					</td>
				</tr>
			</table>
		</d>
	</tr>
</table>

<br>	
<div id="contentBox"></div>


{include file="core/footer.tpl"}
