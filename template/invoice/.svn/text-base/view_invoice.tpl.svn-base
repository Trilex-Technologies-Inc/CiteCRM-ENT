<!-- view_invoice -->
{include file="core/header.tpl"}
<input type="hidden" name="invoice_id" id="invoice_id" value="{$invoice_id}">

<script language="javascript" type="text/javascript">
{literal}

var invoice_id = document.getElementById("invoice_id").value;

function load_page(){
    load_line_items();
}



function load_line_items() {
    display_items();
	urlVars = {}
	bodyVars = {invoice_id:invoice_id}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_load_line_items", bodyVars, urlVars, on_response,false, "a postVars request");


}

function add_item() {
    bodyVars = {invoice_id:invoice_id,action:'add_item'}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_new_line_item", bodyVars, urlVars, return_new_item,false, "a postVars request");
}

function record_payment() {
    bodyVars = {invoice_id:invoice_id,action:'record_payment'}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_new_line_item", bodyVars, urlVars, return_new_item,false, "a postVars request");
}

function save_new_item() {
    var invoice_item_type   = document.getElementById("invoice_item_type").value;
    var invoice_item_qty  = document.getElementById("invoice_item_qty").value;
    var invoice_item_description  = document.getElementById("invoice_item_description").value;
    var invoice_item_amount  = document.getElementById("invoice_item_amount").value;
    var invoice_item_line_type = document.getElementById("invoice_item_line_type").value;
    var error = false;
	var errorMsg = 'There where errors saving the new Invoice Item\n';

    if(invoice_item_qty < 1) {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Quantity --\n';
        document.getElementById("invoice_item_qty").className='formError';
    }

    if(invoice_item_description == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Item Description --\n';
        document.getElementById("invoice_item_description").className='formError';
    }

    if(invoice_item_amount < .01) {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Item Amount --\n';
        document.getElementById("invoice_item_amount").className='formError';
    }


    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your new Invoice Item';
		alert(errorMsg);
        return false;       
    } else {
        {/literal}
        {if $company == 'true'}        
            {literal}
                var company_id = document.getElementById("company_id").value;
                bodyVars = {invoice_id:invoice_id,invoice_item_type:invoice_item_type,invoice_item_qty:invoice_item_qty,invoice_item_description:invoice_item_description,invoice_item_amount:invoice_item_amount,invoice_item_line_type:invoice_item_line_type,company_id:company_id,submit:'submit'}

            {/literal}
        {else}
            {literal}bodyVars = {invoice_id:invoice_id,invoice_item_type:invoice_item_type,invoice_item_qty:invoice_item_qty,invoice_item_description:invoice_item_description,invoice_item_amount:invoice_item_amount,invoice_item_line_type:invoice_item_line_type,user_id:user_id,submit:'submit'}{/literal}
        {/if}
        {literal}
         


        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_new_line_item", bodyVars, urlVars, return_new_item,false, "a postVars request");
        alert('New Invoice Item Added');
        load_line_items();
    }

}

