<?php

$search_type = $_POST['search_type'];
$search_text = $_POST['search_text'];


switch($search_type) {
    case 'company_name':
      
        require(CLASS_PATH.'/core/company.class.php');
        $companyObj = new company();
        $and .= " AND company_name LIKE  '%".$search_text."%'";
        $companyArray = $companyObj->search_company('company_id','ASC',$and,0,30,&$total);

        if(count($companyArray) > 1){
            $smarty->assign('companyArray',$companyArray);
            $smarty->display('company/seach_results.tpl');             
        } else {
    		if(empty($companyArray)){
				$core->force_page(ROOT_URL."/index.php?page=company:search_company");
			} else{
				$core->force_page(ROOT_URL."/index.php?page=company:view_company&company_id=".$companyArray[0]->fields['company_id']);
        
			}
        }
      
    break;

    case 'campaign_name':
    
		require(CLASS_PATH.'/core/campaign.class.php');
		$campaign = new campaign();
		$campaignArray = $campaign->search_campaign();
		$smarty->assign('campaignArray', $campaignArray);
		
    break;

    case 'user_name':

    break;

    case 'invoice_id':

    break;

    case 'lead_name':

    break;

    case 'product_name':

    break;

    case 'system_id':

    break;

    case 'workorder_id':

    break;
}



?>