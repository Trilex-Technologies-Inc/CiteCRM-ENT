<!-- lic_exceded.tpl -->
{include file="core/header.tpl"}
<ul class="subpanelTablist" id="groupTabs">
    <li id="All_sp_tab"><a  href="" class="current">License Problem</a></li>    
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="600">
    <tr>
        <td class="productListing-data" style="background-color: #F0F8FF" > 
        	<table cellpadding="5" cellspacing="0" style="background-color: #F0F8FF">
                <tr>
                    <td class="fieldValue">
                    	<br>
			        	You have the maximun number of Employees ({$num_user}) allowed for your account ({$lic_user}).<br><br> 
						
						Your current license allows for {$lic_user} employess. You can purchase aditional licesences <a href="http://dev.citecrm.com/index.php?page=account:billing">here</a> in packs of 5 employees.
						<br><br>
			        </td>
			    </tr>
			</table>
			<br>
        </td>
    </tr>
</table>
        
{include file="core/footer.tpl"}