<!-- help.tpl -->
<html>

<body marginwidth="1" marginheight="1" topmargin="1" bottommargin="1" leftmargin="1" rightmargin="1">

<table width="100%" border="0"  cellspacing="0" cellpadding="0" style=",font-family:Tahoma, Verdana, Arial, sans-serif;
    font-size:10px; border:1px solid #1c679f;" height="100%">
		<tr>
			<td width="100%" style="background-image : url('http://www.citecrm.com/images/theme/infoBoxHeading.gif');color : #FFFFFF;font-family : Myriad, Tahoma, Verdana, Arial, sans-serif;font-size : 14px;font-weight : bold;height:30px; padding:5px;border-bottom:1px solid #1c679f; ">On-Line Help: {$page}</td>
		</tr><tr>

			<td  nowrap height="100%" valign="top">
		
				<table border="0" width="100%" cellspacing="0" cellpadding="0" style="background: #FFFFFF; font-family:Tahoma, Verdana, Arial, sans-serif; font-size: 10px;">
					<tr>
						<td style="padding:5px;" valign="top" height="100%">
                            <b>Title:</b> {$page}<br>
                            <b>Chapter:</b> {$chapter}<br>
                            {$contents}
                            {$html}
                        </td>
					</tr>
				</table>
	
                <center> <a href="{$ROOT_URL}/index.php?page=core:help_contents" style="font-family:Tahoma,Verdana;font-size:11px; color:#5CA0C7; text-decoration:none;">-- Contents --</a></center> 
			</td>
		</tr><tr>
			<td  style="border-top:1px solid #1c679f; background:#C3D9EA; font-family:Tahoma, Verdana, Arial, sans-serif; font-size:10px;">&nbsp;Last Modified {$last_modified}</td>
		</tr>
</table>
</body>
</html>