function save_payment() {
    var invoice_item_line_type = document.getElementById("invoice_item_line_type").value;
    var invoice_payment_type = document.getElementById("invoice_payment_type").value;
    var invoice_paid_amount = document.getElementById("invoice_paid_amount").value;

    var error = false;
	var errorMsg = 'There where errors recording your Payment\n';


    {/literal}
        {if $company == 'true'}        
            {literal}
                var company_id = document.getElementById("company_id").value;
             {/literal}
        {else}

        {/if}
    {literal}

 

    switch(invoice_payment_type) {
        // Credit Card Payment
        case '1':
    		var cc_num = document.getElementById("cc_num").value;
    		var cc_card_type = document.getElementById("cc_card_type").value;
    		var ccMonth = document.getElementById("ccMonth").value;
    		var ccYear = document.getElementById("ccYear").value;
    		
    				
    		
    		bodyVars = {cc_num:cc_num,cc_card_type:cc_card_type,ccMonth:ccMonth,ccYear:ccYear,invoice_id:invoice_id,invoice_item_line_type:invoice_item_line_type,invoice_payment_type:invoice_payment_type,invoice_paid_amount:invoice_paid_amount,company_id:company_id,submit:'submit'}
			
    
        break;
        // Check Payment
        case '2':
             var check_number = document.getElementById("check_number").value;

            if(check_number == "") {
                error = true;
                errorMsg = errorMsg + '-- Please provide the Check Number --\n';
                document.getElementById("check_number").className='formError';
            }

           
            bodyVars = {invoice_id:invoice_id,invoice_item_line_type:invoice_item_line_type,invoice_payment_type:invoice_payment_type,check_number:check_number,invoice_paid_amount:invoice_paid_amount,company_id:company_id,submit:'submit'}

        break;
        // Cash
        case '3':
            bodyVars = {invoice_id:invoice_id,invoice_item_line_type:invoice_item_line_type,invoice_payment_type:invoice_payment_type,invoice_paid_amount:invoice_paid_amount,company_id:company_id,submit:'submit'}
        break;
        // Gift Cirtificate
        case '4':        
        	var gift_certificate_id = document.getElementById("gift_certificate_id").value;        	
        	if(gift_certificate_id == "") {
                error = true;
                errorMsg = errorMsg + '-- Please provide the Gift Certificate Number --\n';
                document.getElementById("gift_certificate_id").className='formError';
        	}
        	bodyVars = {gift_certificate_id:gift_certificate_id,invoice_id:invoice_id,invoice_item_line_type:invoice_item_line_type,invoice_payment_type:invoice_payment_type,check_number:check_number,invoice_paid_amount:invoice_paid_amount,company_id:company_id,submit:'submit'}       
        break;
        // Paypal
        case '5':        
        	var paypal_email = document.getElementById("paypal_email").value;        	
        	if(paypal_email == "") {
                error = true;
                errorMsg = errorMsg + '-- Please provide the users Pay Pal email address --\n';
                document.getElementById("paypal_email").className='formError';
        	}
        	bodyVars = {paypal_email:paypal_email,invoice_id:invoice_id,invoice_item_line_type:invoice_item_line_type,invoice_payment_type:invoice_payment_type,check_number:check_number,invoice_paid_amount:invoice_paid_amount,company_id:company_id,submit:'submit'}       
        break;


    }


     if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Payment';
		alert(errorMsg);
        return false;       
    } else {
        
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_record_payment", bodyVars, urlVars, return_payment_option,false, "a postVars request");
        alert('Your Payment was Processed.');
        load_line_items();
    }

}

function select_payment_type() {
    var invoice_payment_type = document.getElementById("invoice_payment_type").value;

    if(invoice_payment_type == "") {
        alert('You Must Select a Payment Type');
    } else {

        bodyVars = {invoice_payment_type:invoice_payment_type}
        ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=invoice:ajax_select_payment_option", bodyVars, urlVars, return_payment_option,false, "a postVars request");
    }
}

function cancel_new_item() {
    document.getElementById("newItem").innerHTML = "";

}

function return_new_item(text, headers, callingContext) {
    document.getElementById("newItem").innerHTML = text;
}

function return_details(text, headers, callingContext) {
	document.getElementById("detailsBox").innerHTML = text;
}

function return_payment_option(text, headers, callingContext) {
    document.getElementById("payment_type_box").innerHTML = text;
}

function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_items() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}


function bookmark() {
    var invoice_id = document.getElementById("invoice_id").value;
    var user_id = '{/literal}{$SESSION_USER_ID}{literal}';
    var bookmark_description = 'Invoice #' + invoice_id;
    urlVars = {}
    bodyVars = {user_id:user_id,bookmark_type:'Invoice',bookmark_description:bookmark_description,bookmark_type_id:invoice_id}
    ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=bookmark:add_bookmark", bodyVars, urlVars, false ,false, "a postVars request");
    alert('New Bookmark added:' + bookmark_description);
}


{/literal}
</script>

