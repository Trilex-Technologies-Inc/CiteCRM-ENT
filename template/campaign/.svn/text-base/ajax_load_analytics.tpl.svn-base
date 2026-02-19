<!-- ajax_load_analytics.tpl -->
<table width="100%">
	<tr>
		<td><span class="greetUser"><span class="greetUser">Campaign Analytics</span></td>	
	</tr>
</table>
<table cellpadding="3" cellspacing="0">
    <tr>
        <td class="formAreaTitle">
			<table width="100%" class="small">
                <tr>
                	<td>You Campaign Created {$total_conversions} Conversions out of {$total_leads} Leads.<br>
						Your Campaign cost was ${$campaign_cost|string_format:"%.2f"}. The cost per Conversion was ${$cost_per_conversion|string_format:"%.2f"}.<br>
						The Conversion Rate for this Campaign is {$coversion_percent|string_format:"%.2f"}%.<br><br>
						
						This Campaign has generated {$workorder_count} Work Orders providing ${$total_income|string_format:"%.2f"} in Income<br>
						creating a  
						{if $roi < 1}
							<span class="error">${$roi|string_format:"%.2f"}</span> loss on investment.
						{else}
							 ${$roi|string_format:"%.2f"} return on investment (ROI).
						{/if}	
						<br>
						
										
                	
                	</td>
                </tr>
            </table>
        </td>
    </tr>
</table>