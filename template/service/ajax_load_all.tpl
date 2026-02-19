<!--ajax_load_all.tpl-->
<table width="100%" cellpadding="3" cellspacing="0" border="0" class="productListing">
    <tr>
        <td class="productListing-heading">Service Name</td>
        <td class="productListing-heading" width="100">Amount</td>
        <td class="productListing-heading" width="70">Active</td>
    </tr>
    {foreach from=$serviceArray item="service"}
    <tr onmouseover="this.className='row2'" onmouseout="this.className='row1'" ondblclick="view('{$service->get_service_id()}')">
        <td class="productListing-data">{$service->get_service_name()}</td>
        <td class="productListing-data">{$service->get_service_amount()}</td>
        <td class="productListing-data">{$service->get_service_active()|yesno}</td>     
    </tr>
    {foreachelse}
    <tr>
        <td class="productListing-data" colspan="5">No Flat Rate Services Defined. <a href="javascript:add_service_frm();">Add One</a></a></td>
    </tr>
    {/foreach}
</table>
<br>