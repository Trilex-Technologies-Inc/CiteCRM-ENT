<!-- activationFrm -->
{include file="core/header.tpl"}
			
<span class="greetUser">Activate Your Account</span>


<form method ="POST" action="index.php?page=user:activate_user" id="user_activation_frm">

	<table cellpadding="5" cellspacing="5" class="formArea" width="400">
		<tr>
			<td class="formAreaTitle"><span class="inputRequirement">*</span> {$translate_activation_code}</td>
			<td class="fieldValue"><input type="text" name="activation_code_text" size="25" value="{$activation_code_text}"></td>
		</tr><tr>
			<td colspan="2">	
				{validate field="activation_code_text" criteria="validActivationCode" message="<img src=\"images/icons/flag_16.gif\"><span class=\"errorText\">$translate_error_invalid_activation_code</span><br>"}
				<input type="hidden" name="activation_code_type" value="{$translate_button_activation}">
				<input type="Submit" name="submit" value="{$translate_button_submit}">
			</td>
		</tr>
	</table>

</form>

{include file="core/footer.tpl"}