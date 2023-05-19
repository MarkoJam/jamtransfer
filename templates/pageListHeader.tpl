<style>
/* Filters: */
#pageListHeader-filters{
	float:left;
	background: #479de929;
	border-radius: 5px;
	padding-right: 5px;
	box-shadow: 3px 3px 4px 0px #3b75b9;
}

.show-edit{
	cursor:pointer; font-weight:bold; color: #0584f1; text-shadow: #0584f1 0px 0px 1px;
}

.fa-bars-edit{
	font-size: 20px;margin: 5px;color: #0584f1;
}

.show-edit:hover,.fa-bars-edit:hover{
	cursor:pointer; font-weight:bold; color: #0b70c9;
}

/* ------------------------------------------------------ */
</style>

<input type="hidden"  id="whereCondition" name="whereCondition" 
value=" WHERE {$ItemID} > 0">

<input type="hidden"  id="routeID" name="routeID" value="{$RouteID}">
<input type="hidden"  id="vehicleTypeID" name="vehicleTypeID" value="{$VehicleTypeID}">
<input type="hidden"  id="vehicleID" name="vehicleID" value="{$VehicleID}">
<input type="hidden"  id="subdriverID" name="subdriverID" value="{$SubDriverID}">
<input type="hidden"  id="actionID" name="actionID" value="{$ActionID}">

<div class="row itemsheader itemsheader-edit">

<!-- Show and Hide Filters buttons: -->
<div id="pageListHeader-filters">
	<div id="show" class="show-edit"><i class="fa-solid fa-bars fa-bars-edit"></i>Show Filters</div>
	<div id="show-2" class="show-edit"><i class="fa-solid fa-bars fa-bars-edit"></i>Hide Filters</div>
</div>

	<div class="filter">

		{if isset($selecttype)}
		<div class="col-md-2">
			<i class="fa fa-list-ul edit-fa"></i>
			<div class="form-group group-edit">
			
				<select id="Type" class="w75 form-control control-edit" onchange="allItems();">
					<option value="0">{$ALL} {$STATUS}</option>
					{section name=pom loop=$options}
						<option value="{$options[pom].id}">{$options[pom].name}</option>
					{/section}
				</select>
			</div>
		</div>
		{/if}	
		{if isset($selecttype2)}
		<div class="col-md-2">
			<i class="fa fa-list-ul edit-fa"></i>
			<div class="form-group group-edit">
			
				<select id="Type2" class="w75 form-control control-edit" onchange="allItems();">
					<option value="0">{$ALL} {$USERS}</option>
					{section name=pom2 loop=$options2}
						<option value="{$options2[pom2].id}">{$options2[pom2].name}</option>
					{/section}
				</select>
			</div>
		</div>
		{/if}

		<div class="col-md-2">
			<i class="fa fa-text-width edit-fa"></i>
			<div class="form-group group-edit">
				<input type="text" id="Search" class=" w75 form-control control-edit" onchange="allItems();" placeholder="Text + Enter to Search">
			</div>
		</div>

		{if $pageList ne 'Orders'}
		<div class="col-md-2">
			<i class="fa fa-sort-amount-asc edit-fa"></i>
			<div class="form-group group-edit">
				<select name="sortOrder" id="sortOrder" onchange="allItems();" class="form-control control-edit">
					<option value="ASC"> {$ASCENDING} </option>
					<option value="DESC" {if isset($selectapproved) or isset($selectsolved)}SELECTED{/if}> {$DESCENDING} </option>
				</select>
			</div>	
		</div>		
		{/if}	
		{if isset($selectactive)}		
		<div class="col-md-2">
			<i class="fa fa-filter edit-fa"></i> 
			<div class="form-group group-edit">
				<select name="Active" id="Active" onchange="allItems();" class="form-control control-edit">
					<option value="99" selected="selected">{$ALL}</option>			
					<option value="1"> Active </option>
					{if isset($selectactive2)}<option value="2"> Semi Active </option>{/if}
					<option value="0"> Not Active </option>
				</select>
			</div>
		</div>
		{/if}	
		
		{if isset($selectapproved)}		
		<div class="col-md-2">
			<i class="fa fa-filter edit-fa"></i> 
			<div class="form-group group-edit">
				<select name="Approved" id="Approved" onchange="allItems();" class="form-control control-edit">
					<option value="99" selected="selected">{$ALL}</option>			
					<option value="1"> Approved </option>
					<option value="0"> Not Approved </option>
				</select>
			</div>
		</div>
		{/if}
		
		{if isset($selectsolved)}		
		<div class="col-md-2">
			<i class="fa fa-filter edit-fa"></i> 
			<div class="form-group group-edit">
				<select name="Approved" id="Approved" onchange="allItems();" class="form-control control-edit">
					<option value="99" selected="selected">{$ALL}</option>			
					<option value="1"> Solved </option>
					<option value="0"> Not Solved </option>
				</select>
			</div>
		</div>
		{/if}

	</div> <!-- /.filter -->
</div>


{* Scripts: *}
<script>

function resize(){

	if ($(window).width() > 1553) {
		$('.filter').show();
		$('#show').hide();
		$('#show-2').hide();
	}

	if ($(window).width() < 1552) {
		$('.filter').hide();
		$('#show').show();
		$('#show-2').hide();
		
	}

}


$('#show').click(function() {
	$('.filter').toggle(600);
	$('#show').hide();
	$('#show-2').show();
});

$('#show-2').click(function() {
	$('.filter').toggle(600);
	$('#show').show();
	$('#show-2').hide();
});

resize();
$(window).resize(resize);


</script>