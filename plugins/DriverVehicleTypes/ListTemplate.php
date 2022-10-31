<?
	$arr_row['id']=1;
	$arr_row['name']="Connected";
	$arr_all[]=$arr_row;	
	$arr_row['id']=2;
	$arr_row['name']="Not Connected";
	$arr_all[]=$arr_row;	
	$smarty->assign('options',$arr_all);
	$smarty->assign('selecttype',true);
?>

<script type="text/x-handlebars-template" id="ItemListTemplate">
		<div class="row">
			<div class="col-sm-1">
				VehicleType ID
			</div>							
			<div class="col-sm-3">
				VehicleType Name
			</div>	
			<div class="col-md-1">
				Connected
			</div>				
			<!-- SURCATEGORY: -->
			<div class="col-md-3">
				<?=SURCATEGORY;?>
			</div>
			<div class="col-md-1">
				Prices
			</div>				

		</div>

	{{#each Item}}

			<div>		
				<div class="row {{color}} pad1em listTile" 
				style="border-top:1px solid #ddd" 
				id="t_{{VehicleTypeID}}">
						<!-- VehicleTypeID: -->
						<div class="col-sm-1">
							{{VehicleTypeID}}
						</div>
						<!-- VehicleTypeName: -->
						<div class="col-sm-3">
							<strong>{{VehicleTypeName}}</strong>
						</div>
						<!-- Connected:  -->
						<div class="col-md-1 vehicle active1" data-id="{{VehicleTypeID}}" data-change="1" data-active="{{DriverVehicle}}">
							<span>{{yesNoSliderEdit DriverVehicle 'DriverVehicle' }}</span>
						</div>

						<!-- Subcategory: -->
						<div class="col-md-3 surcategory" data-status="{{PriceRules2}}" data-id="{{VehicleTypeID}}">
							<span class="show_hide">{{SurCategoryRB PriceRules 'SurCategory' '2' 'vehicles' VehicleTypeID}}</span>
						</div>
						<!-- Prices: -->
						<div class="col-md-1">
							<span class="show_hide"><a target='_blank' href='services/vehicleType/{{VehicleTypeID}}'>Routes</a></span>
						</div>
				</div>
			</div>

	{{/each}}
	<script>
		$('.show_hide').each(function(){
			if ($(this).parent().parent().find('.active1').attr('data-active')==0) $(this).hide();
		});		

		$('.vehicle input').change(function(){
			var change=$(this).parent().parent().attr('data-change');	
			var vehicleid=$(this).parent().parent().attr('data-id');
			if (change==1) var drivervehicle=$(this).val();	
			var base=window.location.origin;
			if (window.location.host=='localhost') base=base+'/jamtransfer';
			if (change==1) var link = base+'/plugins/DriverVehicleTypes/Save.php';
			if (change==1) var param = "VehicleTypeID="+vehicleid+"&DriverVehicle="+drivervehicle;
			var $t = $(this);
			console.log(link+'?'+param);
			$.ajax({
				type: 'POST',
				url: link,
				data: param,
				success: function(data) {
					if (data==0) $t.parent().parent().parent().find('.show_hide').hide(500);
					if (data==1) $t.parent().parent().parent().find('.show_hide').show(500);						
				}				
			});
		})	
		$('.surcategory input').change(function(){
			var surcategory=$(this).val();
			var vehicleid=$(this).parent().parent().parent().attr('data-id');
			var base=window.location.origin;
			if (window.location.host=='localhost') base=base+'/jamtransfer';		
			var link = base+'/plugins/DriverVehicleTypes/Update.php';
			var param = "VehicleTypeID="+vehicleid+"&SurCategory="+surcategory;
			console.log(link+'?'+param);
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
	