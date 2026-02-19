<!-- adminNewModuleFrm -->
{include file="core/header.tpl"}

{literal}
						
<script type="text/javascript">
function addRowToTable(){
  var tbl = document.getElementById('fields');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  row.setAttribute('class', 'fieldValue')
  cellLeft.appendChild(textNode);
  
   // Field Name
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('name', 'field['+iteration+'][name]');
  el.setAttribute('id', 'field['+iteration+'][name]');
  el.setAttribute('size', '20');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
  
  
  // Field type
  var cellRightSel = row.insertCell(2);
  var sel = document.createElement('select');
  sel.setAttribute('name', 'field['+iteration+'][type]');
   sel.options[0] = new Option('VARCHAR','VARCHAR');
	sel.options[1] = new Option('TINYINT','TINYINT');
	sel.options[2] = new Option('TEXT','TEXT');
	sel.options[3] = new Option('DATE','DATE');
	sel.options[4] = new Option('SMALLINT','SMALLINT');
	sel.options[5] = new Option('MEDIUMINT','MEDIUMINT');
	sel.options[6] = new Option('INT','INT');
	sel.options[7] = new Option('BIGINT','BIGINT');
	sel.options[8] = new Option('FLOAT','FLOAT');
	sel.options[9] = new Option('DOUBLE','DOUBLE');
	sel.options[10] = new Option('DECIMAL','DECIMAL');
	sel.options[11] = new Option('DATETIME','DATETIME');
	sel.options[12] = new Option('TIMESTAMP','TIMESTAMP');
	sel.options[13] = new Option('TIME','TIME');
	sel.options[14] = new Option('YEAR','YEAR');
	sel.options[15] = new Option('CHAR','CHAR');
	sel.options[16] = new Option('TINYBLOB','TINYBLOB');
	sel.options[17] = new Option('TINYTEXT','TINYTEXT');
	sel.options[18] = new Option('BLOB','BLOB');
	sel.options[19] = new Option('MEDIUMBLOB','MEDIUMBLOB');
	sel.options[20] = new Option('MEDIUMTEXT','MEDIUMTEXT');
	sel.options[21] = new Option('LONGBLOB','LONGBLOB');
	sel.options[22] = new Option('LONGTEXT','LONGTEXT');
	sel.options[23] = new Option('ENUM','ENUM');
	sel.options[24] = new Option('SET','SET');
	sel.options[25] = new Option('BOOL','BOOL');
	sel.options[26] = new Option('BINARY','BINARY');
	sel.options[27] = new Option('VARBINARY','VARBINARY');
  sel.setAttribute('class', 'fieldValue');
  cellRightSel.appendChild(sel);


	// Length
 var cellRight = row.insertCell(3);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('name', 'field['+iteration+'][length]');
  el.setAttribute('id', 'field['+iteration+'][length]');
  el.setAttribute('size', '8');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
  
   // Field Extra
  var cellRightSel = row.insertCell(4);
  var sel = document.createElement('select');
  sel.setAttribute('name', 'field['+iteration+'][extra]');
  sel.options[0] = new Option('','');
  sel.options[1] = new Option('auto_increment','auto_increment');
  sel.setAttribute('class', 'fieldValue');
  cellRightSel.appendChild(sel);
  
  // Default
  var cellRight = row.insertCell(5);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('name', 'field['+iteration+'][default]');
  el.setAttribute('id', 'field['+iteration+'][default]');
  el.setAttribute('size', '20');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
  
  
  // Translate
 var cellRight = row.insertCell(6);
  var el = document.createElement('input');
  el.setAttribute('type', 'text');
  el.setAttribute('name', 'field['+iteration+'][translate]');
  el.setAttribute('id', 'field['+iteration+'][translate]');
  el.setAttribute('size', '20');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
  
  // Input type
  var cellRightSel = row.insertCell(7);
  var sel = document.createElement('select');
  sel.setAttribute('name', 'field['+iteration+'][inputType]');
  sel.options[0] = new Option('Text','text');
  sel.options[1] = new Option('Password','password');
  sel.options[2] = new Option('Check Box','checkbox');
  sel.options[3] = new Option('Radio','radio');
  sel.options[4] = new Option('File','file');
  sel.options[5] = new Option('Hidden','hidden');
  sel.options[6] = new Option('Image','image');
  sel.options[7] = new Option('Button','button');
  
   sel.setAttribute('class', 'fieldValue');
  cellRightSel.appendChild(sel);
  
  // Validate
  var cellRightSel = row.insertCell(8);
  var sel = document.createElement('select');
  sel.setAttribute('name', 'field['+iteration+'][validate]');
  sel.options[0] = new Option('','');
  sel.options[1] = new Option('Not Null','notEmpty');
  sel.options[2] = new Option('CC Exp Date', 'isCCExpDate');
  sel.options[3] = new Option('CC Num', 'isCCNum');
  sel.options[4] = new Option('Date', 'isDate');
  sel.options[5] = new Option('Email', 'isEmail');
  sel.options[6] = new Option('Float', 'isFloat');
  sel.options[7] = new Option('Int', 'isInt');
  sel.options[8] = new Option('Number','isNumber');
  sel.options[9] = new Option('Price', 'isPrice');
  sel.options[10] = new Option('URL', 'isURL');
  
  sel.setAttribute('class', 'fieldValue');
  cellRightSel.appendChild(sel);
  

  
  // Index
  var cellRight = row.insertCell(9);
  var el = document.createElement('input');
  el.setAttribute('type', 'radio');
  el.setAttribute('name', 'field['+iteration+'][key]');
  el.setAttribute('id', 'field['+iteration+'][key]');
  el.setAttribute('value', 'index');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
  
  // Unique
  var cellRight = row.insertCell(10);
  var el = document.createElement('input');
  el.setAttribute('type', 'radio');
  el.setAttribute('name', 'field['+iteration+'][key]');
  el.setAttribute('id', 'field['+iteration+'][key]');
  el.setAttribute('value', 'unique');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
  
  var cellRight = row.insertCell(11);
  var el = document.createElement('input');
  el.setAttribute('type', 'radio');
  el.setAttribute('name', 'field['+iteration+'][key]');
  el.setAttribute('id', 'field['+iteration+'][key]');
  el.setAttribute('value', '');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
  
  // Full Text
  var cellRight = row.insertCell(12);
  var el = document.createElement('input');
  el.setAttribute('type', 'checkbox');
  el.setAttribute('name', 'field['+iteration+'][fullText]');
  el.setAttribute('id', 'field['+iteration+'][ftranslateullText]');
  el.setAttribute('value', '1');
  el.setAttribute('class', 'fieldValue');
  cellRight.appendChild(el);
}



