<!-- reset_password.tpl -->
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
{if $complete}
    <table cellpadding="6" cellspacing="2" class="formArea" align="center">
            <tr>
               <td class="fieldValue">
                    Your Password has been reset. Please go to the login page and verify you can login.
                </td>
            </tr>
        </table>
{else}
    {if $sucess}
	    <form method ="POST" action="{$ROOT_URL}/index.php?page=user:reset_password">
	    <center><span class="greetUser" align="center">Reset Password</span></center>                
	    <table cellpadding="2" cellspacing="2" class="formArea" align="center">
	        <tr>
	            <td class="formAreaTitle" nowrap>Password</td>
	            <td class="fieldValue"><input type="password" name="password" size="20" value=""></td>
	        </tr><tr>
	            <td class="formAreaTitle" nowrap>Verify Password</td>
	            <td class="fieldValue"><input type="password" name="verify_password" size="20" value=""></td>
	        </tr><tr>
	            <td class="fieldValue">
	                <input type="hidden" name="code" value="{$code}">
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
    {else}
	    <form method ="POST" action="{$ROOT_URL}/index.php?page=user:reset_password">
	    <center><span class="greetUser" align="center">Reset Password</span></center>                
	    <table cellpadding="2" cellspacing="2" class="formArea" align="center">
	        <tr>
	            <td class="formAreaTitle" nowrap>Reset Code</td>
	            <td class="fieldValue"><input type="text" name="code" size="40" value="{$code}"></td>
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
{/if}


