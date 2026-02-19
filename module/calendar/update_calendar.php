<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     update_calendar.php<br>
	* Purpose:  Update a Single Calendar row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	$core->verifyAdmin();
	require(CLASS_PATH.'/core/calendar.class.php');


// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new calendar
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$calendar = new calendar();
			$calendar->update_calendar($_REQUEST);
			$core->force_page("index.php?page=calendar:view_calendar&calendar_id=".$_REQUEST['calendar_id']);
		} else {
			// error, redraw the form
			$smarty->assign("errorOccurred",true);
			$smarty->assign($_POST);
			$smarty->display('calendar/update_calendar_frm.tpl');
		}
} else {
	// Display the Form

$calendar = new calendar();
$calendar->view_calendar($_REQUEST['calendar_id']);

	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('update_calendar_frm');

$smarty->assign('calendar',$calendar);
$smarty->display('calendar/update_calendar_frm.tpl');
}
?>