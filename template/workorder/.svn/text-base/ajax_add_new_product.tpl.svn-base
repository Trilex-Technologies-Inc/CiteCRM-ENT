<!-- ajax_add_new_product.tpl -->
{literal}
<script language="javascript" type="text/javascript" src="{$ROOT_URL}/include/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script language="javascript" type="text/javascript">
    tinyMCE.init({
        mode : "specific_textareas",
        theme : "{/literal}{$TINY_MCE_THEME}{literal}",
        width : "100%"
    }); 


function validate_form(thisform) {

    var error = false;
    var errorMsg = 'There where errors saving your Product\n';  

    with (thisform){
         if(document.getElementById("product_name").value == "") {
            error = true;
            errorMsg = errorMsg + '-- Please provide the Product Name ! --\n';
            document.getElementById("product_name").className='formError';
        }


    }
    
    // If we have an error stop and show 
    if(error == true) {
        errorMsg = errorMsg + '\nPlease correct the errors and save your Product';
        alert(errorMsg);
        return false;       
    }

}

</script>
{/literal}

<table width="100%">
    <tr>
        <td><span class="greetUser">Add New Product to Catalog</span></td>
        <td align="right"></td>   
    </tr>
</table>
<form method="post" action="{$ROOT_URL}/index.php?page=workorder:ajax_add_new_product" id="add_product_frm" enctype="multipart/form-data" onsubmit="return validate_form(this);">
<input type="hidden" name="MAX_FILE_SIZE" value="300000000"> 
<input type="hidden" name="workorder_id" value="{$workorder_id}">
<table cellpadding="5" cellspacing="5" class="formArea" width="600">
    <tr>
        <td class="formAreaTitle" nowrap="true">Select System</td>
        <td class="fieldValue">
            <select name="system_id">
                <option value="0">None</option>
                {foreach from=$systemArray item=system}
                    <option value="{$system->fields.system_id}">{$system->fields.system_name}</option>
                {/foreach}
            </select>
        </td>
    </tr><tr>
         <td class="formAreaTitle" nowrap="true">Qty</td>
         <td class="fieldValue"><input type="text" name="qty" value="1" id="qty"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">UPC Code</td>
        <td class="fieldValue"><input type="text" name="upcCode" value="{$upcCode}" id="upcCode"></td>  
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Category</td>
        <td class="fieldValue">{html_select_product_category fieldName="category_id" value=$category_id}</td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">SKU</td>
        <td class="fieldValue"><input type="text" name="product_sku" value="{$product_sku}" id="product_sku"></td>  
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Manufacture</td>
        <td class="fieldValue">{html_select_product_manufacture fieldName="manufacture_id" value=$manufacture_id}</td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Model</td>
        <td class="fieldValue"><input type="text" name="product_model" value="{$product_model}" id="product_model"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Name</td>
        <td class="fieldValue"><input type="text" name="product_name" value="{$product_name}" id="product_name"></td>   
    </tr><tr>   
        <td class="formAreaTitle" nowrap="true">Status</td>
        <td class="fieldValue">{html_select_product_status fieldName="product_status" value=$product_status}</td>
    </tr><tr>
        <td class="formAreaTitle" colspan="2">Description</td>
    </tr><tr>
        <td class="fieldValue" colspan="2"><textarea name="product_description" rows="15" cols="70" >{$product_description}</textarea></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Call For Price</td>
        <td class="fieldValue">{html_select_yesno fieldName="product_is_call" value=$product_is_call}</td>
    </tr><tr>   
        <td class="formAreaTitle" nowrap="true">Price $</td>
        <td class="fieldValue"><input type="text" name="product_price" value="{$product_price}" id="product_price" size="8"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Markup $</td>
        <td class="fieldValue"><input type="text" name="product_markup" value="{$product_markup}" id="product_markup" size="8"></td>
    </tr><tr>           
        <td class="formAreaTitle" nowrap="true">Tax Class</td>
        <td class="fieldValue">tax_class_id</td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Priced By Attributes</td>
        <td class="fieldValue">{html_select_yesno fieldName="product_priced_by_attribute" value=$product_priced_by_attribute}</td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Quantity</td>
        <td class="fieldValue"><input type="text" name="product_quantity" value="{$product_quantity|default:"1"}" id="product_quantity" size="8"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Min Order</td>
        <td class="fieldValue"><input type="text" name="product_quantity_order_min" value="{$product_quantity_order_min|default:"1"}" id="product_quantity_order_min" size="8"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Max Order</td>
        <td class="fieldValue"><input type="text" name="product_quantity_order_max" value="{$product_quantity_order_max|default:"0"}" id="product_quantity_order_max" size="8"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Virtual Product</td>
        <td class="fieldValue">{html_select_yesno fieldName="product_virtual" value=$product_virtual}</td>  
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">On Order</td>
        <td class="fieldValue">{html_select_yesno fieldName="product_ordered" value=$product_ordered}</td> 
    </tr><tr>   
        <td class="formAreaTitle" nowrap="true">Units Orderd</td>
        <td class="fieldValue"><input type="text" name="product_quantity_order_units" value="{$product_quantity_order_units|default:"0"}" id="product_quantity_order_units" size="8"></td>
    </tr><tr>   
        <td class="formAreaTitle" nowrap="true">Free Shipping</td>
        <td class="fieldValue">{html_select_yesno fieldName="product_is_always_free_shipping" value=$product_is_always_free_shipping}</td> 
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Weight</td>
        <td class="fieldValue"><input type="text" name="product_weight" value="{$product_weight}" id="product_weight" size="8"> (lbs)</td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Date Added</td> 
        <td class="fieldValue"><input type="text" name="product_date_added" value="{$product_date_added}" size="10" id="product_date_added"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Date Available</td> 
        <td class="fieldValue"><input type="text" name="product_date_available" value="{$product_date_available}" size="10" id="product_date_available"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">Image</td>
        <td class="fieldValue"><input type="file" name="product_image" id="product_image"></td>
    </tr><tr>
        <td class="formAreaTitle" nowrap="true">URL</td>
        <td class="fieldValue"><input type="text" name="product_url" id="product_url" id="product_url"><br>
             
        </td>
    </tr><tr>    
        <td colspan="2">
                
        <input type="submit" name="submit" value="{$translate_button_submit}"></td>
    </tr>
</table>


</form>