<div class="chromestyle" id="chromemenu">
	<ul>
		<li></li>
		<li><a href="{$ROOT_URL}/index.php" rel="dropmenu">Home</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=leads:search_leads" rel="dropmenu1">Leads</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=company:search_company" rel="dropmenu2">Accounts</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=user:search_users" rel="dropmenu3">Contacts</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=workorder:search_workorder" rel="dropmenu4">Workorders</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=system:search_system" rel="dropmenu5">Systems</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=invoice:search_invoice" rel="dropmenu6">Invoices</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=product:search_product" rel="dropmenu7">Products</a></li>
		<li><a href="{$ROOT_URL}/index.php?page=campaign:search_campaign" rel="dropmenu8">Campaign</a></li>
		<li><a href="{$ROOT_URL}#" rel="dropmenu9">Setup</a></li>
	</ul>
</div>

<!-- Home -->
<div id="dropmenu" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=user:my_home"><img src="{$ROOT_URL}/images/icons/exp_16.gif" border="0" align="middle">&nbsp;Home</a>
	<a href="http://www.citecrm.com" target="new"><img src="{$ROOT_URL}/images/icons/web_16.gif" border="0" align="middle">&nbsp;Cite CRM</a>
	<a href="http://www.citecrm.com/index.php?page=bug:main" target="new"><img src="{$ROOT_URL}/images/icons/web_16.gif" border="0" align="middle">&nbsp;Report Bug</a>
	<a href="#" onclick="window.open('{$ROOT_URL}/index.php?page=core:help_contents','mywindow','scrollbars=1,menubar=1,resizable=1,width=350,height=550');"><img src="{$ROOT_URL}/images/icons/help_16.gif" border="0" align="middle">&nbsp;Help</a>
	<a href="{$ROOT_URL}/index.php?action=logout"><img src="{$ROOT_URL}/images/icons/close_16.gif" border="0" align="middle">&nbsp;Log Out</a>
</div>

<!-- Leads -->
<div id="dropmenu1" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=leads:search_leads"><img src="{$ROOT_URL}/images/icons/srch_16.gif" border="0" align="middle" alt="Search Leads">&nbsp;Search Leads</a>
	<a href="{$ROOT_URL}/index.php?page=leads:add"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" align="middle" alt="Add Leads">&nbsp;Add Lead</a>
	
	{if $lead_id && $MODULE == 'leads'}
		{if $edit}
			{if $lead_id > 0}
			<a href="javascript:edit_lead();"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" align="middle" alt="Edit Lead">&nbsp;Edit Lead</a>
			{/if}
			<a href="javascript:add_activity('Call');"><img src="{$ROOT_URL}/images/icons/phone_16.gif" border="0" align="middle" alt="Start Tech Support Call">&nbsp;Record Call</a>
			<a href="javascript:add_activity('Meeting');"><img src="{$ROOT_URL}/images/icons/group_16.gif" border="0" align="middle" alt="Record a Meeting">&nbsp;Record Meeting</a>
			<a href="javascript:add_activity('Email');"><img src="{$ROOT_URL}/images/icons/mail_16.gif" border="0" align="middle" alt="Email Client">&nbsp;Email Contact</a>
			<a href="javascript:add_note('Notes');"><img src="{$ROOT_URL}/images/icons/notep_16.gif" border="0" align="middle" alt="Add Note">&nbsp;Add Note</a>
			<a href="javascript:convertLead();"><img src="{$ROOT_URL}/images/icons/copy_16.gif" border="0" align="middle" "alt="Convert Lead to Account">&nbsp;Convert</a>
            <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark Lead">&nbsp;Bookmark</a>
		{/if}
	{/if}	
	<a href="{$ROOT_URL}/index.php?page=lead_type:search_lead_type"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Lead Types" align="middle">&nbsp;Lead Types</a>	
	
</div>

