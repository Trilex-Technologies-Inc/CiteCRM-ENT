


	window.onload = function() {
	
		ajaxCaller.getPlainText("index.php?page=core:welcome&escape=1",displayPage); 
		
	}
	
	
	function loadPage(link) {
		ajaxCaller.getPlainText(link,displayPage); 
		
	}
		
	
	function displayPage(text) {	
		document.getElementById("page").innerHTML = text;
	}
	
	function loadUserPage(link){
		ajaxCaller.getPlainText(link,displayUserPage); 
		
	}
	
	function displayUserPage(text) {
		document.getElementById("userPages").innerHTML = text;
	}

	
	function getUserPicture(link){
		ajaxCaller.getPlainText(link,displayUserPicture);
	}
	
	function displayUserPicture(text) {
		document.getElementById("userPicture").innerHTML = text;
	}
	

	/* Gallery Functions */

	function submitAddNewGallery() {

		urlVars = {
			
		}
		
		bodyVars = {
			gallery_name: document.getElementById("gallery_name").value,
			command: document.getElementById("command").value,
			userID:  document.getElementById("userID").value
		}

		ajaxCaller.postVars("index.php?page=members:userGallery&escape=1", bodyVars, urlVars, onResponse,false, "a postVars request");
	}

	
	function onResponse(text, headers, callingContext) {
		document.getElementById("userPages").innerHTML = text;

	}
	
	
	