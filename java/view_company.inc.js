

{literal}

<script language="javascript" type="text/javascript">
function load_company_users() {
	urlVars = {
	}
	
	bodyVars = {
		country_id: document.getElementById("{/literal}{$company->get_company_id()}{/literal}").value
	}
	
	
	ajaxCaller.postVars("index.php?page=company:ajax_load_users", bodyVars, urlVars, onResponse,false, "a postVars request");
}

	
function on_company_response(text, headers, callingContext) {
	document.getElementById("company_user").innerHTML = text;
}


</script>