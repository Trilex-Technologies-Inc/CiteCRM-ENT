<?php
$html ='

<img src="images/theme/logo.jpg"  width="50%" >

<br><br>

<table width="100%" border="1" cellpadding="0" cellspacing="0" >
	<tr>
		<td width="25%"></td>
		<td width="50%">TECHNICIAN COPY<br> Work Order ID# '.$workorder->get_workorder_id().'</td>
		<td width="25%"></td>
	</tr><tr>
		<td width="25%"><center>Service Location</center></td>
		<td width="50%"><center>Service Details</center></td>
		<td width="25%"><center>Summary</center></td>
	</tr><tr>
		<td width="25%" valign="top">
			<br>
			'.$company->get_company_name().'<br>
			
			
			<br><br>
			
			Company Contact
			<br>			
			'.SITE_NAME.'<br>
			'.COMPANY_STREET_1.'<br>
			'.COMPANY_CITY.', '.COMPANY_STATE.' '.COMPANY_POSTAL_CODE.'<br>
			'.COMPANY_PHONE.'<br>
			'.COMPANY_EMAIL.'<br>
			'.ROOT_URL.'
		</td>
		<td width="50%" valign="top">
			<br>
			Desription:
			<br>
			'.$workorder->get_workorder_desription().'
			
			
		</td>
		
		<td width="25%" valign="top" align="left" style="FONT-SIZE:x-small">
			<br>
			Opened: '.date("Y-m-d",$workorder->get_workorder_open_date()).'
			<br>
			Status: '.$workorder->get_workorder_status().'<br>
			Tech :'.$workorder->get_workorder_assigned_to().'<br>
			Last Change: '.$workorder->get_last_modified().'</font>
		</td>
	</tr>
</table>

This Work Order is confidential and contains privileged information.
';
?>
