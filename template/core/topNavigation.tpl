 

{if $SESSION_USER_ID == ""}
	<img src="{$ROOT_URL}/images/theme/b-1.gif" align="absmiddle"><a href="{$ROOT_URL}/index.php?page=user:login_user" style="color:#737373;text-decoration:none">Login</a>
{else}
	<img src="images/theme/b-1.gif" align="absmiddle"><a href="{$ROOT_URL}/index.php?action=logout" style="color:#737373;text-decoration:none">Logout</a>
	
{/if}

<div id="sessBox"></div>		

