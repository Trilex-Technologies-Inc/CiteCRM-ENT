<!--ajax_load_campaign_details.tpl-->
<table cellpadding="3" cellspacing="0">
    <tr>
        <td class="formAreaTitle">
			<table width="100%" class="small">
                <tr>
                	<td><b>Campaign Name</b></td>
                	<td>{$campaignObj->get_campaign_name()}</td>
                    <td><b>Campaign Type</b></td>
                    <td>{$campaignObj->get_campaign_type_id()|campaign_type}</td>                    
                </tr><tr>
					<td><b>Start Date</b></td>
					<td>{$campaignObj->get_campaign_start_date()|date_format:$DATE_FORMAT}</td>
					<td><b>End Date</b></td>
					<td>{$campaignObj->get_campaign_end_date()|date_format:$DATE_FORMAT}</td>
				</tr><tr>
					<td><b>Active</b></td>
					<td>{$campaignObj->get_campaign_active()|yesno}</td>
					<td><b>Cost</b></td>
					<td>${$campaignObj->get_campaign_cost()|string_format:"%.2f"}</td>
				</tr><tr>
					<td colspan="4"><b>Description</b></td>
				</tr><tr>
					<td colspan="4">{$campaignObj->get_campaign_description()}</td>
				</tr>
            </table>
                    	
        </td>
    </tr>
</table>