<!-- Accounts -->
<div id="dropmenu2" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=company:search_company"><img src="{$ROOT_URL}/images/icons/srch_16.gif" border="0" align="middle" alt="Search Accounts">&nbsp; Search Accounts</a>
	<a href="{$ROOT_URL}/index.php?page=company:add_company"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" align="middle" alt="Add Account">&nbsp; Add Account</a>
	
	{if $company_id && $MODULE == 'company'}
	<a href="javascript:edit_company_details()"><img src="{$ROOT_URL}/images/icons/edit_16.gif" border="0" align="middle" alt="Edit Account">&nbsp;Edit Account</a>
	<a href="{$ROOT_URL}/index.php?page=workorder:add_workorder&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/sinfo_16.gif" border="0" align="middle" alt="Create New Workorder">&nbsp;New Workorder</a>
	<a href="javascript:add_user()"><img src="{$ROOT_URL}/images/icons/user_16.gif" border="0" align="middle" alt="Add Contact to Account">&nbsp;Add Contact</a>
	<a href="{$ROOT_URL}/index.php?page=system:add_system&company_id={$company->get_company_id()}"><img src="{$ROOT_URL}/images/icons/save_16.gif" border="0" align="middle" alt="Add System to Account">&nbsp;Add System</a>
	<a href="javascript:add_note('Notes');"><img src="images/icons/notep_16.gif" border="0" align="middle" alt="Add a Note">&nbsp;Add Note</a>
	<a href="javascript:add_file('Files');"><img src="images/icons/open_16.gif" border="0" align="middle" alt="add A File">&nbsp;Add File</a>
	<a href="javascript:start_call('Support');"><img src="images/icons/phone_16.gif" border="0" align="middle" alt="Start A Call">&nbsp;Start Call</a>
    <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark Account">&nbsp;Bookmark</a>
	{/if}
	<a href="{$ROOT_URL}/index.php?page=contract_type:search_contract_type"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Contract Types" align="middle">&nbsp;Contract Types</a>
</div>

<!-- Contacts -->
<div id="dropmenu3" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=user:search_users"><img src="{$ROOT_URL}/images/icons/srch_16.gif" border="0" align="middle" alt="Search Accounts">&nbsp;Search Contacts</a>	
	<a href="{$ROOT_URL}/index.php?page=user:add_user"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" align="middle" alt="Add New Contact">&nbsp;Add Contact</a>

	{if $user_to_companyObj->fields.company_id < 1}
	{if $userID && $MODULE == 'user'}
	<!--<a href="{$ROOT_URL}/index.php?page=system:add_system&user_id={$userID}"><img src="{$ROOT_URL}/images/icons/save_16.gif" border="0" align="middle">&nbsp;Add System to Contact</a>-->
	<!--<a href="{$ROOT_URL}/index.php?page=workorder:add_workorder&user_id={$userID}"><img src="images/icons/sinfo_16.gif" border="0" align="middle">&nbsp;New Workorder</a>-->
	<a href="{$ROOT_URL}/index.php?page=&user_id={$userID}"><img src="images/icons/mail_16.gif" border="0" align="middle" alt="Email Contact">&nbsp;Email Contact</a>
	<a href="{$ROOT_URL}/index.php?page=user:admin_update_user&user_id={$userID}"><img src="images/icons/edit_16.gif" border="0" align="middle" alt="Edit Contact">&nbsp;Edit Contact</a>
    <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark Contact">&nbsp;Bookmark</a>
	{/if}
	{/if}	
	<a href="{$ROOT_URL}/index.php?page=user_type:search_user_type"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Contact Types" align="middle">&nbsp;Contact Types</a>
</div>

<!-- Work Orders -->
<div id="dropmenu4" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=workorder:search_workorder"><img src="images/icons/srch_16.gif" border="0" align="middle" alt="Search Work Orders">&nbsp;Search Workorders</a>
	
	{if $workorder_id && $MODULE == 'workorder'}
		<a href="javascript:add_window('Notes');"><img src="images/icons/notep_16.gif" border="0" align="middle" alt="New Note">&nbsp;New Note</a>
		{if $edit}
			<a href="javascript:add_window('Time');"><img src="images/icons/hist_16.gif" border="0" align="middle" alt="Add Workorder Labor">&nbsp;Add Work Time</a>
			<a href="javascript:add_window('Systems');"><img src="images/icons/save_16.gif" border="0" align="middle" alt="Add System to Work Order">&nbsp;Add System</a>
			<a href="javascript:add_parts('0','product_id','ASC','0');"><img src="images/icons/cart_16.gif" border="0" align="middle" alt="Add Parts To Work Order">&nbsp;Add Parts</a>
		
		{/if}
		<a href="javascript:add_window('Files');"><img src="images/icons/open_16.gif" border="0" align="middle" alt="Add File">&nbsp;Add File</a>
		<a href="{$ROOT_URL}/index.php?page=workorder:print_workorder&workorder_id={$workorder_id}"><img src="images/icons/print_16.gif" border="0" align="middle" alt="Print">&nbsp;Print</a>
        <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark">&nbsp;Bookmark</a>
	
	{/if}
	
</div>

