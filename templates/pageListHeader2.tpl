<style>

	[class*="col-"] > *{ /* Target all child elements in the parent */
		margin-top:3px;
	}
	[class*="col-"] > *:first-child{
		margin-top:0px;
	}

	.select-top-edit.addon{
		width:50%;
		display: inline;
	}

	.input-one{
		width: 100%;
	}


	.datepicker-edit{ width:48%; }

	.datepicker-edit,.datepicker-edit-2{
		color: rgb(1 114 255) !important;
		padding:2px;
		border-radius: 5px !important;
		margin-bottom: 2px;
		box-shadow: 2px 2px 4px #3f50a1;
		outline:none;
		border:2px solid rgb(135, 147, 218);
		font-weight: bold;
	}

	#wrapp-buttons{
		float:left;
		background: #479de929;
		border-radius: 5px;
		padding-right: 5px;
		box-shadow: 3px 3px 4px 0px #3b75b9;
	}

	.button-toggle{
		cursor:pointer; font-weight:bold; color: #0584f1; text-shadow: #0584f1 0px 0px 1px;
	}

	.fa-bars-edit{
		font-size: 20px;margin: 5px;color: #0584f1;
	}

	.button-toggle:hover,.fa-bars-edit:hover{
		cursor:pointer; font-weight:bold; color: #0b70c9;
	}
	

</style>

<input type="hidden"  id="whereCondition" name="whereCondition" 
value=" WHERE {$ItemID} > 0">

<input type="hidden"  id="orderid" name="orderid" value="{$orderid}">
<input type="hidden"  id="detailid" name="detailid" value="{$detailid}">
<input type="hidden"  id="transfersFilter" name="transfersFilter" value="{$transfersFilter}">
<input type="hidden"  id="Search">



