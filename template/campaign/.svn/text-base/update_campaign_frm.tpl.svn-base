<!-- update_campaign_frm -->
{include file="core/header.tpl"}

<table cellpadding="0" cellspacing="0" width="400">
	<tr>
		<td><span class="greetUser">Update Campaign ID# {$campaign->get_campaign_id()}</span></td>
		<td align="right"></td>
</tr>
</table>

<br>
{if $errorOccurred}
	<table cellpadding="5" cellspacing="1" width="600" border="0" class="infoBoxNotice">
		<tr>
			<td class="infoBoxNoticeContents">
{/if}
{validate field="campaign_name" criteria="notEmpty" message="<img src={$ROOT_URL}/images/icons/flag_16.gif> <span class=errorText>$translate_error_notEmpty_campaign_name</span><br>"}
{if $errorOccurred}
		</td>
	</tr>
</table>
{/if}
<br>

<form method="post" action="{$ROOT_URL}/index.php?page=campaign:update_campaign" id="add_campaign_frm">

<table cellpadding="5" cellspacing="5" class="formArea" width="400">
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_type_id}</td>
		<td class="fieldValue"><input type="text" name="campaign_type_id" value="{$campaign->get_campaign_type_id()}" id="campaign_type_id">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_name}</td>
		<td class="fieldValue"><input type="text" name="campaign_name" value="{$campaign->get_campaign_name()}" id="campaign_name">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_start_date}</td>
		<td class="fieldValue"><input type="text" name="campaign_start_date" value="{$campaign->get_campaign_start_date()}" id="campaign_start_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_end_date}</td>
		<td class="fieldValue"><input type="text" name="campaign_end_date" value="{$campaign->get_campaign_end_date()}" id="campaign_end_date">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_cost}</td>
		<td class="fieldValue"><input type="text" name="campaign_cost" value="{$campaign->get_campaign_cost()}" id="campaign_cost">
</td>
	</tr>
	<tr>
		<td class="formAreaTitle">{$translate_field_campaign_active}</td>
		<td class="fieldValue"><input type="text" name="campaign_active" value="{$campaign->get_campaign_active()}" id="campaign_active">
</td>
	</tr>
	<tr>
		<td colspan="7">
		<input type="hidden" name="campaign_id" value="{$campaign_id}">
		<input type="submit" name="submit" value="{$translate_button_submit}"></td>
	</tr>
</table>

</form>

{include file="core/footer.tpl"}
