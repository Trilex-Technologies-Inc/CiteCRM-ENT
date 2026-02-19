<?php
/**
 * Type:     Cite CMS PHP Page<br>
 * Name:     ajax_load_today.php<br>
 * Purpose:  Loads a users Daily Calendar<br>
 * 
 * @author Cite CMS Module Developer
 * @access Public
 * @version 1.0
*/
$core->verifyAdmin();

require_once(CLASS_PATH."/core/calendar.class.php");

$calendarObj = new calendar();

$view_24 = $_POST['view_24'];

$today = date("m")."-".date("d")."-".date("Y");



if($view_24 == false) {
	$startHour = COMPANY_START_HOUR;
	$endHour = COMPANY_END_HOUR;
} else {
	$startHour = 0;
	$endHour = 23;
}

$html ="<table border=\"1\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" class=\"productListing\">\n".
 			"<tr>\n".
     			"<td class=\"productListing-data\" align=\"center\" colspan=\"2\" style=\"background-color: #F0F8FF\"><b>$today</b></td>\n".
			"</tr>\n";

$hour = $startHour;
$min_inc = 15;

$style = false;

while($hour <= $endHour) {

	$calArray = $calendarObj->load_by_hour($_SESSION['SESSION_USER_ID'],$startHour,date("m"),date("d"),date("Y"));

	$html .= "<tr>\n".
				"<td width=\"25\" class=\"productListing-data\" valign=\"top\" style=\"background-color: #F0F8FF\">$startHour:00</td>\n".
				"<td class=\"productListing-data\">\n";
				// Loop Min
				$startMin = 0;
				$html .= "<table border=\"1\" cellpadding=\"2\" cellspacing=\"0\" width=\"100%\" class=\"productListing\">\n";

				while($startMin <= 60){
					foreach($calArray as $cal){
						if($cal->fields['calendar_min'] == $startMin && $cal->fields['calendar_type'] == 'start') {
							$style = true;
							$title = $cal->fields['calendar_title'];
						}
	
						if($cal->fields['calendar_min'] == $startMin && $cal->fields['calendar_type'] == 'end') {
							$style = false;
							$title = "";
						}

					}
				

					if($startMin != 0 && $startMin != 60) {
			
					$html .= "<tr>".
								"<td width=\"25\" class=\"productListing-data\" valign=\"top\">$startHour:$startMin</td>".
								"<td class=\"productListing-data\"";
									if(	$style) {
										$html .= " style=\"background-color: #F0F8FF; border-color:#FFFFFF\"";
									}							

					$html .=	"><center><b>$title</b></center>";
									
					$html .= "</td>".
							"</tr>";
					}
				
					$startMin = $startMin + $min_inc;
				}					


				$html .= "</table>";


	$html .=	"</td>\n".
			"</tr>\n";

	$startHour++;
	$hour++;
}




$html .=	"</table>\n";





$smarty->assign('html',$html);

$smarty->display('user/ajax_load_today.tpl');


?>