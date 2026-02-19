<!-- view_day.tpl -->
{if $stand_alone == false}
	{include file="core/header.tpl"}
{else}	
	<link rel="stylesheet" type="text/css" href="{$ROOT_URL}/css/default.css">
	<link rel="stylesheet" href="{$ROOT_URL}/java/dhtmlwindow/dhtmlwindow.css" type="text/css" />
	<script type="text/javascript" src="{$ROOT_URL}/java/dhtmlwindow/dhtmlwindow.js"></script>
	<a name="top"></a>
	<div id="dhtmltooltip"></div>
	<SCRIPT SRC="{$ROOT_URL}/java/dhtml.js"></SCRIPT>
	<br>
{/if}
<ul class="subpanelTablist" id="groupTabs">
	<li id="All_sp_tab"><a class="current">Day View</a></li>
</ul>
<table cellpadding="0" cellspacing="0" class="dataTable" width="100%">
	<tr>
		<td class="productListing-data">
			<table cellpadding="0" cellspacing="0"  width="100%">
				<tr>
					<td class="data">
					{$start_time|date_format:$DATE_FORMAT}
					</td>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
{$html}
{if $hide_options == true}
	<br>
	<a href="{$ROOT_URL}/index.php?page=calendar:view_day&Date_Year={$Date_Year}&Date_Month={$Date_Month}&Date_Day={$Date_Day}">View Day</a>
{else}
<br>
<table cellpadding="3">
	<tr>
		<td>
			<form method="get" action="{$ROOT_URL}/index.php">
			<table class="small">
				<tr>
					<td class="small">Workorder</td>
					<td class="workorder-data" width="10"><br></td>
					<td class="small"><input type="radio" name="filter" value='workorder' {if $filter == 'workorder'} checked {/if}></td>
				</tr><tr>
					<td class="small">Personal</td>
					<td class="personal-data" width="10"><br></td>
					<td class="small"><input type="radio" name="filter" value='personal' {if $filter == 'personal'} checked {/if}></td>
				</tr>
				<tr>
					<td class="small">Lead Meeting</td>
					<td class="lead-meeting" width="10"><br></td>
					<td class="small"><input type="radio" name="filter" value='lead meeting' {if $filter == 'lead meeting'} checked {/if}></td>
				</tr><tr>
					<td class="small">Lead Call</td>
					<td class="lead-call" width="10"><br></td>
					<td class="small"><input type="radio" name="filter" value='lead call' {if $filter == 'lead call'} checked {/if}></td>
				</tr><tr>
					<td class="small">Account Meeting</td>
					<td class="company_meeting" width="10"><br></td>
					<td class="small"><input type="radio" name="filter" value='company meeting' {if $filter == 'company meeting'} checked {/if}></td>
				</tr><tr>
					<td class="small">None</td>
					<td class="small"><input type="radio" name="filter" value="" {if $filter == ''} checked {/if}></td>
					<td class="small">
						<input type="hidden" name="start" value="{$start_time}">
						<input type="hidden" name="end" value="{$end_time}">
						<input type="hidden" name="page" value="calendar:view_day"/>
						{if $stand_alone == true}
							<input type="hidden" name="stand_alone" value="true">
						{/if}
						<input type="submit" name="submit" value="Filter">
					</td>
				</tr>
			</table>
			
			</form>
		</td>
		<td valign="top" class="small">
			<table>
				<tr>
					<td class="small">
						<form method="get" action="{$ROOT_URL}/index.php">
							Jump to  {html_select_date time=$start_time} 
							Start  {html_select_time display_seconds=false prefix="start_" minute_interval=30 time=$start_time} 
							End  {html_select_time display_seconds=false prefix="end_" minute_interval=30 time=$end_time}
							<input type="hidden" name="page" value="calendar:view_day"/>
							{if $stand_alone == true}
							<input type="hidden" name="stand_alone" value="true">
							{/if}
							<input type="submit" value="Go" name="submit"> 
						</form>
					</td>
				</tr><tr>
					<td>
					<form method="get" action="{$ROOT_URL}/index.php">
						<input type="hidden" name="start" value="{$start_time}">
						<input type="hidden" name="end" value="{$end_time}">
						<input type="hidden" name="minus_one" value="1">
						<input type="hidden" name="page" value="calendar:view_day"/>
						{if $stand_alone == true}
							<input type="hidden" name="stand_alone" value="true">
						{/if}
						<input type="submit" value="<<" name="submit">
					</form>&nbsp;&nbsp;
					<form method="get" action="{$ROOT_URL}/index.php">
						<input type="hidden" name="today" value="today">
						<input type="hidden" name="page" value="calendar:view_day"/>
						{if $stand_alone == true}
							<input type="hidden" name="stand_alone" value="true">
						{/if}
						<input type="submit" value="Today" name="submit">
					</form>&nbsp;&nbsp;
					<form method="get" action="{$ROOT_URL}/index.php">
						<input type="hidden" name="start" value="{$start_time}">
						<input type="hidden" name="end" value="{$end_time}">
						<input type="hidden" name="plus_one" value="1">
						<input type="hidden" name="page" value="calendar:view_day"/>
						{if $stand_alone == true}
							<input type="hidden" name="stand_alone" value="true">
						{/if}
						<input type="submit" value=">>" name="submit">
					</form>
					</td>
				</tr>
			
			</table>
			
		</td>
	</tr>		
</table>
{if $display_close == true}
	<center><a href="javascript:self.close()">close window</a></center>	
{/if}

{/if}
{if $stand_alone == false}
{include file="core/footer.tpl"}
{/if}