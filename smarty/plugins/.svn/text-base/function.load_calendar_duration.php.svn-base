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
function smarty_function_load_calendar_duration($params, &$smarty) {
	$sy= $params['sy'];
	$smo=$params['smo'];
	$sd=$params['sd'];
	$sh=$params['sh'];
	$sm=$params['sm'];
	
	$ey=$params['ey'];
	$emo=$params['emo'];
	$ed=$params['ed'];
	$eh=$params['eh'];
	$em=$params['em'];

	$actualstarttime = mktime($sh, $sm, 0, $smo, $sd, $ey);

	$actualendtime	 = mktime($eh, $em, 0, $emo, $sd, $sy);

	if($actualstarttime > $actualendtime) {
		return 'Error';
	}

	$duration = $actualendtime - $actualstarttime;
	$hours = (int) ($duration / 3600);
	$duration -= $hours * 3600;
	$mins = (int) ($duration / 60);
	$secs = $duration - ($mins * 60);

	$totalhours = sprintf("%02d:%02d", $hours, $mins);

	return $totalhours;

	


}
?>