{assign var="ID" value="{$sdArray[pom].Transfers[pom2].DetailsID}"}
<!-- Sub card: -->
{if $sdArray[pom].Transfers[pom2].ForTransfer}
<div class="sub-card">
	<div class="row" style="background:#b6d7a8; padding:10px;"> 
		<small><b>Connection transfer</b> {$sdArray[pom].Transfers[pom2].Device}</small><br>
		{$sdArray[pom].Transfers[pom2].Location} - {$sdArray[pom].Transfers[pom2].PickupName}
		<br>{$sdArray[pom].Transfers[pom2].Distance2}km / {$sdArray[pom].Transfers[pom2].Duration2}min / {$sdArray[pom].Transfers[pom2].Shedule}
	</div>
</div>	
{/if}
<div class="sub-card">
	<div class="bgColor" style="background:{$sdArray[pom].Transfers[pom2].bgColor};padding:10px;">
		{if $sdArray[pom].Transfers[pom2].TransferIn}
			<small><b>On transfer</b> {$sdArray[pom].Transfers[pom2].Device}</small><br>
			{$sdArray[pom].Transfers[pom2].Location} - {$sdArray[pom].Transfers[pom2].DropName}
			<br>{$sdArray[pom].Transfers[pom2].Distance2}km / {$sdArray[pom].Transfers[pom2].Duration2}min / {$sdArray[pom].Transfers[pom2].Shedule}
		{/if}
		<!-- row first -->
		<div class="row"> <!-- TRANSFER -->
			<span>
				{if $sdArray[pom].Transfers[pom2].UserLevelID eq '2'}
					<i class='fa fa-user-secret'></i>
						{if $sdArray[pom].Transfers[pom2].Image ne ""}
							<img src='i/agents/{$sdArray[pom].Transfers[pom2].Image}'>	 
							<b>{$sdArray[pom].Transfers[pom2].AuthUserRealName}</b>
						{/if}
				{/if}
			</span>					
			<strong>
				<a href="orders/detail/{$sdArray[pom].Transfers[pom2].DetailsID}" target="_blank">
					{$sdArray[pom].Transfers[pom2].MOrderKey}-{$sdArray[pom].Transfers[pom2].OrderID}-{$sdArray[pom].Transfers[pom2].TNo}
				</a>
			</strong>
			<strong>
				<input style='float:right;' class='check' onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},1)" id="checkdata_{$sdArray[pom].Transfers[pom2].DetailsID}" type="checkbox" name="checkeddata"
				{if $sdArray[pom].Transfers[pom2].DriverConfStatus gt 2}checked disabled{/if}>
				<input type="hidden" id="DriverConfStatus_{$sdArray[pom].Transfers[pom2].DetailsID}" name="DriverConfStatus" value="{$sdArray[pom].Transfers[pom2].DriverConfStatus}">	
				<label style='float:right;' for="checkeddata">{$READY} </label>	
			</strong>	
		</div>

		<!-- row second -->
		<div class="row">
			<h4>{$sdArray[pom].Transfers[pom2].PickupName} - {$sdArray[pom].Transfers[pom2].DropName}</h4>
		</div>

		<style>
			
			.form-group.form-group-edit{
				display: inline;
			}


			@media screen and (max-width:1000px){
				.form-group.form-group-edit{
					display: block;
				}

				.row-third-edit .col-md-3{
					margin-top: 10px;
				}
				.row-third-edit .form-control{
					width:100%;
				}

				.clock-timepicker{
					width:100% !important;
				}
				
				select{
					width:100%;
					margin-bottom: 5px;
				}
				
			}
		</style>

		<!-- row third -->
		<div class="row row-third-edit">

			<div class="col-md-3">
				<input type="text" class="timepicker w100 form-control {$sdArray[pom].Transfers[pom2].color} timepicker-edit" id="SubPickupTime_{$sdArray[pom].Transfers[pom2].DetailsID}"
					name="SubPickupTime_{$sdArray[pom].Transfers[pom2].DetailsID}"
					value="{$sdArray[pom].Transfers[pom2].SubPickupTime}" onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},0)">
			</div>

			<div class="col-md-3">
				<input type="text" class="w100 form-control {$sdArray[pom].Transfers[pom2].color2}"  id="PickupTimeX_{$sdArray[pom].Transfers[pom2].DetailsID}"
					name="PickupTimeX_{$sdArray[pom].Transfers[pom2].DetailsID}"
					value="{$sdArray[pom].Transfers[pom2].PickupTime}" />
			</div>
			<!-- info icons -->
			<div class="col-md-3 small align-middle">
				<i class="fa fa-user"></i>&nbsp;&nbsp;{$sdArray[pom].Transfers[pom2].PaxNo}
				<div class="form-group">
					<i class="fa fa-car {$sdArray[pom].Transfers[pom2].carColor} pad4px"></i> 
					{$sdArray[pom].Transfers[pom2].VehicleTypeName}
					{if $sdArray[pom].Transfers[pom2].VehiclesNo gt 1} x {$sdArray[pom].Transfers[pom2].VehiclesNo} {/if}
					<br>
				</div>
			</div>

			<div class="col-md-3">
			<i class="fa fa-clock-o"></i>		
				<div class="form-group form-group-edit">
				
					<input type="text" name="TransferDuration_{$sdArray[pom].Transfers[pom2].DetailsID}" 
					id="TransferDuration_{$sdArray[pom].Transfers[pom2].DetailsID}" class="form-control" size="2" value="{$sdArray[pom].Transfers[pom2].TransferDuration}" 
					title="Transfer duration"  onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},0)">
				</div>	
				<div>
					{if $sdArray[pom].Transfers[pom2].Extras|count gt 0}<i class="fa fa-cubes red-text"></i>{/if}
				</div>
			</div>

		</div> 
		
		<!-- row forth -->
		<div class="row">
			{if $sdArray[pom].Transfers[pom2].FsLink ne ''}
				<big><a target="_blank" href="{$sdArray[pom].Transfers[pom2].FsLink}"><i class="fa fa-plane" aria-hidden="true"></i></a></big>
			{else}
				<i class="fa fa-plane" aria-hidden="true"></i>
			{/if}	
			<input type="text" name="FlightNo_{$sdArray[pom].Transfers[pom2].DetailsID}" id="FlightNo_{$sdArray[pom].Transfers[pom2].DetailsID}"
			value="{$sdArray[pom].Transfers[pom2].FlightNo}" onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},0)">
			<input type="text" name="FlightTime_{$sdArray[pom].Transfers[pom2].DetailsID}" class="timepicker" id="FlightTime_{$sdArray[pom].Transfers[pom2].DetailsID}"
			value="{$sdArray[pom].Transfers[pom2].FlightTime}" onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},0)">
			{if $sdArray[pom].Transfers[pom2].flightTimeConflict}
				<span class='blink'>{$FLIGHT_TIME_CONFLICT}</span>
				{$sdArray[pom].Transfers[pom2].FlightTime}
			{/if}			
		</div>
				
		<!-- row fifth -->
		<div class="row" style="line-height:140%">
			<div class="col-md-10">
				<select class="subdriver1" data-id="{$sdArray[pom].Transfers[pom2].DetailsID}"
				id="SubDriver_{$sdArray[pom].Transfers[pom2].DetailsID}" name="SubDriver_{$sdArray[pom].Transfers[pom2].DetailsID}" onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},0)">
					<option value='0'> --- </option>
					{section name=pom3 loop=$sddArray}
						<option value="{$sddArray[pom3].DriverID}" data-mob="{$sddArray[pom3].Mob}";
						{if $sddArray[pom3].DriverID eq $sdArray[pom].Transfers[pom2].SubDriver}
							selected
						{/if}	
						>{$sddArray[pom3].DriverName} - {$sddArray[pom3].DriverCar}</option>';
					{/section}	
				</select>
			</div>
			<div class="col-md-2">
				<a href="#" class="btn btn-default" onclick="return ShowSubdriver2('{$sdArray[pom].Transfers[pom2].DetailsID}');">
					<i class="fa fa-plus"></i>
				</a>
			</div>		
		</div>
		
		<!-- Hidden or not: -->
		<div id="subDriver2{$sdArray[pom].Transfers[pom2].DetailsID}" class="row {if  $sdArray[pom].Transfers[pom2].SubDriver2 eq 0}hidden{/if}" style="line-height:140%">
			<div class="col-md-10">
				<select class="subdriver1" data-id="{$sdArray[pom].Transfers[pom2].DetailsID}"
				id="SubDriver_{$sdArray[pom].Transfers[pom2].DetailsID}" name="SubDriver_{$sdArray[pom].Transfers[pom2].DetailsID}" onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},0)">
					<option value='0'> --- </option>
					{section name=pom3 loop=$sddArray}
						<option value="{$sddArray[pom3].DriverID}" data-mob="{$sddArray[pom3].Mob}";
						{if $sddArray[pom3].DriverID eq $sdArray[pom].Transfers[pom2].SubDriver2}
							selected
						{/if}	
						>{$sddArray[pom3].DriverName} - {$sddArray[pom3].DriverCar}</option>';
					{/section}	
				</select>
			</div>
			<div class="col-md-2">
				<a href="#" class="btn btn-default" onclick="return ShowSubdriver3('{$sdArray[pom].Transfers[pom2].DetailsID}');">
					<i class="fa fa-plus"></i>
				</a>
			</div>			
		</div>

		<!-- Hidden or not: -->
		<div id="subDriver3{$sdArray[pom].Transfers[pom2].DetailsID}"  class="row {if  $sdArray[pom].Transfers[pom2].SubDriver3 eq 0}hidden{/if}" style="line-height:140%">
			<div class="col-md-10">
				<select class="subdriver1" data-id="{$sdArray[pom].Transfers[pom2].DetailsID}"
				id="SubDriver_{$sdArray[pom].Transfers[pom2].DetailsID}" name="SubDriver_{$sdArray[pom].Transfers[pom2].DetailsID}" onchange="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},0)">
					<option value='0'> --- </option>
					{section name=pom3 loop=$sddArray}
						<option value="{$sddArray[pom3].DriverID}" data-mob="{$sddArray[pom3].Mob}";
						{if $sddArray[pom3].DriverID eq $sdArray[pom].Transfers[pom2].SubDriver3}
							selected
						{/if}	
						>{$sddArray[pom3].DriverName} - {$sddArray[pom3].DriverCar}</option>';
					{/section}	
				</select>
			</div>
		</div>

		<div class="row">
			<button class="btn-xs btn-primary btn-block" onclick="ShowShow({$sdArray[pom].Transfers[pom2].DetailsID});toggleChevron(this);">
			{if $sdArray[pom].Transfers[pom2].Notes}<span class='blink'><i class="fa fa-envelope" aria-hidden="true"></i></span>&nbsp;{/if}
				<i class="fa fa-chevron-down"></i>
			</button>
		</div> 

		<!-- hiddenInfo -->
		<div class="row lighten-4 pad1em shadow add-hiddenInfo" id="show{$sdArray[pom].Transfers[pom2].DetailsID}" style="display:none;margin:0">
			{* Detalji transfera *}
			<div class="row">
				<div class="row-one">

					{if !empty($sdArray[pom].Transfers[pom2].MConfirmFile)}
						<br>
						Ref.No:  <b>{$sdArray[pom].Transfers[pom2].MConfirmFile} </b>
						<br>    
						Emergency: <b> {$sdArray[pom].Transfers[pom2].EmergencyPhone} </b>
					{/if}

					<br>					
					<strong>{$sdArray[pom].Transfers[pom2].PaxName}</strong> 
					<a href="tel:{$sdArray[pom].Transfers[pom2].MPaxTel}">{$sdArray[pom].Transfers[pom2].MPaxTel}</a>
				</div>

				<div class="row-two">
					<strong>{$sdArray[pom].Transfers[pom2].PickupName}</strong> {$sdArray[pom].Transfers[pom2].PickupAddress}
					<br> 
					<strong>{$sdArray[pom].Transfers[pom2].DropName}</strong> {$sdArray[pom].Transfers[pom2].DropAddress}
				</div>

				<div class="row-third">
					{if $sdArray[pom].Transfers[pom2].PayNow gt 0}
						{$PAID_ONLINE} {$sdArray[pom].Transfers[pom2].PayNow}
					{/if}	
					{if $sdArray[pom].Transfers[pom2].PayLater gt 0}
						{$CASH} {$sdArray[pom].Transfers[pom2].PayLater}
						<small class="bold">{$RECIVE_CASH}</small>
						<input type="text" name="CashIn_{$sdArray[pom].Transfers[pom2].DetailsID}" id="CashIn_{$sdArray[pom].Transfers[pom2].DetailsID}" value="{$sdArray[pom].Transfers[pom2].CashIn}">
					{/if}

					{if $sdArray[pom].Transfers[pom2].PayNow > 0 and $sdArray[pom].Transfers[pom2].PayLater > 0}<b style='color:red'>{$MAKE_BILL}</b>{/if}
					<br>
					{$sdArray[pom].Transfers[pom2].OtherTransfer }
					{section name=pom3 loop=$sdArray[pom].Transfers[pom2].Extras}
						<div class="row">
							{$sdArray[pom].Transfers[pom2].Extras[pom3].Name}
							{if $sdArray[pom].Transfers[pom2].Extras[pom3].Qty gt 1}x{$sdArray[pom].Transfers[pom2].Extras[pom3].Qty}{/if}
						</div>	

					{/section}
					
				</div>

			</div> {* /.row *}


			<hr style="border-color:gray">

			<div class="row">

				{if $sdArray[pom].Transfers[pom2].PickupNotes}
				<div class="row-one">
					<small class="bold">{PICKUP_NOTE}</small></br>
					{$sdArray[pom].Transfers[pom2].PickupNotes}
				</div>
				{/if}

				<div class="row-two">
					<small class="bold">{STAFF_NOTE}</small></br>
					<textarea name="StaffNote_{$sdArray[pom].Transfers[pom2].DetailsID}" id="StaffNote_{$sdArray[pom].Transfers[pom2].DetailsID}"
					rows="4">{$sdArray[pom].Transfers[pom2].StaffNote|stripslashes}</textarea>
				</div>

				<div class="row-third">
					<small class="bold">{NOTES_TO_DRIVER}</small><br>
					<textarea style="border: 1px solid #ddd;" name="SubDriverNote_{$sdArray[pom].Transfers[pom2].DetailsID}" 
					id="SubDriverNote_{$sdArray[pom].Transfers[pom2].DetailsID}" class="span3" rows="4">
					{$sdArray[pom].Transfers[pom2].SubDriverNote|stripslashes}</textarea>
				</div>

				{if $sdArray[pom].Transfers[pom2].FinalNote or $sdArray[pom].Transfers[pom2].SubFinalNote}
				<div class="row-forth">
					<small class="bold">{FINAL_NOTE}</small><br>
					{$sdArray[pom].Transfers[pom2].SubFinalNote}<br>
					{$sdArray[pom].Transfers[pom2].FinalNote}
				</div>
				{/if}
			
			</div> {* ./row *}


			<hr style="border-color:gray">

			<input type="hidden" name="OrderID_{$sdArray[pom].Transfers[pom2].DetailsID}" id="OrderID_{$sdArray[pom].Transfers[pom2].DetailsID}" value="{$sdArray[pom].Transfers[pom2].OrderID}">
			
			<div class="col-md-6">
				<button class="btn btn-primary btn-block" onclick="saveTransfer({$sdArray[pom].Transfers[pom2].DetailsID},1)">
					<i class="fa fa-save"></i> Save
				</button>
			</div>
			



		</div> {* ./add-hiddenInfo *}
	</div> {* ./bgColor *}
