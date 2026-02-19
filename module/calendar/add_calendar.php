<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     add_calendar.php<br>
	* Purpose:  Add New Calendar<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

require(CLASS_PATH.'/core/calendar.class.php');
$calendar = new calendar();

$core->verifyAdmin();

// If form Submission
if(isset($_REQUEST['submit']) ) {
	// Conect to smarty validator
	SmartyValidate::connect($smarty);
		// If valid Post Disconect and add new calendar
		if(SmartyValidate::is_valid($_POST)) {
			SmartyValidate::disconnect();
			$calendar_id = $calendar->add_calendar($_REQUEST);
			$core->force_page("index.php?page=calendar:view_calendar&calendar_id=".$calendar_id);
		} else {
			// error, redraw the form
			$smarty->assign($_POST);
			$smarty->assign("errorOccurred",true);
			$smarty->display('calendar/add_calendar_frm.tpl');
		}
} else {
	// Display the Form
	SmartyValidate::connect($smarty, true);
	SmartyValidate::register_form('new_calendar_frm');
	$smarty->display('calendar/add_calendar_frm.tpl');
}
?>