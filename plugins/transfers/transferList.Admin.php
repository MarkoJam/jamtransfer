<script type="text/x-handlebars-template" id="transfersTemplate">

	{{#each transfers}}

		<a  onclick="showOneTransfer({{DetailsID}});">
		
			<div class="row xbox-solid xbg-light-blue {{color}} pad1em listTile" 
			style="border-top:1px solid #eee;border-bottom:0px solid #eee" 
			id="t_{{DetailsID}}">

					<div class="col-md-2">
						<i class="fa fa-user"></i> <strong>{{PaxName}}</strong><br>
						<small>
							<i class="fa fa-envelope-o"></i> {{MPaxEmail}}
							<br>
							<i class="fa fa-phone"></i> {{MPaxTel}}
							<br>
							<small>{{OrderDate}} {{MOrderTime}}</small>
						</small>
					</div>
					<div class="col-md-2">
						<strong>{{MOrderID}} - {{TNo}}</strong><br>
						{{addNumbers DetailPrice ExtraCharge}} €<br>
						<small>{{displayTransferStatusText TransferStatus}}</small>
					</div>
					

					
					<div class="col-md-2">
						{{#compare PickupDate ">=" "<?=date('Y')+1;?>-01-01"}}<span class="red-text">{{/compare}}
						{{PickupDate}}
						{{#compare PickupDate ">=" "<?=date('Y')+1;?>-01-01"}}</span>{{/compare}}
						<br>
						{{PickupTime}}
						<br>
						<i class="fa fa-user-times"></i> <strong>{{PaxNo}}</strong>&nbsp;
						<i class="fa fa-car"></i> <strong>{{VehiclesNo}}</strong>
						{{#compare ExtraCharge ">" 0}}
							<i class="fa fa-cubes" style="color:#900"></i>
						{{/compare}}
					</div>

					<div class="col-md-3">
						<strong>{{PickupName}}</strong>
						<br>
						<strong>{{DropName}}</strong>
						<br>
						{{#if StaffNote}}<small style="color:red">STAFF NOTE</small>{{/if}}	
					</div>
					<div class="col-md-3">
						{{!-- userName DriverID "AuthUserCompany" --}}
						{{#if DriverName}}
							<i class="fa fa-car"></i> {{DriverName}}
						{{/if}}	
						<br>
						<span class="{{driverConfStyle DriverConfStatus}}">{{driverConfText DriverConfStatus}}</span>
						{{#if FinalNote}}<span class="note btn btn-danger">Note</span>{{/if}}	
						<br>
						<small>{{DriverConfDate}} {{DriverConfTime}}</small>					 
					</div>
					{{#if FinalNote}}<small style="color:red">{{FinalNote}}</small>{{/if}}	
	
			</div>
		</a>
		
		<div id="transferWrapper{{DetailsID}}" class="editFrame" style="display:none">
			<div id="inlineContent{{DetailsID}}" class="row ">
				<div id="oneTransfer{{DetailsID}}" class="xcol-md-12">
					<?= THERE_ARE_NO_DATA ?>
				</div>
			</div>
		</div>

	{{/each}}

</script>

