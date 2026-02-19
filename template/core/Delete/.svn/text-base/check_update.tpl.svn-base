{include file="core/header.tpl"}

<script language="javascript" type="text/javascript">
{literal}

function update() {
	var update_file = document.getElementById("update_file").value
	urlVars = {}
	bodyVars = {update_file:update_file,action:'download'}
	ajaxCaller.postVars('index.php?page=core:do_update', bodyVars, urlVars, on_response,false, "a postVars request");

}


function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}



{/literal}
</script>


<span class="greetUser">Check For Updates</span>

{if $errorMsg} {/if}


{if $update_avail == '1'}
<div id="contentBox">
<table cellpadding="3" cellspacing="0" class="small" >
	<tr>
		<td colspan="2"><b>{$msg}</b></td>
	</tr><tr>
		<td>Update Version</td>
		<td>CiteCRM-{$update_version}</td>
	</tr><tr>
		<td>Release Date</td>
		<td>{$update_date}</td>
	</tr><tr>
		<td colspan="2">
			<input type="hidden" id="update_file" value="{$update_file}">
			<input type="button" value="Update Now" onclick="update()">
			</td>	
	</tr>
</table>
{else}
<table cellpadding="3" cellspacing="0" class="small" width="100%">
	<tr>
		<td><b>{$msg}</b></td>
	</tr>
</table>
{/if}

</div>
{include file="core/footer.tpl"}