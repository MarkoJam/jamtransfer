<script type="text/x-handlebars-template" id="ItemListTemplate">

	<!-- Labels: -->
	<div class="row row-edit">
		<div class="col-md-12">

			<div class="col-md-2">
				<?=VEHICLEID;?>
			</div>

			<div class="col-md-2">
				<?=STARTDATE;?>
			</div>

			<div class="col-md-2">
				<?=STARTTIME;?>
			</div>

			<div class="col-md-2">
				<?=ENDDATE;?>
			</div>

			<div class="col-md-2">
				<?=ENDTIME;?>
			</div>

			<div class="col-md-2">
				<?=REASON;?>
			</div>

		</div>			
	</div>

	<!-- Main content: -->
	{{#each Item}}
		
		<div class="row {{color}} pad1em listTile listTitleEdit" 
		style="border-top:1px solid #ddd" 
		id="t_{{ID}}">

			<form>
				<!-- ID -->
				<input type="hidden" name="ID" id="ID" class="w100" value="{{ID}}">

				<div class="col-md-12">
					
					<!-- VEHICLEID -->
					<div class="col-md-2">
						<input type="text" name="VehicleID" id="VehicleID" class="w100" value="{{VehicleID}}">
					</div>

					<!-- STARTDATE -->
					<div class="col-md-2">
						<input type="text" name="StartDate" id="StartDate" 
						class="w25 datepicker" value="{{StartDate}}">
					</div>

					<!-- STARTTIME	-->
					<div class="col-md-2">
						<input type="text" name="StartTime" id="StartTime" 
						class="w25 timepicker" value="{{StartTime}}">
					</div>

					<!-- ENDDATE -->
					<div class="col-md-2">
						<input type="text" name="EndDate" id="EndDate" 
						class="w25 datepicker" value="{{EndDate}}">
					</div>

					<!-- ENDTIME -->
					<div class="col-md-2">
						<input type="text" name="EndTime" id="EndTime" 
						class="w25 timepicker" value="{{EndTime}}">
					</div>

					<!-- REASON -->
					<div class="col-md-2">
						<input type="text" name="Reason" id="Reason" class="w100" value="{{Reason}}">
					</div>

				</div>
			</form>	
		</div>

	{{/each}}

	<script>
		$('input').change(function(){
			var base=window.location.origin;
			if (window.location.host=='localhost') base=base+'/jamtransfer';

			var link = base+'/plugins/OffDuty/Save.php';

			var param = $(this).parent().parent().parent().serialize();

			console.log(link+'?'+param)

			$.ajax({
				type: 'POST',
				url: link,
				data: param,
				success: function(data) {
				}				
			});
			
		})	
	</script>

</script>
	
