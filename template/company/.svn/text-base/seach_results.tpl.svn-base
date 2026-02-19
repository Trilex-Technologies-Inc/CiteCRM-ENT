<!-- seach_results.tpl -->
{include file="core/header.tpl"}
{literal}
<script language="javascript" type="text/javascript">

function load_window(field,sort,next) {
	var company_name		= document.getElementById("company_name").value;
	var company_active		= document.getElementById("company_active").value;
	var company_create_date = document.getElementById("company_create_date").value;
	
	display_progress();
	urlVars = {}
	bodyVars = {field:field,sort:sort,next:next,company_name:company_name,company_active:company_active,company_create_date:company_create_date}
	ajaxCaller.postVars("{/literal}{$ROOT_URL}{literal}/index.php?page=company:ajax_search_company", bodyVars, urlVars, on_response,false, "a postVars request");
}

function load_search_box() {
	searchWindow=dhtmlmodal.open('searBox', 'div', 'search_box', 'Search Accounts', 'width=400px,height=160px,center=1,resize=1,scrolling=1');
}

function search_company(field,sort,next) {
	parent.searchWindow.hide();
	load_window(field,sort,next)
}

// AJAX Responses
function on_response(text, headers, callingContext) {
	document.getElementById("contentBox").innerHTML = text;
}

function display_progress() {
	document.getElementById("contentBox").innerHTML = "Loading <img src={/literal}{$ROOT_URL}{literal}/images/theme/progressbar1.gif align=middle>";
}
</script>
{/literal}

<div id="search_box" style="display:none; background-color: #ECECEC;">
<span class="greetUser">Search</span>
<table cellpadding="5" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Name</td>
		<td class="fieldValue"><input type="text" name="company_name" id="company_name" size="40"></td>
	</tr><tr>
		<td class="formAreaTitle">Active</td>
		<td class="fieldValue">{html_select_yesno fieldName="company_active" value=1}</td>
	</tr><tr>
		<td class="formAreaTitle">Date Created</td>
		<td class="fieldValue"><input type="text" name="company_create_date" id="company_create_date" size="10"></td>
	</tr>
		<td class="formAreaTitle"><input type="button" name="search" value="Search" onclick="search_company('company_id','ASC','1')"></td>
		<td class="fieldValue"></td>
	</tr>
</table>
</div>

<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Search for Account</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" ><a href="javascript:load_search_box()">Search</a> <a href="{$ROOT_URL}/index.php?page=company:add_company">Add Account</a></td>
					<td>
					</td>
				</tr>
			</table>
		</d>
	</tr>
</table>

<br>	
<div id="contentBox">
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
    <tr>
        <td width="100%" class="productListing-heading">
            {if $sort == 'DESC' && $field == 'company_name'}
                <img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('company_name','ASC','{$next}')" style="cursor:pointer">Name</span>
            {else}
                <img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('company_name','DESC','{$next}')" style="cursor:pointer">Name</span>
            {/if}
        </td>
        <td width="100" nowrap class="productListing-heading">
            {if $sort == 'DESC' && $field == 'company_type'}
                <img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('company_type','ASC','{$next}')" style="cursor:pointer">Type</span>
            {else}
                <img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('company_type','DESC','{$next}')" style="cursor:pointer">Type</span>
            {/if}
        </td>
        <td width="70" nowrap class="productListing-heading">
            {if $sort == 'DESC' && $field == 'company_create_date'}
                <img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('company_create_date','ASC','{$next}')" style="cursor:pointer">Created</span>
            {else}
                <img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('company_create_date','DESC','{$next}')" style="cursor:pointer">Created</span>
            {/if}
        </td>
        <td width="70" nowrap class="productListing-heading">
            {if $sort == 'DESC' && $field == 'company_active'}
                <img src="{$ROOT_URL}/images/icons/sort_desc.gif"> <span onclick="load_window('company_active','ASC','{$next}')" style="cursor:pointer">Active</span>
            {else}
                <img src="{$ROOT_URL}/images/icons/sort_asc.gif"> <span onclick="load_window('company_active','DESC','{$next}')" style="cursor:pointer">Active</span>
            {/if}
        </td>
    </tr>
    {foreach from=$companyArray item=company}
    <tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" onDblClick="window.location='{$ROOT_URL}/index.php?page=company:view_company&company_id={$company->get_company_id()}';">
        <td class="productListing-data" {if $field == 'company_name'} style="background-color: #ECECEC;"{/if}>{$company->get_company_name()}</td>
        <td class="productListing-data" {if $field == 'company_website'} style="background-color: #ECECEC;"{/if} nowrap>{$company->get_company_type()}</td>
        <td class="productListing-data" {if $field == 'company_create_date'} style="background-color: #ECECEC;"{/if}>{$company->get_company_create_date()|date_format:$DATE_FORMAT}</td>
        <td class="productListing-data" {if $field == 'company_active'} style="background-color: #ECECEC;"{/if}>{$company->get_company_active()|yesno}</td>
    </tr>
    {foreachelse}
    <tr>
        <td class="productListing-data" colspan="6">No Results Found</td>
    </tr>
    {/foreach}
    <tr>
</table>
</div>
{include file="core/footer.tpl"}