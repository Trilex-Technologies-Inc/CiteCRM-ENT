<!-- load_bookmark_toc.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser">My Bookmarks</span></td>
        <td align="right"><a href="javascript:add_bookmark()">Add Bookmark</a></td>
	</tr>
</table>
<table>
    <tr>
        <td>
            <img src="/images/icons/foldr_16.gif" border="0" align="middle" id="Lead">
            <a href="javascript:load_bookmark_type('Lead')">Leads</a>
            <div id="box_Leads"></div>
        </td>
    </tr><tr>
        <td><img src="{$ROOT_URL}/images/icons/foldr_16.gif" border="0" align="middle" id="Account"> <a href="javascript:load_bookmark_type('Account')">Accounts</a><div id="box_Accounts"></div></td>
    </tr><tr>
        <td><img src="{$ROOT_URL}/images/icons/foldr_16.gif" border="0" align="middle" id="Contact"> <a href="javascript:load_bookmark_type('Contact')">Contacts</a><div id="box_Contacts"></div></td>
    </tr><tr>
        <td><img src="{$ROOT_URL}/images/icons/foldr_16.gif" border="0" align="middle" id="Work Order"> <a href="javascript:load_bookmark_type('Work Order')">Workorders</a><div id="box_Workorders"></div></td>
    </tr><tr>
        <td><img src="{$ROOT_URL}/images/icons/foldr_16.gif" border="0" align="middle" id="System"> <a href="javascript:load_bookmark_type('System')">Systems</a><div id="box_Systems"></div></td>
    </tr><tr>
        <td><img src="{$ROOT_URL}/images/icons/foldr_16.gif" border="0" align="middle" id="Invoice"> <a href="javascript:load_bookmark_type('Invoice')">Invoices</a><div id="box_Invoices"></div></td>
    </tr><tr>
        <td><img src="{$ROOT_URL}/images/icons/foldr_16.gif" border="0" align="middle" id="Product"> <a href="javascript:load_bookmark_type('Product')">Products</a><div id="box_Products"></div></td>
    </tr><tr>
        <td><img src="{$ROOT_URL}/images/icons/foldr_16.gif" border="0" align="middle" id="Web"> <a href="javascript:load_bookmark_type('Web')">Web</a><div id="box_Web"></div></td>
    </tr>
</table>