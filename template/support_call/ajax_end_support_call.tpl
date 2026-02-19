<!-- ajax_end_support_call.tpl -->
<span class="greetUser">Stop Support Call</span>
<table cellpadding="5" cellspacing="0" class="formArea" width="100%">
	<tr>
		<td class="formAreaTitle">Call Description</td>
	</tr><tr>
		<td class="fieldValue">
			<textarea name="support_call_notes" id="support_call_notes" rows="15" cols="30">{$support_call_notes}</textarea>
		</td>
	</tr><tr>
		<td class="fieldValue">
			<input type="hidden" id="support_call_id" name="support_call_id" value="{$support_call_id}">
			<input type="button" name="submit" id="submit" value="Save" onclick="save_support_call()">
		</td>
	</tr>
</table>
</form>