<!-- home -->
<!-- loginFrm -->
<!DOCTYPE html PUBLIC "-//w3c//dtd html 4.0 transitional//en">
<html dir="LTR" lang="en">
<head>
    
    <title>{$core->getPageTitle()}</title>
    <link rel="stylesheet" type="text/css" href="{$CSS_URL}/default.css">
    </head>

<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td class="logo"><img src="{$ROOT_URL}/images/{$COMPANY_LOGO}"></td>
    </tr>
</table



<br>
<br>
<br>
<form method ="POST" action="{$ROOT_URL}/index.php?page=user:login_user&from={$from}" id="user_login">
<center><span class="greetUser" align="center">Please Login</span></center>                
<table cellpadding="2" cellspacing="2" class="formArea" align="center">
    <tr>
        <td class="formAreaTitle" nowrap>Email Address</td>
        <td class="fieldValue"><input type="text" name="user_email" size="20" value="{$user_email}"></td>
    </tr><tr>
        <td class="formAreaTitle">Password</td>
        <td class="fieldValue"><input type="password" name="user_password" size="20"></td>
    </tr><tr>
        <td class="fieldValue">
            <input type="submit" name="submit" value="Submit">
        </td>
        <td class="fieldValue">
            {if $company_dir == 'demo'}
                <span class="small"><b>Login:</b> demo@citecrm.com<br><b>Password:</b> citecrm</span>
            {/if}
            {if $errorMsg}
                <span style="color:red">{$errorMsg}</span>
            {/if}
        </td>
    </tr>
</table>
</form>


<p align="center"> <a href="{$ROOT_URL}/index.php?page=user:lost_password">Lost Password</a></p>