function keyPressTestLabor(e, obj){
  var validateChkb = document.getElementById('chkValidateOnKeyPress');
  if (validateChkb.checked) {
    var displayObj = document.getElementById('spanOutput');
    var key;
    if(window.event) {
      key = window.event.keyCode; 
    }
    else if(e.which) {
      key = e.which;
    }
    var objId;
    if (obj != null) {
      objId = obj.id;
    } else {
      objId = this.id;
    }
    displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
  }
}

function removeRowFromTable(){
  var tbl = document.getElementById('fields');
  var lastRow = tbl.rows.length;
  if (lastRow > 1) tbl.deleteRow(lastRow - 1);
}


function validateRowLabor(frm){
  var chkb = document.getElementById('chkValidate');
  if (chkb.checked) {
    var tbl = document.getElementById('fields');
    var lastRow = tbl.rows.length - 1;
    var i;
    for (i=1; i<=lastRow; i++) {
      var aRow = document.getElementById('txtRow' + i);
      if (aRow.value.length <= 0) {
        alert('Row ' + i + ' is empty');
        return;
      }
    }
  }
  openInNewWindow(frm);
}

</script>
{/literal}

			
<span class="greetUser">Develop New Module</span>
<form method ="POST" action="/index.php?page=module:adminNewModule" id="new_module_frm">

	<table cellpadding="5" cellspacing="0" class="formArea" >
		<tr>
			<td class="formAreaTitle"><span class="inputRequirement">*</span> Module Name</td>
			<td class="fieldValue" colspan="2"><input name="moduleName" value="{$moduleName}" size="20">
				{validate id="moduleName"  message="<br><span class=\"errorText\">The Module Name already Exists!</span>"}
			</td>
		</tr><tr>
			<td class="formAreaTitle"><span class="inputRequirement">*</span> Module Translate</td>
			<td class="fieldValue" colspan="2"><input name="moduleTranslateName" value="{$moduleTranslateName}" size="20">	
				{validate id="moduleTranslateName"  message="<br><span class=\"errorText\">Please Provide a Module Translate Name!</span>"}
				
			</td>
		</tr><tr>
			<td class="formAreaTitle" colspan="3">Menu</td>
		</tr><tr>
			<td class="formAreaTitle">Admin</td>
			<td class="formAreaTitle">User</td>
			<td class="formAreaTitle">Public</td>
		</tr><tr>
			<td class="fieldValue"><input type="checkbox" name="moduleAdminMenu" value="1" {if $moduleAdminMenu == "1"} checked {/if}></td>
			<td class="fieldValue"><input type="checkbox" name="moduleUserMenu" value="1" {if $moduleUserMenu == "1"} checked {/if}></td>
			<td class="fieldValue"><input type="checkbox" name="modulePublicMenu" value="1" {if $modulePublicMenu == "1"} checked {/if}></td>
	</table>
	
	<br>
	
	{validate id="field"  message="<br><span class=\"errorText\">There was an error creating table!</span><br>"}
	{if $sqlError != ""}
		<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
			<tr>
				<td class="infoBoxNoticeContents">
					<p>Mysql: {$sqlError}</p>
					<p>SQL: {$sql}
				
				</td>
			</tr>
		</table>	
		<br>
	{/if}
	
	<span class="greetUser">Fields</span>
	<table cellpadding="3" cellspacing="0" class="formArea" id="fields">
		<tr>
			<td class="formAreaTitle">#</td>
			<td class="formAreaTitle">Field</td>
			<td class="formAreaTitle">Type</td>
			<td class="formAreaTitle">Length/Values*</td>
			<td class="formAreaTitle">Extra</td>
			<td class="formAreaTitle">Default</td>
			<td class="formAreaTitle">Translate</td>
			<td class="formAreaTitle">Input</td>
			<td class="formAreaTitle">Validate</td>
			<td class="formAreaTitle"><img src="images/icons/b_index.png" alt="Index" align="middle"></td>
			<td class="formAreaTitle"><img src="images/icons/b_unique.png" alt="Unique" align="middle"></td>
				<td class="formAreaTitle">-</td>
			<td class="formAreaTitle"><img src="images/icons/b_ftext.png" alt="Full Text" align="middle"></td>
		</tr>
		
	{foreach from=$field item=row name=fields}
		<tr>
			<td class="fieldValue">{$smarty.foreach.fields.iteration}</td>
			<td class="fieldValue"><input type="text" name="field[{$smarty.foreach.fields.iteration}][name]" value="{$row.name}" size="20" ></td>
			<td class="fieldValue">
				<select name="field[{$smarty.foreach.fields.iteration}][type]">
					<option value="VARCHAR" {if $row.type == "VARCHAR" } selected {/if}>VARCHAR</option>
					<option value="TINYINT" {if $row.type == "TINYINT" } selected {/if}>TINYINT</option>
					<option value="TEXT" {if $row.type == "TEXT" } selected {/if}>TEXT</option>
					<option value="DATE" {if $row.type == "DATE" } selected {/if}>DATE</option>
					<option value="SMALLINT" {if $row.type == "SMALLINT" } selected {/if}>SMALLINT</option>
					<option value="MEDIUMINT" {if $row.type == "MEDIUMINT" } selected {/if}>MEDIUMINT</option>
					<option value="INT" {if $row.type == "INT" } selected {/if}>INT</option>
					<option value="BIGINT" {if $row.type == "BIGINT" } selected {/if}>BIGINT</option>
					<option value="FLOAT" {if $row.type == "FLOAT" } selected {/if}>FLOAT</option>
					<option value="DOUBLE" {if $row.type == "DOUBLE" } selected {/if}>DOUBLE</option>
					<option value="DECIMAL" {if $row.type == "DECIMAL" } selected {/if}>DECIMAL</option>
					<option value="DATETIME" {if $row.type == "DATETIME" } selected {/if}>DATETIME</option>
					<option value="TIMESTAMP" {if $row.type == "TIMESTAMP" } selected {/if}>TIMESTAMP</option>
					<option value="TIME" {if $row.type == "TIME" } selected {/if}>TIME</option>
					<option value="YEAR" {if $row.type == "YEAR" } selected {/if}>YEAR</option>
					<option value="CHAR" {if $row.type == "CHAR" } selected {/if}>CHAR</option>
					<option value="TINYBLOB" {if $row.type == "TINYBLOB" } selected {/if}>TINYBLOB</option>
					<option value="TINYTEXT" {if $row.type == "TINYTEXT" } selected {/if}>TINYTEXT</option>
					<option value="BLOB" {if $row.type == "BLOB" } selected {/if}>BLOB</option>
					<option value="MEDIUMBLOB" {if $row.type == "MEDIUMBLOB" } selected {/if}>MEDIUMBLOB</option>
					<option value="MEDIUMTEXT" {if $row.type == "MEDIUMTEXT" } selected {/if}>MEDIUMTEXT</option>
					<option value="LONGBLOB" {if $row.type == "LONGBLOB" } selected {/if}>LONGBLOB</option>
					<option value="LONGTEXT" {if $row.type == "LONGTEXT" } selected {/if}>LONGTEXT</option>
					<option value="ENUM" {if $row.type == "ENUM" } selected {/if}>ENUM</option>
					<option value="SET" {if $row.type == "SET" } selected {/if}>SET</option>
					<option value="BOOL" {if $row.type == "BOOL" } selected {/if}>BOOL</option>
					<option value="BINARY" {if $row.type == "BINARY" } selected {/if}>BINARY</option>
					<option value="VARBINARY" {if $row.type == "VARBINARY" } selected {/if}>VARBINARY</option>
				</select>
			</td>
			<td class="fieldValue"><input  type="text" name="field[{$smarty.foreach.fields.iteration}][length]" value="{$row.length}" size="8"  class="textfield" /></td>
			<td class="fieldValue">
							<select name="field[{$smarty.foreach.fields.iteration}][extra]">
								<option value="" {if $row.extra == ""} selected {/if}></option>
								<option value="AUTO_INCREMENT" {if $row.extra == "AUTO_INCREMENT"} selected {/if}>auto_increment</option>
							</select>							
			</td>
			<td class="fieldValue"><input type="text" name="field[{$smarty.foreach.fields.iteration}][default]"  value="{$row.default}" size="20"></td>
			<td class="fieldValue"><input type="text" name="field[{$smarty.foreach.fields.iteration}][translate]" value="{$row.translate}" size="20"></td>
			<td class="fieldValue"><select name="field[{$smarty.foreach.fields.iteration}][inputType]">
												<option value="text" {if $row.inputType == "text"} selected {/if}>Text</option>
												<option value="password" {if $row.inputType == "password"} selected {/if}>Password</option>
												<option value="checkbox" {if $row.inputType == "checkbox"} selected {/if}>Check Box</option>
												<option value="radio" {if $row.inputType == "radio"} selected {/if}>Radio</option>
												<option value="file" {if $row.inputType == "file"} selected {/if}>File</option>
												<option value="hidden" {if $row.inputType == "hidden"} selected {/if}>Hidden</option>
												<option value="image" {if $row.inputType == "image"} selected {/if}>Image</option>
												<option value="textarea" {if $row.inputType == "textarea"} selected {/if}>Textarea</option>
												<option value="button" {if $row.inputType == "button"} selected {/if}>Button</option>
											</select>
			</td>
			<td class="fieldValue"><select name="field[{$smarty.foreach.fields.iteration}][validate]" id="field[{$smarty.foreach.fields.iteration}][validate]">
				<option value="" {if $row.validate == ""} selected {/if}></option>
				<option value="notEmpty" {if $row.validate == "notEmpty"} selected {/if}>Not Null</option>
				<option value="isCCExpDate" {if $row.validate == "isCCExpDate"} selected {/if}>CC Exp Date</option>
				<option value="isCCNum" {if $row.validate == "isCCNum"} selected {/if}>CC Num</option>
				<option value="isDate" {if $row.validate == "isDate"} selected {/if}>Date</option>
				<option value="isEmail" {if $row.validate == "isEmail"} selected {/if}>Email</option>
				<option value="isFloat" {if $row.validate == "isFloat"} selected {/if}>Float</option>
				<option value="isInt" {if $row.validate == "isInt"} selected {/if}>Int</option>
				<option value="isNumber" {if $row.validate == "isNumber"} selected {/if}>Number</option>
				<option value="isPrice" {if $row.validate == "isPrice"} selected {/if}>Price</option>
				<option value="isURL" {if $row.validate == "isURL"} selected {/if}>URL</option>
				</select>
			</td>
			<td class="fieldValue"><input type="radio" name="field[{$smarty.foreach.fields.iteration}][key]" value="index" {if $row.key == "index"} checked {/if} title="Index" /></td>
			<td class="fieldValue"><input type="radio" name="field[{$smarty.foreach.fields.iteration}][key]" value="unique"  {if $row.key == "unique"} checked {/if} title="Unique" /></td>
			<td class="fieldValue"><input type="radio" name="field[{$smarty.foreach.fields.iteration}][key]" value="null"  {if $row.key == "null"} checked {/if} title="null" /></td>
			<td class="fieldValue"><input type="checkbox" name="field[{$smarty.foreach.fields.iteration}][fullText]" value="1" {if $row.fullText == "1"} checked {/if} title="Fulltext" /></td>
		</tr>
		
	{foreachelse}
		<tr>
			<td class="fieldValue">1</td>
			<td class="fieldValue"><input type="text" name="field[1][name]" size="20" ></td>
			<td class="fieldValue">
				<select name=field[1][type] >
					<option value="VARCHAR">VARCHAR</option>
					<option value="TINYINT">TINYINT</option>
					<option value="TEXT">TEXT</option>
					<option value="DATE">DATE</option>
					<option value="SMALLINT">SMALLINT</option>
					<option value="MEDIUMINT">MEDIUMINT</option>
					<option value="INT">INT</option>
					<option value="BIGINT">BIGINT</option>
					<option value="FLOAT">FLOAT</option>
					<option value="DOUBLE">DOUBLE</option>
					<option value="DECIMAL">DECIMAL</option>
					<option value="DATETIME">DATETIME</option>
					<option value="TIMESTAMP">TIMESTAMP</option>
					<option value="TIME">TIME</option>
					<option value="YEAR">YEAR</option>
					<option value="CHAR">CHAR</option>
					<option value="TINYBLOB">TINYBLOB</option>
					<option value="TINYTEXT">TINYTEXT</option>
					<option value="BLOB">BLOB</option>
					<option value="MEDIUMBLOB">MEDIUMBLOB</option>
					<option value="MEDIUMTEXT">MEDIUMTEXT</option>
					<option value="LONGBLOB">LONGBLOB</option>
					<option value="LONGTEXT">LONGTEXT</option>
					<option value="ENUM">ENUM</option>
					<option value="SET">SET</option>
					<option value="BOOL">BOOL</option>
					<option value="BINARY">BINARY</option>
					<option value="VARBINARY">VARBINARY</option>
				</select>
			
			
			</td>
			<td class="fieldValue"><input  type="text" name="field[1][length]" size="8"  class="textfield" /></td>
			<td class="fieldValue">
							<select name="field[1][extra]">
								<option value=""></option>
								<option value="AUTO_INCREMENT">auto_increment</option>
							</select>							
			</td>
			<td class="fieldValue"><input type="text" name="field[1][default]"  size="20"></td>
			<td class="fieldValue"><input type="text" name="field[1][translate]" size="20"></td>
			<td class="fieldValue"><select name="field[1][inputType]">
												<option value="text">Text</option>
												<option value="password">Password</option>
												<option value="checkbox">Check Box</option>
												<option value="radio">Radio</option>
												<option value="file">File</option>
												<option value="hidden">Hidden</option>
												<option value="image">Image</option>
												<option value="button">Button</option>
											</select>
			</td>
			<td class="fieldValue"><select name="field[1][validate]" id="field[1][validate]">
				<option value=""></option>
				<option value="notEmpty">Not Null</option>
				<option value="isCCExpDate">CC Exp Date</option>
				<option value="isCCNum">CC Num</option>
				<option value="isDate">Date</option>
				<option value="isEmail">Email</option>
				<option value="isFloat">Float</option>
				<option value="isInt">Int</option>
				<option value="isNumber">Number</option>
				<option value="isPrice">Price</option>
				<option value="isURL">URL</option>
				</select>
			</td>
			<td class="fieldValue"><input type="radio" name="field[1][key]" value="index" title="Index" /></td>
			<td class="fieldValue"><input type="radio" name="field[1][key]" value="unique" title="Unique" /></td>
			<td class="fieldValue"><input type="checkbox" name="field[1][fullText]" value="0" title="Fulltext" /></td>
		</tr>
	{/foreach}
	</table>
	
	
	
	
	
	<p class="smallText">You do not need to add the Module ID field. The system Auto Generates an Auto Increment, Primary Key Field based off of the Moudle Name: Example A Module name of invoice will automatically have an ID field of invoice_id.</p>
	<p class="smallText">Each Table will have a field generated called last_modified. This filed is set to timestamp and is Updated with the curent time stamp when a row is added or modified.</p>  
	<p class="smallText">*  If field type is "enum" or "set", please enter the values using this format: 'a','b','c'... If you ever need to put a backslash ("\") or a single quote ("'") amongst those values, preceed it with a backslash (for example '\\xyz' or 'a\'b').</p>
	<input type="button" value="Add Field" onclick="addRowToTable();" />
	<input type="button" value="Remove Field" onclick="removeRowFromTable();" />		
				
	<br><br>
	
	<span class="greetUser">Methods</span>
	<table cellpadding="3" cellspacing="0" class="formArea">
		</tr>
			<td class="formAreaTitle" colspan="4">Search</td>
		</tr><tr>
			<td class="formAreaTitle">Translate</td>
			<td class="fieldValue"><input type="text" name="searchTranslate" value="{$searchTranslate}"></td>
			<td class="formAreaTitle">Page Title</td>
			<td class="fieldValue"><input type="text" name="searchPageTitle" value="{$searchPageTitle}" size="25"></td>
			{validate id="searchTranslate"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a Search Translate Name!</font></td>"}
			{validate id="searchPageTitle"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a Search Page Title Name!</font></td>"}
		</tr><tr>
			<td class="formAreaTitle" align="center">Auth</td>
			<td class="formAreaTitle" align="center">Admin</td>
			<td class="formAreaTitle" align="center">User</td>
			<td class="formAreaTitle" align="center">Public</td>
		</tr><tr>
			<td class="fieldValue" align="center"></td>
			<td class="fieldValue" align="center"><input type="radio" name="searchAuth" value="admin" {if $searchAuth == "admin"} checked{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="searchAuth" value="user" {if $searchAuth == "user"} checked{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="searchAuth" value="public" {if $searchAuth == "public"} checked{/if}></td>
		</tr><tr>
			<td class="formAreaTitle" align="center">Menu</td>
			<td class="formAreaTitle" align="center">Admin</td>
			<td class="formAreaTitle" align="center">User</td>
			<td class="formAreaTitle" align="center">Public</td>	
		</tr><tr>
			<td class="fieldValue" align="center"></td>
			<td class="fieldValue" align="center"><input type="checkbox" name="searchAdminMenu" value="1" checked="true"></td>
			<td class="fieldValue" align="center"><input type="checkbox" name="searchUserMenu" value="1"></td>
			<td class="fieldValue" align="center"><input type="checkbox" name="searchPublicMenu" value="1"></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Description</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="searchDescription">{$searchDescription}</textarea></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Keywords</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="searchKeywords">{$searchKeywords}</textarea></td>
		</tr><tr>
			<td colspan="4"><hr></td>
		</tr><tr>
			<td colspan="4"><br></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Add</td>
		</tr><tr>
			<td class="formAreaTitle">Translate</td>
			<td class="fieldValue"><input type="text" name="addTranslate" value="{$addTranslate}"></td>
			<td class="formAreaTitle">Page Title</td>
			<td class="fieldValue"><input type="text" name="addPageTitle" value="{$addPageTitle}" size="25"></td>
			{validate id="addTranslate"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a Add Translate Name!</font></td>"}
			{validate id="addPageTitle"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a Add Page Title Name!</font></td>"}
		</tr><tr>
			<td class="formAreaTitle" align="center">Auth</td>
			<td class="formAreaTitle" align="center">Admin</td>
			<td class="formAreaTitle" align="center">User</td>
			<td class="formAreaTitle" align="center">Public</td>
		</tr><tr>
			<td class="fieldValue" align="center"></td>
			<td class="fieldValue" align="center"><input type="radio" name="addAuth" value="admin" {if $addAuth == "admin"} checked="true"{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="addAuth" value="user" {if $addAuth == "user"} checked="true"{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="addAuth" value="public" {if $addAuth == "public"} checked="true"{/if}></td>
		</tr><tr>
			<td class="formAreaTitle" align="center">Menu</td>
			<td class="formAreaTitle" align="center">Admin</td>
			<td class="formAreaTitle" align="center">User</td>
			<td class="formAreaTitle" align="center">Public</td>	
		</tr><tr>
			<td class="fieldValue" align="center"></td>
			<td class="fieldValue" align="center"><input type="checkbox" name="addAdminMenu" value="1" checked="true"></td>
			<td class="fieldValue" align="center"><input type="checkbox" name="addUserMenu" value="1" ></td>
			<td class="fieldValue" align="center"><input type="checkbox" name="addPublicMenu" value="1"></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Description</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="addDescription">{$addDescription}</textarea></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Keywords</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="addKeywrods">{$addKeywords}</textarea></td>
		</tr><tr>
			<td colspan="4"><hr></td>
		</tr><tr>	
			<td colspan="4"><br></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">View</td>
		</tr><tr>
			<td class="formAreaTitle">Translate</td>
			<td class="fieldValue"><input type="text" name="viewTranslate" value="{$viewTranslate}" size="25"></td>
			<td class="formAreaTitle">Page Title</td>
			<td class="fieldValue"><input type="text" name="viewPageTitle" value="{$viewPageTitle}" size="25"></td>
			{validate id="viewTranslate"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a View Translate Name!</font></td>"}
			{validate id="viewPageTitle"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a View Page Title Name!</font></td>"}
		</tr><tr>
			<td class="formAreaTitle" align="center">Auth</td>
			<td class="formAreaTitle" align="center">Admin</td>
			<td class="formAreaTitle" align="center">User</td>
			<td class="formAreaTitle" align="center">Public</td>
		</tr><tr>
			<td class="fieldValue" align="center"></td>
			<td class="fieldValue" align="center"><input type="radio" name="viewAuth" value="admin" {if $viewAuth == "admin"} checked="true"{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="viewAuth" value="user" {if $viewAuth == "user"} checked="true"{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="viewAuth" value="public" {if $viewAuth == "public"} checked="true"{/if}></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Description</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="viewDescription">{$viewDescription}</textarea></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Keywords</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="viewKeywords">{$viewKeywords}</textarea></td>
		</tr><tr>
			<td colspan="4"><hr></td>
		</tr><tr>
			<td colspan="4"><br></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Update</td>
		</tr><tr>
			<td class="formAreaTitle">Translate</td>
			<td class="fieldValue"><input type="text" name="updateTranslate" value="{$updateTranslate}"></td>
			<td class="formAreaTitle">Page Title</td>
			<td class="fieldValue"><input type="text" name="updatePageTitle" value="{$updatePageTitle}" size="25"></td>
			{validate id="updateTranslate"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide an Update Translate Name!</font></td>"}
			{validate id="updatePageTitle"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide an Update Page Title Name!</font></td>"}
		</tr><tr>
			<td class="formAreaTitle" align="center">Auth</td>
			<td class="formAreaTitle" align="center">Admin</td>
			<td class="formAreaTitle" align="center">User</td>
			<td class="formAreaTitle" align="center">Public</td>
		</tr><tr>
			<td class="fieldValue" align="center"></td>
			<td class="fieldValue" align="center"><input type="radio" name="updateAuth" value="admin" {if $updateAuth == "admin"} checked="true"{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="updateAuth" value="user" {if $updateAuth == "user"} checked="true"{/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="updateAuth" value="public" {if $updateAuth == "public"} checked="true"{/if}></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Description</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="updateDescription">{$updateDescription}</textarea></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Keywords</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="updateKeywords">{$updateKeywords}</textarea></td>
		</tr><tr>
			<td colspan="4"><hr></td>
		</tr><tr>	
			<td colspan="4"><br></td>
		</tr><tr>	
			<td class="formAreaTitle" colspan="4">Delete</td>
		</tr><tr>
			<td class="formAreaTitle">Translate</td>
			<td class="fieldValue"><input type="text" name="deleteTranslate" value="{$deleteTranslate}"></td>
			<td class="formAreaTitle">Page Title</td>
			<td class="fieldValue"><input type="text" name="deletePageTitle" value="{$deletePageTitle}" size="25"></td>
			{validate id="deleteTranslate"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a Delete Translate Name!</font></td>"}
			{validate id="deletePageTitle"  message="</tr><tr><td colspan=\"4\"><font color=\"#ff0000\" size=\"2\">Please Provide a Delete Page Title Name!</font></td>"}
		</tr><tr>
			<td class="formAreaTitle" align="center">Menu</td>
			<td class="formAreaTitle" align="center">Admin</td>
			<td class="formAreaTitle" align="center">User</td>
			<td class="formAreaTitle" align="center">Public</td>
		</tr><tr>
			<td class="fieldValue" align="center"><input type="checkbox" name="deleteMenu" value="1"></td>
			<td class="fieldValue" align="center"><input type="radio" name="deleteAuth" value="admin" {if $deleteAuth == "admin"} checked {/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="deleteAuth" value="user" {if $deleteAuth == "user"} checked {/if}></td>
			<td class="fieldValue" align="center"><input type="radio" name="deleteAuth" value="public" {if $deleteAuth == "public"} checked {/if}></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Description</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="deleteDescription">{$deleteDescription}</textarea></td>
		</tr><tr>
			<td class="formAreaTitle" colspan="4">Meta Keywords</td>
		</tr><tr>
			<td class="fieldValue" colspan="4"><textarea cols="50" rows="3" name="deleteKeywords">{$deleteKeywords}</textarea></td>
		</tr>
	</table>
	<br>
<input type="submit" name="submit" value="Submit">


</form>
{include file="core/footer.tpl"}