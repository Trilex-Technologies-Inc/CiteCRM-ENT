<?php
	/**
* Type:     Cite CMS PHP Page<br>
	* Name:     delete_calendar.php<br>
	* Purpose:  delete a Single Calendar row<br>
	* 
	* @author Cite CMS Module Developer
	* @access Public
	* @version 1.0
	*/

	require(CLASS_PATH.'/core/calendar.class.php');

	$core->verifyAdmin();

$calendar = new calendar();

$calendar->delete_calendar($_REQUEST['calendar_id']);

$smarty->display('calendar/delete_calendar.tpl')

?>