<div class="row itemsheader itemsheader-edit">

	<!-- Show and Hide Filters buttons: -->
	<div id="wrapp-buttons">
		<div id="show" class="button-toggle"><i class="fa-solid fa-bars fa-bars-edit"></i>{$SHOW_FILTERS}</div>
		<div id="hide" class="button-toggle"><i class="fa-solid fa-bars fa-bars-edit"></i>{$HIDE_FILTERS}</div>
	</div>

	
	<div class="filter">

		<div class="filterOlderAdd" style="padding:5px;float:left;margin-left:20px;">
			<b style="color:#157bff;">{$SORT_BY}:</b>
			<select id='sortField' class="select-top-edit" name='sortField' onchange="allItems();">
				<option value="OrderDate">{$ORDER_DATE}</option>	
				<option value="PickupDate">{$PICKUP_DATE}</option>		
			</select>				
			<select id='sortDirection' class="select-top-edit" name='sortDirection' onchange="allItems();">
				<option value="ASC">{$ASC}</option>	
				<option value="DESC">{$DESC}</option>		
			</select>
		</div>

		<br><br>

		<!-- Order: -->
		<div class="col-md-2 col-md-2-edit order-edit">
			<small class="badge blue text-black badge-edit">{$ORDER}</small><br>
			<input id='order' class="input-one" name='order'  placeholder="Order ID" onchange="allItems();"/><br>
						
			<select id='yearsOrder' class="form-control select-top-edit addon" name='yearsOrder' value='0' onchange="allItems();">
				<option value='0'>{$ALL_YEARS}</option>
			</select>
			
			<input id='orderFromDate' class="datepicker datepicker-edit" name='orderFromDate'  placeholder="From Date" onchange="allItems();" /><br>
			
			<select id="Type" class="form-control select-top-edit addon" onchange="allItems();">
				<option value="0">{$ALL} {$STATUS}</option>
				{section name=pom loop=$options}
					<option value="{$options[pom].id}">{$options[pom].name}</option>
				{/section}
			</select>
			
			<input id='orderToDate' class="datepicker datepicker-edit" name='orderToDate'  placeholder="To Date" onchange="allItems();" /><br>

		</div>

		<!-- Payment: -->
		<div class="col-md-2 col-md-2-edit"> 
			<small class="badge blue text-black badge-edit">{$PAYMENT}</small><br>
			<input id='paymentNumber' class="input-one" name='paymentNumber'  placeholder="Payment / Invoice No" onchange="allItems();"/>	
			
				<select id="PaymentMethod" class="w75 form-control select-top-edit" onchange="allItems();">		
					<option value="-1">{$ALL} {$PAYMENT}</option>
					{section name=pom loop=$options3}
						<option value="{$options3[pom].id}">{$options3[pom].name}</option>
					{/section}
				</select>
				<i class="fa fa-money" style="color:#900"></i><input type="checkbox" id="paymentChecker" name="paymentChecker"  value="" onchange="allItems();" />Checker				
		</div>

		<!-- Transfer: -->
		<div class="col-md-2 col-md-2-edit"> 
			<small class="badge blue text-black badge-edit">{$TRANSFER}</small><br>
			<input id='locationName' class="input-one" name='locationName'  placeholder="Location Name" onchange="allItems();"/>
			
				<input id='pickupFromDate' class="datepicker datepicker-edit-2 datepicker-edit-2-small" name='pickupFromDate'  placeholder="From Date" onchange="allItems();" style="width:80%;"/>
				<!--<select id='yearsPickup' class="select-top-edit" name='yearsPickup' value='0' onchange="allItems();">
					<option value='0'>All years</option>
				</select>!-->
				<i class="fa fa-cubes" style="color:#900"></i><input type="checkbox" id="listExtras" name="listExtras"  value="" onchange="allItems();" />
				</br>
				<input id='pickupToDate' class="datepicker datepicker-edit-2 datepicker-edit-2-small" name='pickupToDate'  placeholder="To Date" onchange="allItems();" style="width:80%;"/>				
		</div>

		<!-- Driver: -->
		<div class="col-md-2 col-md-2-edit">
			<small class="badge blue text-black badge-edit">{$PARTNER}</small><br>
			<input id='driverName' class="input-one" name='driverName'  placeholder="Name/ID" onchange="allItems();"/><br>
			
				<select id="DriverConfStatusChoose" class="w75 form-control select-top-edit" onchange="allItems();">		
					<option value="-1">{$ALL} {$STATUS}</option>
					{section name=pom loop=$options4}
						<option value="{$options4[pom].id}">{$options4[pom].name}</option>
					{/section}
				</select>
		</div>

		<!-- Client/Agent: -->
		<div class="col-md-2 col-md-2-edit">
			<small class="badge blue text-black badge-edit">{$PURCHASER}</small><br>
			<input id='agentName' class="input-one" name='agentName'  placeholder="Name/ID" onchange="allItems();"/><br>				
			<input id='agentOrder' class="input-one" name='agentOrder'  placeholder="Order Key / Agent Order" onchange="allItems();"/><br>				
			
				<select id="Type2" class="w75 form-control select-top-edit" onchange="allItems();">
					<option value="0">{$ALL} {$USERS}</option>
					{section name=pom2 loop=$options2}
						<option value="{$options2[pom2].id}">{$options2[pom2].name}</option>
					{/section}
				</select>
		</div>

		<!-- Passenger: -->
		<div class="col-md-2 col-md-2-edit">
			<small class="badge blue text-black badge-edit">{$PASSENGER}</small><br>
			<input id='passengerData' class="input-one" name='passengerData'  placeholder="Passenger Data" onchange="allItems();"/>					
			<i class="fa fa-plane" style="color:#900"></i><input type="checkbox" id="flightTimeChecker" name="flightTimeChecker"  value="" onchange="allItems();" />Flight Time Checker		
		</div>	

	</div> <!-- End of .filter -->


</div>

{* Scripts: *}
<script>


	function resize(){

		if ($(window).width() > 1551) {
			$('.filter').show();
			$('#show').hide();
			$('#hide').show();
			$('#wrapp-buttons').css("text-align",""); // Remove text align from #wrapp-buttons
		}

		if ($(window).width() < 1550 ) {
			$('#show').show();
			$('#hide').hide();
			$('#wrapp-buttons').css("text-align","center");	
		}


	} // End of function resize()


	$('#show').click(function() {
		$('.filter').fadeToggle();
		$('#show').hide();
		$('#hide').show();
	});

	$('#hide').click(function() {
		$('.filter').fadeToggle();
		$('#show').show();
		$('#hide').hide();
	});

	
	$(document).ready(function(){
		resize();
		$(window).resize(resize);
	});


</script>