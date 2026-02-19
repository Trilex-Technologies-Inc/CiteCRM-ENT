<?php
/**
 * Smarty plugin
 * @package CiteCMS
 * @subpackage plugins
 */


/**
 * Smarty {display_box_top} plugin
 *
 * Type:     function<br>
 * Name:     display_box_top<br>
 * Purpose:  displays the default box top with title<br>
 * 
 * @author jaimie@citesoftware.com
 * @param array title The  title of the box
 * @param Smarty
 * @return string header htm including meta tags
 *
 */



function smarty_function_display_box_top($params, &$smarty){

$html .= '
	
	<table width="100%" border="0"  cellspacing="0" cellpadding="0" class="infoBox" >
		<tr>
			<td width="100%" class="infoBoxHeading">'.$params['title'].'</td>
		</tr><tr>

			<td style="border-top: 1px solid #1c679f" nowrap>
		
				<table border="0" width="100%" cellspacing="0" cellpadding="0" class="infoBoxContents" height="365">
					<tr>
						<td class="boxText" valign="top">';
											
	return $html;
											


}

?>