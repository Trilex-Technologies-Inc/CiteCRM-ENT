<!-- search_product -->
{include file="core/header.tpl"}
<script language="javascript" type="text/javascript">
{literal}

    function load_parts(categoryId,field,sort,next) {	
        display_progress() 
        urlVars = {}
        bodyVars = {parent_id:categoryId,field:field,sort:sort,next:next}
        ajaxCaller.postVars("index.php?page=product:ajax_search_product", bodyVars, urlVars, on_response,false, "a postVars request");
    }

function load_part_details(product_id,parent_id,category_id){
     
    display_progress() 
    urlVars = {}
    ajaxCaller.postVars("index.php?page=product:view_product&product_id="+product_id+"&parent_id="+parent_id+"&category_id="+category_id, bodyVars, urlVars, on_response,false, "a postVars request");
   
    
}

function load_activity(activity) {
    var product_id = document.getElementById("product_id").value;
    clear_tbs(activity);
    display_detail_progress()
    switch (activity) {
        case 'Description':
            ajaxCaller.postVars("index.php?page=product:ajax_load_description&product_id="+product_id, bodyVars, urlVars, on_details_response,false, "a postVars request");
        break;
        case 'Specifications':
             ajaxCaller.postVars("index.php?page=product:ajax_load_specifications&product_id="+product_id, bodyVars, urlVars, on_details_response,false, "a postVars request");
        break;
        case 'Sales':
            ajaxCaller.postVars("index.php?page=product:ajax_load_sales&product_id="+product_id, bodyVars, urlVars, on_details_response,false, "a postVars request");
        break;
        case 'Manufacture':
            ajaxCaller.postVars("index.php?page=product:ajax_load_manufacture&product_id="+product_id, bodyVars, urlVars, on_details_response,false, "a postVars request");
        break;
    }   
}

function edit_description() {
    var product_id = document.getElementById("product_id").value;
    clear_tbs('Description');
    display_detail_progress();
    bodyVars = {}
    urlVars = {}
    ajaxCaller.postVars("index.php?page=product:ajax_edit_description&product_id="+product_id, bodyVars, urlVars, on_details_response,false, "a postVars request");
}

function update_description() {
    var product_description_id = document.getElementById("product_description_id").value;
    var product_url = document.getElementById("product_url").value;
    var product_description = document.getElementById("product_description").value;
    var product_name = document.getElementById("product_name").value;
    var error = false;
	var errorMsg = 'There where errors saving your Product\n';

    if(document.getElementById("product_name").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Product Name! --\n';
        document.getElementById("product_name").className='formError';
    }

    if(document.getElementById("product_description").value == "") {
        error = true;
        errorMsg = errorMsg + '-- Please provide the Product Description! --\n';
        document.getElementById("product_description").className='formError';
    }
    

    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Product';
		alert(errorMsg);       
    } else {
        urlVars = {}
        bodyVars = {product_description_id:product_description_id,product_url:product_url,product_description:product_description,product_name:product_name,submit:'submit'}
        ajaxCaller.postVars("index.php?page=product:ajax_edit_description&product_id="+product_id, bodyVars, urlVars, on_details_response,false, "a postVars request");
        alert('Product Description was Saved');
        load_activity('Description');
    }

}

function edit_specifications() {
    var product_id = document.getElementById("product_id").value;
    clear_tbs('Description');
    display_detail_progress();
    bodyVars = {}
    urlVars = {}
    ajaxCaller.postVars("index.php?page=product:ajax_edit_specifications&product_id="+product_id, bodyVars, urlVars, on_details_response,false, "a postVars request");

}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function on_details_response(text, headers, callingContext) {
    document.getElementById("detailBox").innerHTML = text;
}

// Progress windows
function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src=/images/theme/progressbar1.gif align=middle>";
}
function display_detail_progress() {
	document.getElementById("detailBox").innerHTML = "Loading <img src=/images/theme/progressbar1.gif align=middle>";
}

function clear_tbs(activity) {
	document.getElementById('Description').className='other';
	document.getElementById('Specifications').className='other';
	document.getElementById('Notes').className='other';
    document.getElementById('Sales').className='other';
    document.getElementById('Manufacture').className='other';
	document.getElementById(activity).className='current';
}

{/literal}
</script>

<body onload="load_parts()">

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Browse Parts</a></li>
</ul>
<div id="contentBox"><br></div>

{include file="core/footer.tpl"}