<body onload="load_page()">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Invoice #{$invoice_id}</a></li>
</ul>
<table cellpadding="3" cellspacing="0" class="formArea" width="100%">
    <tr>    
        <td class="fieldValue" valign="top" width="300">
            <table cellpadding="3" cellspacing="0">
                <tr>
                    <td valign="top" nowrap>
                        <table cellpadding="3" cellspacing="0">  
                            <tr>
                                <td class="formAreaTitle">Bill To</td>
                            </tr><tr>
                            {if $company == 'true'}
                                 <td class="fieldValue" nowrap="true">
                                    <a href="index.php?page=company:view_company&company_id={$companyObj->get_company_id()}">{$companyObj->get_company_name()}</a>
                                    <input type="hidden" id="company_id" value="{$companyObj->get_company_id()}">
                                </td>
                            </tr><tr>
                                 <td class="fieldValue" nowrap="true">{$companyAddressObj->get_company_street_1()}</td>
                            </tr>
                            {if $companyAddressObj->get_company_street_2() != ""}
                            <tr>
                                <td class="fieldValue" nowrap="true">{$companyAddressObj->get_company_street_2()}</td>
                            </tr>
                            {/if}
                            <tr>
                                <td class="fieldValue" nowrap="true">{$companyAddressObj->get_company_city()},{$companyAddressObj->get_company_state()|state_name} {$companyAddressObj->get_company_postal_code()}</td>
                            </tr>
                            
                        {else}
                            User Address
                
                        {/if}
                        </table>
                
                     </td>
                     <td width="25"><br></td>
                     <td valign="top" nowrap="true">

                        <table cellpadding="3" cellspacing="0">  
                            <tr>
                                <td class="formAreaTitle" nowrap="true">Invoice ID</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_id()}</td>
                                <td class="formAreaTitle" nowrap="true">Created</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_create_date()|date_format:$DATE_FORMAT}</td>
                            </tr><tr>
                                <td class="formAreaTitle" nowrap="true">Due Date</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_due_date()|date_format:$DATE_FORMAT}</td>
                                <td class="formAreaTitle" nowrap="true">Amount</td>
                                <td class="fieldValue" nowrap="true">${$invoiceObj->get_invoice_amount()|string_format:"%.2f"}</td>
                            </tr><tr>
                                <td class="formAreaTitle" nowrap="true">Created By</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_create_by()|display_names}</td>
                                <td class="formAreaTitle" nowrap="true">Status</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_status()}</td>
                            </tr>
                            {if $invoiceObj->get_invoice_status() == 'Paid'}
                            <tr>
                                <td class="formAreaTitle" nowrap="true">Date Paid</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_paid_date()|date_format:$DATE_FORMAT}</td>
                                <td class="formAreaTitle" nowrap="true">Paid Amount</td>
                                <td class="fieldValue" nowrap="true">${$invoiceObj->get_invoice_paid_amount()|string_format:"%.2f"}</td>
                            </tr><tr>
                                <td class="formAreaTitle" nowrap="true">Payment Type</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_payment_type()}</td>
                                <td class="formAreaTitle" nowrap="true">Entered By</td>
                                <td class="fieldValue" nowrap="true">{$invoiceObj->get_invoice_payment_enter_by()|display_names}</td>
                            </tr>
                            {/if} 
                        </table>
                                
        

                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
<br>  
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Invoice Details</a></li>
</ul>
<table width="600" style="border-top:1px solid #1c679f;border-left:1px solid #1c679f;border-right:1px solid #1c679f;">
	<tr>
        <td align="right" class="small">
            {if $invoiceObj->get_invoice_status() == 'Un-Paid'}<a href="javascript:add_item();">Add Item</a> | <a href="javascript:record_payment();">Record Payment</a> | {/if}<a href="{$ROOT_URL}/index.php?page=invoice:print_invoice&invoice_id={$invoiceObj->get_invoice_id()}">Print</a>
            <div id="newItem"></div>
        </td>
	</tr>
</table>

<div id="contentBox"><br></div>

<br>
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Invoice Memo</a></li>
</ul>
<table cellpadding="3" cellspacing="0" class="formArea" width="100%">
    <tr>
        <td class="fieldValue">{$invoiceObj->get_invoice_memo()}</td>
    </tr>
</table>



{include file="core/footer.tpl"}
