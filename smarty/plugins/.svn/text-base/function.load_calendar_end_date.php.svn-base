<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {html_select_state} function plugin
 *
 * Type:     function<br>
 * Name:     html_select_state<br>
 * Purpose:  Prints the dropdowns for state selection
 * @link http://www.citesoftware.com
 * @author Jaimie Garner jaimie@citesoftware.com
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_load_calendar_end_date($params, &$smarty) {

	
	require_once(CLASS_PATH."/core/calendar.class.php");

	$calendarObj = new calendar();

	$calendarObj->load_calendar_end_date($params['id']);

	$smarty->assign('endMonth',  $calendarObj->get_calendar_month());

	$smarty->assign('endDay', $calendarObj->get_calendar_day());

	$smarty->assign('endYear', $calendarObj->get_calendar_year());

	$smarty->assign('endHour', $calendarObj->get_calendar_hour());

	$smarty->assign('endMin', $calendarObj->get_calendar_min());

}
?>