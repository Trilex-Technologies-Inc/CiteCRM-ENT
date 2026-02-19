


function load_state() {

	urlVars = {
			
	}
	
	bodyVars = {
		country_id: document.getElementById("").value
	}
	
	ajaxCaller.postVars("index.php?page=members:userGallery&escape=1", bodyVars, urlVars, onResponse,false, "a postVars request");


}


function loadShippingState() {

	urlVars = {
			
	}
	
	bodyVars = {
		country_id: document.getElementById("").value
	}
	
	ajaxCaller.postVars("index.php?page=members:userGallery&escape=1", bodyVars, urlVars, onResponse,false, "a postVars request");


}