<!-- Systems -->
<div id="dropmenu5" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=system:search_system"><img src="{$ROOT_URL}/images/icons/srch_16.gif" border="0" align="middle" alt="Search Systems">&nbsp;Search Systems</a>
	{if $system_id && $MODULE == 'system'}
		{if $company_id != ""}
			<a href="index.php?page=workorder:add_workorder&company_id={$company_id}&system_id={$system_id}"><img src="images/icons/sinfo_16.gif" alt="New Work Order" border="0" alt="New Work Order"> New Workorder</a>
		{else}
			<a href="index.php?page=workorder:add_workorder&user_id={$user_id}&system_id={$system_id}"><img src="images/icons/sinfo_16.gif" alt="New Work" border="0" alt="New Work Order">New Workorder</a>
		{/if}
			<a href="javascript:edit_system()"><img src="images/icons/edit_16.gif" border="0" alt="Edit" alt="Edit System">Edit</a>
			<a href="index.php?page=system:delete_system&system_id={$system_id}"><img src="images/icons/del_16.gif" border="0" alt="Delete" alt="Delete System">Delete</a>
            <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark System">&nbsp;Bookmark</a>
	{/if}
	<a href="{$ROOT_URL}/index.php?page=system_manufacture:search_system_manufacture"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="System Manufactures" align="middle">&nbsp;System Manufactures</a>
	<a href="{$ROOT_URL}/index.php?page=operating_system_manufacture:search_operating_system_manufacture"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Operating Systems" align="middle">&nbsp;Operating Systems</a>
</div>

<!-- Invoices -->
<div id="dropmenu6" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=invoice:search_invoice"><img src="{$ROOT_URL}/images/icons/srch_16.gif" border="0" align="middle" alt="Search Invoices">&nbsp;Search Invoices</a>
	
	{if $MODULE == 'invoice' & $invoice_id > 0}
	<a href="javascript:add_misc_item();"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" align="middle" alt="Add Item to Invoice">&nbsp;Add Item</a>
    <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark">&nbsp;Bookmark</a>
	{/if}	
	<a href="{$ROOT_URL}/index.php?page=billing_rates:search_billing_rates"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Billing Rates" align="middle">&nbsp;Billing Rates</a>	
    <a href="{$ROOT_URL}/index.php?page=service:load_all"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Flat Rate Services" align="middle">&nbsp;Flat Rate Services</a>   
	<a href="{$ROOT_URL}/index.php?page=payment_option:search_payment_option"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Payment Options" align="middle">&nbsp;Payment Options</a>
	<a href="{$ROOT_URL}/index.php?page=credit_card:search_credit_card"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Credit Cards" align="middle">&nbsp;Credit Cards</a>
	<a href="{$ROOT_URL}/index.php?page=tax_class:search_tax_class"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Tax Rates" align="middle">&nbsp;Tax Rates</a>
</div>

<!-- Products -->
<div id="dropmenu7" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=product:search_product"><img src="{$ROOT_URL}/images/icons/srch_16.gif" border="0" align="middle" alt="Search Products">&nbsp;Search Products</a>
	<a href="{$ROOT_URL}/index.php?page=product:add_product"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" align="middle" alt="Add Product">&nbsp;Add Products</a>
	<a href="{$ROOT_URL}/index.php?page=product_status:search_product_status"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Product Status" align="middle">&nbsp;Product Status</a>
    <a href="javascript:bookmark();"><img src="{$ROOT_URL}/images/icons/favs_16.gif" border="0" align="middle" alt="Bookmark">&nbsp;Bookmark</a>
</div>

<!-- Campaign -->
<div id="dropmenu8" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=campaign:search_campaign"><img src="{$ROOT_URL}/images/icons/srch_16.gif" border="0" align="middle" alt="Search Campaign">&nbsp;Search Campaigns</a>
	<a href="{$ROOT_URL}/index.php?page=campaign:add_campaign"><img src="{$ROOT_URL}/images/icons/add_16.gif" border="0" align="middle" alt="Add Campaign">&nbsp;Add Campaign</a>
	<a href="{$ROOT_URL}/index.php?page=campaign_type:search_campaign_type"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Campaign Types" align="middle">&nbsp;Campaign Types</a>
</div>

<!-- Setup -->
<div id="dropmenu9" class="dropmenudiv">
	<a href="{$ROOT_URL}/index.php?page=user:ajax_search_employees"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Employees" align="middle">&nbsp;Employees</a>
	<a href="{$ROOT_URL}/index.php?page=core:configure_address"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Configure Company" align="middle">&nbsp;Configure Company</a>
	<a href="{$ROOT_URL}/index.php?page=core:configure_logo"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Configure Logo" align="middle">&nbsp;Configure Logo</a>
	<a href="{$ROOT_URL}/index.php?page=core:configure_smtp"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Configure SMTP" align="middle">&nbsp;Configure SMTP</a>
		<a href="{$ROOT_URL}/index.php?page=core:configure_crm"><img src="{$ROOT_URL}/images/icons/apps_16.gif" border="0" alt="Configure CRM" align="middle">&nbsp;Configure CRM</a>
</div>


<script type="text/javascript">
	cssdropdown.startchrome("chromemenu")
</script>