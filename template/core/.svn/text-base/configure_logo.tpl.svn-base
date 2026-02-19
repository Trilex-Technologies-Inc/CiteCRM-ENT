<!-- configure_logo.tpl -->
{include file="core/header.tpl"}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Configure Logo</a></li>
</ul>
{if $error}
	<br>
	<span class="error">{$errorMsg}</span>
	<br>
{/if}
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data" >
					<form method="post" action="{$ROOT_URL}/index.php?page=core:configure_logo" enctype="multipart/form-data">
					<input type="hidden" name="MAX_FILE_SIZE" value="20000"> 
						<table cellpadding="5" cellspacing="5" class="formArea" width="600">
							<tr>
								<td class="formAreaTitle" colspan="2">Current Logo</td>
							</tr>
								<td class="fieldValue" colspan="2">
									{if $COMPANY_LOGO == ''}
										No Logo Defined Yet
									{else}
										<img src="{$ROOT_URL}/images/{$COMPANY_LOGO}" alt="{$SITE_NAME}">
									{/if}
								</td>
							</tr><tr>
								<td class="formAreaTitle">Upload New Logo</td>
								<td class="fieldValue"><input type="file" name="logo" id="logo"></td>
							</tr><tr>
								<td class="fieldValue" colspan="2">
								<p class="small">The logo must be file type .jpg or .jpeg only. The Image must by no larger than {$max_height}px X  {$max_width}px. The Max File size is {$max_size} bytes.</p>
								<input type="submit" name="submit" value="Save"></td>
							</tr>
						</table>
					</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

{include file="core/footer.tpl"}