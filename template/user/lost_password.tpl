<!-- lost_password.tpl -->
<!DOCTYPE html PUBLIC "-//w3c//dtd html 4.0 transitional//en">
<html dir="LTR" lang="en">
<head>
    
    <title>{$core->getPageTitle()}</title>
    <link rel="stylesheet" type="text/css" href="{$CSS_URL}/default.css">
    {literal}
	<script language="javascript" type="text/javascript">
	    function hide_box	() {
		document.getElementById("box").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
		}
	</script>
	{/literal}
    </head>


<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="logo"><img src="{$ROOT_URL}/images/theme/logo.jpg"></td>
    </tr>
</table



<br>
<br>
<br>
{if $sucsess}
	<table cellpadding="6" cellspacing="2" class="formArea" align="center" width="400">
    	<tr>
    		<td class="fieldValue">We have sent a Password Reset link to {$user_email} with instructions on how to reset your password. 
				You have 2 hours till the link expires. If you can not reset your password or you did not recieve the email please contact our support team at (503) 946-6926.
			</td>
		</tr>
	</table>
{else}
<div id="box">
	<form method ="POST" action="{$ROOT_URL}/index.php?page=user:lost_password">
	<center><span class="greetUser" align="center">Reset Password</span></center>                
	<table cellpadding="2" cellspacing="2" class="formArea" align="center">
	    <tr>
	        <td class="formAreaTitle" nowrap>Email Address</td>
	        <td class="fieldValue"><input type="text" name="user_email" size="20" value="{$user_email}"></td>
	    </tr><tr>
	        <td class="fieldValue">
	            <input type="submit" name="submit" value="Submit">
	        </td>
	    </tr>
	    {if $errorMsg}
	    <tr>
	    	<td class="fieldValue" colspan="2"><span class="error">{$errorMsg}</span></td>
	    </tr>
		{/if}
	</table>
	</form>
	</div>
{/if}