</div> {* ./sub-card *}




<script>

	function displayMob() {
		$( ".subdriver1" ).each(function() {
			var id = $(this).attr('data-id');
			var mob = $('option:selected',this).attr('data-mob');
			var mobid='#'+'mob'+id;
			$(mobid).text(mob);
			$(mobid).attr('href',('tel:'+mob));
		});	
	}
	function saveTransfer (i,mail) {
		//displayMob();
		//var id	= $("#ID_" + i).val();
		var oid	= $("#OrderID_" + i).val();
		var checked = $('#checkdata_'+i).prop('checked');
		if (checked) {
			checked=1;
			$('#checkdata'+i).prop('checked',true);
			$('#checkdata'+i).prop('disabled',true);

			var driverconfirmationstatus=3;
			if (mail == 1) console.log('Sending message to client');
		}	
		else {
			checked=0;
			var driverconfirmationstatus=$("#DriverConfStatus_" + i).val();			
			$('#checkdata'+i).prop('checked',false);
			$('#checkdata'+i).prop('disabled',false);
			mail=0;
		}
		var fn	= $("#SubFlightNo_" + i).val();
		var ft	= $("#SubFlightTime_" + i).val();
		var pt	= $("#SubPickupTime_" + i).val();
		var sd	= $("select#SubDriver_" + i).val();
		var sd2	= $("select#SubDriver2_" + i).val();
		var sd3	= $("select#SubDriver3_" + i).val();
		var c	= $("select#Car_" + i).val();
		var c2	= $("select#Car2_" + i).val();
		var c3	= $("select#Car3_" + i).val();
		var sn	= $("#StaffNote_" + i).val();
		var n	= $("#SubDriverNote_" + i).val();
		var g	= $("#CashIn_" + i).val();
		var td	= $("#TransferDuration_" + i).val();
		var msg = $("#save-button-msg-" + i);

		msg.innerHTML = "Saving...";
		var url= "plugins/Schedule/ajax_updateNotes.php";
		var param = 'ID='+i+'&OrderID='+oid+'&DriverConfStatus='+driverconfirmationstatus+'&CustomerID='+checked+'&SubFlightNo='+fn+'&SubFlightTime='+ft+'&SubPickupTime='+pt+'&SubDriver='+sd+'&SubDriver2='+sd2+'&SubDriver3='+sd3+'&Car='+c+'&Car2='+c2+'&Car3='+c3+'&StaffNote='+ sn+'&Notes='+n+'&CashIn='+g+'&TransferDuration='+ td+'&Mail='+ mail;
		console.log(url+'?'+param);
		$.ajax({
			url: url,
			type: "POST",
			data: {
				ID: i,
				OrderID: oid,
				DriverConfStatus: driverconfirmationstatus,
				CustomerID: checked,								
				SubFlightNo: fn,
				SubFlightTime: ft,
				SubPickupTime: pt,
				SubDriver: sd,
				SubDriver2: sd2,
				SubDriver3: sd3,
				Car: c,
				Car2: c2,
				Car3: c3,
				StaffNote: sn,
				Notes: n,
				CashIn: g,
				TransferDuration: td,
				Mail: mail
			},
			success: function (result) {
				msg.innerHTML = "Saved";

				$("#upd"+i).html(result);
				var res = $.trim(result);
				
				if(res != '<small>Saved.</small>') {
					$.toaster(result, 'Oops', 'success red-2');
				}
				if ((sd == '0') || (c == '0')) {
					$("#indicator_"+i).css("borderLeftColor","red");
				}
				else {
					$("#indicator_"+i).css("borderLeftColor","green");
				}
			},
			error: function (e) {
				msg.innerHTML = "Error";
				// console.log("Error:");
				// console.log(e);
			}
		});
	}


	
	function ShowShow(i) {
		$("#show"+i).toggle('slow');
	}
	
	function toggleChevron (button) {
		if (button.innerHTML == '<i class="fa fa-chevron-up"></i>')
			button.innerHTML = '<i class="fa fa-chevron-down"></i>';
		else button.innerHTML = '<i class="fa fa-chevron-up"></i>';
	}
	
	function ShowSubdriver2(i)
	{
	    $("#subDriver2"+i).toggle('slow');
	    return false;
	}

	function ShowSubdriver3(i)
	{
	    $("#subDriver3"+i).toggle('slow');
	    return false;
	}
</script>	