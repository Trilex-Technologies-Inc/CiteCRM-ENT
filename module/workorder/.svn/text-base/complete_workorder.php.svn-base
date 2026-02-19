<?php
$core->verifyAdmin(CAN_EDIT);

require_once(CLASS_PATH."/core/workorder.class.php");

$workorderObj = new workorder();



if(isset($_REQUEST['submit'])) {
    require_once(CLASS_PATH."/core/invoice.class.php");
    require_once(CLASS_PATH."/core/workorder_service.class.php");

    $workorder_serviceObj = new workorder_service();

    $invoiceObj = new invoice();

    $Date_Month             = $_POST['Date_Month'];
    $Date_Day               = $_POST['Date_Day'];
    $Date_Year              = $_POST['Date_Year'];
    $workorder_close_by     = $_POST['user_id'];
    $workorder_resolution   = $core->prepare_post($_POST['workorder_resolution']);
    $workorder_id           = $_POST['workorder_id'];

    $workorder_close_date = mktime(0,0,0,$Date_Month,$Date_Day,$Date_Year);

    $workorderObj->set_completed($workorder_id,$workorder_close_date,$workorder_close_by,$workorder_resolution);



     $account_type      = $_POST['account_type'];
     $account_type_id   = $_POST['account_type_id'];

    // Service
    $service_array = $workorder_serviceObj->load_by_workorder($workorder_id,'workorder_service_id','ASC',0,0,&$total);
    if(!empty($service_array)) {
        foreach($service_array as $service) {
            $invoice_id                 = '0';
            $invoice_item_type          = 'Service';
            $invoice_item_type_id       = $service->get_workorder_service_id();
            $invoice_item_qty           = $service->get_workorder_service_qty();
            $invoice_item_amount        = $service->get_workorder_service_amount();
            $invoice_item_description   = $service->get_workorder_service_description();
            $invoice_item_line_type     = 'Debit';
            $invoice_item_subtotal      = $service->get_workorder_service_qty() * $service->get_workorder_service_amount();
            $invoice_item_date          = time();

            $invoice_item_id = $invoiceObj->add_line_item(
                            $invoice_id,
                            $invoice_item_date,
                            $account_type,
                            $account_type_id,
                            $invoice_item_type,
                            $invoice_item_type_id,
                            $invoice_item_qty,
                            $invoice_item_amount,
                            $invoice_item_description,
                            $invoice_item_line_type,
                            $invoice_item_subtotal
            );
            
            // map to workorder
            $invoiceObj->invoice_item_to_workorder($invoice_item_id,$workorder_id);
        }
    }
    

    // Labor Totals
    $labor_array = $workorderObj->load_labor_by_workorder($workorder_id);

    if(!empty($labor_array)) {
        foreach($labor_array as $labor) {
            // Add Invoice Item
            $invoice_id                 = '0';
            $invoice_item_type          = $labor->fields['workorder_time_labor_type'];
            $invoice_item_type_id       = $labor->fields['workorder_time_id'];
            $invoice_item_qty           = $labor->fields['workorder_time_total'];
            $invoice_item_amount        = $labor->fields['workorder_time_rate'];
            $invoice_item_description   = $labor->fields['workorder_time_description'];
            $invoice_item_line_type     = 'Debit';
            $invoice_item_subtotal      = $labor->fields['workorder_time_amount'];
            $invoice_item_date          = $labor->fields['workorder_time_start'];

            $invoice_item_id = $invoiceObj->add_line_item(
                            $invoice_id,
                            $invoice_item_date,
                            $account_type,
                            $account_type_id,
                            $invoice_item_type,
                            $invoice_item_type_id,
                            $invoice_item_qty,
                            $invoice_item_amount,
                            $invoice_item_description,
                            $invoice_item_line_type,
                            $invoice_item_subtotal
            );

            // map to workorder
            $invoiceObj->invoice_item_to_workorder($invoice_item_id,$workorder_id);
        }

    }

     // Part Totals
    $part_array = $workorderObj->load_parts_by_workorder($workorder_id);
    if(!empty($part_array)) {

        foreach($part_array as $part) {
            $invoice_id                 = '0';
            $invoice_item_type          = 'Product';
            $invoice_item_type_id       = $part->fields['product_id'];
            $invoice_item_qty           = $part->fields['product_to_workorder_qty'];
            $invoice_item_amount        = $part->fields['product_to_workorder_amount'];
            $invoice_item_description   = $part->fields['product_to_workorder_description'];
            $invoice_item_line_type     = 'Debit';
            $invoice_item_subtotal      = $part->fields['product_to_workorder_sub_total'];
            $invoice_item_date          = $part->fields['product_to_workorder_date'];

            $invoice_item_id = $invoiceObj->add_line_item(
                            $invoice_id,
                            $invoice_item_date,
                            $account_type,
                            $account_type_id,
                            $invoice_item_type,
                            $invoice_item_type_id,
                            $invoice_item_qty,
                            $invoice_item_amount,
                            $invoice_item_description,
                            $invoice_item_line_type,
                            $invoice_item_subtotal
            );

            // map to workorder
            $invoiceObj->invoice_item_to_workorder($invoice_item_id,$workorder_id);

        }



    }
    
    $core->force_page('index.php?page=workorder:view_workorder&workorder_id='.$workorder_id);

} else {

    require_once(CLASS_PATH."/core/company.class.php");
    require_once(CLASS_PATH."/core/company_address.class.php");
	require_once(CLASS_PATH."/core/user.class.php");
	require_once(CLASS_PATH."/core/user_address.class.php");
    require_once(CLASS_PATH."/core/workorder_service.class.php");

    $workorder_id = $_REQUEST['workorder_id'];

    $workorder_serviceObj = new workorder_service();

    $workorderObj->view_workorder($workorder_id);

    
	// Company	
	$company = new company();
	$company_address = new Company_Address();

	$company->load_company_by_workorder($workorder_id);	

	$company_address->load_by_company_id_and_type($company->get_company_id(),'Service');
	$smarty->assign('company', 	$company);
	$smarty->assign('company_address', 	$company_address);
	$smarty->assign('company_id',$company->get_company_id());	

	// User
	$user = new user();
	$user_address = new user_address();
	$user->load_user_by_workorder($workorder_id);
	
	if($user->getUserID() > 0 ) {
		$user_address->loadByAddressType($user_address_type,$accountID,$user->getUserID());
		$smarty->assign('user',$user);
		$smarty->assign('user_address',$user_address);
		$smarty->assign('user_id',$user-> getUserID());
	} 
	

    // Labor Totals
    $labor_array = $workorderObj->load_labor_by_workorder($workorder_id);

    $smarty->assign('labor_array',$labor_array);

    // Part Totals
    $part_array = $workorderObj->load_parts_by_workorder($workorder_id);

    $smarty->Assign('part_array',$part_array);

    $service_array = $workorder_serviceObj->load_by_workorder($workorder_id,'workorder_service_id','ASC',0,0,&$total);

    $smarty->assign('service_array',$service_array);

    $smarty->assign('workorderObj',$workorderObj);
    
    $smarty->display("workorder/ajax_completed.tpl");

}


?>