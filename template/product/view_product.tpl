<!-- view_product -->
<input type="hidden" id="product_id" value="{$product_id}">
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="formArea">
	<tr>
		<td width="33%" class="fieldValue">
			<a href="javascript:load_parts(0)">Top</a> ->  <a href="javascript:load_parts('{$parent_id}','product_id','ASC','')">{$parent_id|category_name}</a> -> <a href="javascript:load_parts('{$category_id}','product_id','ASC','')">{$category_id|category_name}</a> -> {$product->fields.product_name}
		</td>
	</tr>
</table>
<br>
<p>
<span class="greetUser">{$product->fields.product_name}</span>
</p>
<table>
    <tr>
        <td width="200" valign="top">
            <table>
                <tr>
                    <td><img src="{$product->get_product_image()}"></td>
                    <td width="5"><br></td>
                    <td valign="top">
                        <table class="small">
                            <tr>
                                <td>${$product->get_product_price()}</td>
                            </tr><tr>
                                <td nowrap>In stock: {$product->get_product_quantity()}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
        <td width="5"><br></td>
        <td valign="top" class="small">
            <ul class="subpanelTablist" id="groupTabs">
                <li id="All_sp_tab"><a  href="javascript:load_activity('Description');" id="Description" class="current">Description</a></li>
                <li id="Marketing_sp_tab"><a  href="javascript:load_activity('Specifications');" id="Specifications">Specifications</a></li>
                 <li id="Marketing_sp_tab"><a  href="javascript:load_activity('Sales');" id="Sales">Sales</a></li>
                <li id="Marketing_sp_tab"><a  href="javascript:load_activity('Manufacture');" id="Manufacture">Manufacture</a></li>
                <li id="Activities_sp_tab"><a href="javascript:load_notes('Notes','note_create_date','DESC','')" id="Notes">Notes</a></li>
            </ul>
            <div id="spaceBox"></div>
            <div id="detailBox">
                <table cellpadding="5" cellspacing="0" class="formArea" width="400">
	               <tr>
		              <td class="fieldValue">{$product->fields.product_description}<br>
                        <a href="javascript:edit_description()">Edit</a>
                      </td>
                   </tr>
                </table>

           </div>
        </td>
    </tr>
</table>

