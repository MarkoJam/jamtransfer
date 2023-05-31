<?
	foreach($StatusDescription as $nn => $id) {
		$arr_row['id']=$nn;
		$arr_row['name']=$id;
		$arr_all[]=$arr_row;
	}
	$smarty->assign('options',$arr_all);
	
	require_once ROOT.'/db/v4_AuthLevels.class.php';
	$al = new v4_AuthLevels();
	$where = " WHERE AuthLevelID in (2,3,4,5,6,12,41,91)";
	$authLevels = $al->getKeysBy('AuthLevelName', 'asc', $where);
	foreach($authLevels as $nn => $id) {
		$al->getRow($id);
		$arr_row['id']=$al->getAuthLevelID();
		$arr_row['name']=$al->getAuthLevelName();
		$arr_all2[]=$arr_row;
	}
	$smarty->assign('options2',$arr_all2);
	
	foreach($PaymentMethod as $nn => $id) {
		$arr_row['id']=$nn;
		$arr_row['name']=$id;
		$arr_all3[]=$arr_row;
	}
	$smarty->assign('options3',$arr_all3);		
	
	foreach($DriverConfStatus as $nn => $id) {
		$arr_row['id']=$nn;
		$arr_row['name']=$id;
		$arr_all4[]=$arr_row;
	}
	$smarty->assign('options4',$arr_all4);	
?>

<style>
	.right-edit{
		border-bottom: 1px solid #1b8aab;
		font-size: 22px;
		background: #c8dff3;
		padding: 1px 5px;
		border-radius: 5px;
		box-shadow: 2px 1px 3px 0px #6ba4e3;
		/* box-shadow: 2px 1px 3px 0px #4a4848; old */
		text-shadow: #4ba7e1 1px 0 2px;
	}

	.right-edit a{
		color: #1186e0;
		/* Old:
		color: #0c81e5;
		background: #dbdbdb; 
		*/
	}

	.right-edit a:hover{
		color: #009efb;
	}

	.inner-edit{
		border-style: none !important;
	}

	.icon h4{
		color: cornflowerblue;
	}

	.grey{
		background-color: #6cd7f3 !important;
	}


</style>


<!-- Script: -->


<!-- =================================================================== -->

<script type="text/x-handlebars-template" id="ItemListTemplate">

<div class="nav-tabs-custom nav-tabs-custom-edit">
	<ul class="nav nav-tabs dorder">
					<li class="active"><a href="#tab_1" data-toggle="tab">List</a></li>
					<li><a href="#tab_2" data-toggle="tab">Reporter</a></li>
					<li><a href="#tab_3" data-toggle="tab">Checker</a></li>
	</ul>
	<div class="tab-content tab-content-edit">	
		<div class="tab-pane active" id="tab_1">
			{{#each Item}}
				<div>
				
					<div class="row {{color}} pad1em listTile listTile-edit orders-edit" 
					id="t_{{DetailsID}}">

							<div class="col-md-2 order"  onclick="oneItem({{DetailsID}},'order');">	
								<small>{{OrderDate}} {{MOrderTime}}</small></br>
								<strong>{{MOrderID}} - {{TNo}}</strong><br>
								<small>{{displayTransferStatusText TransferStatus}}</small>
								{{#if StaffNote}}<small style="color:red"><i class="fa-solid fa-message"></i></small>{{/if}}				
								{{#if FinalNote}}<small style="color:red"><i class="fa-solid fa-message"></i></small>{{/if}}	
							</div>
							<div class="col-md-2 small-box payment" onclick="oneItem({{DetailsID}},'payment');">
								<div class="inner inner-edit">
									<strong>{{addNumbers DetailPrice ExtraCharge}} €</strong><br>
									{{paymentMethodText PaymentMethod}} <br>
									<small>
									{{#compare PaymentMethod "==" "1"}} {{MCardNumber}}	{{/compare}}
									{{#compare PaymentMethod "==" "3"}} {{MCardNumber}}	{{/compare}}						
									{{#compare PaymentMethod "==" "2"}} {{DriverInvoiceNumber}}	{{/compare}}
									{{#compare PaymentMethod "==" "4"}} {{InvoiceNumber}} {{/compare}}
									{{#compare PaymentMethod "==" "6"}} {{InvoiceNumber}}	{{/compare}}
									</small>	
								</div>	
								<div class="icon">
									<i class="fa fa-file-invoice" style="font-size:60px;"></i>
								</div>						
							</div>
							
							<div class="col-md-2 small-box transfer" onclick="oneItem({{DetailsID}},'transfer');">
								<div class="inner inner-edit">
									{{#compare PickupDate ">=" "<?=date('Y')+1;?>-01-01"}}<span class="red-text">{{/compare}}
									{{PickupDate}}
									{{#compare PickupDate ">=" "<?=date('Y')+1;?>-01-01"}}</span>{{/compare}}
									<span>{{PickupTime}}</span>
									</br>
									<strong>{{PickupName}} - {{DropName}}</strong>
									<br>						
									<small><i class="fa fa-car"></i> {{VehicleTypeName}}*{{VehiclesNo}}</small>
									{{#compare ExtraCharge ">" 0}}
										<i class="fa fa-cubes" style="color:#900"></i>
									{{/compare}}
								</div>
								<div class="icon">
									<i class="fa fa-road" style="font-size:60px;"></i>
								</div>							
							</div>
							<div class="col-md-2 small-box pdriver" onclick="oneItem({{DetailsID}},'pdriver');">
								<div class="inner inner-edit">
									{{#if DriverName}}
										<strong><small>{{DriverName}}</small></strong>
									{{/if}}	
									<br>
									{{DriversPrice}} €<br>
									<small class="{{driverConfStyle DriverConfStatus}}">{{driverConfText DriverConfStatus}}</small>
									{{#if DriverNotes}}<small style="color:red"><i class="fa-solid fa-message"></i></small>{{/if}}				
									{{#if SubFinalNote}}<small style="color:red"><i class="fa-solid fa-message"></i></small>{{/if}}				
								</div>	
								<div class="icon">
									<h4>Driver company</h4>
								</div>						
							</div>
							<div class="col-md-2 small-box agent" onclick="oneItem({{DetailsID}},'agent');">
								<div class="inner inner-edit">
									{{MOrderKey}}<br>
									{{MConfirmFile}}<br>						
									{{#compare AgentID '>' 0}}
										<img src='i/agents/{{Image}}'>	 
									{{/compare}}	
									<strong>{{UserName}}</strong>
								</div>	
								<div class="icon">
									<h4>Purchaser</h4>
								</div>								
							</div>					
							<div class="col-md-2 small-box passenger" onclick="oneItem({{DetailsID}},'passenger');">
								<div class="inner inner-edit">					
									<i class="fa fa-user"></i> <strong>{{PaxName}}</strong><br>
									<small>
										<i class="fa fa-envelope-o"></i> {{MPaxEmail}}
										<br>
										<i class="fa fa-phone"></i> {{MPaxTel}}
									</small>
								</div>	
								<div class="icon">
									<i class="fa fa-person" style="font-size:60px;"></i>
								</div>								
							</div>

					</div>

				</div>

				<div id="ItemWrapper{{DetailsID}}" class="editFrame" style="display:none">
					<div id="inlineContent{{DetailsID}}" class="row">
						<div id="one_Item{{DetailsID}}" >
							<?= LOADING ?>
						</div>
					</div>
				</div>
			{{/each}}
		</div>
		<div class="tab-pane" id="tab_2">
			<div id="sum">
				Item Number {{Item2.ItemNumber}} <br>
				Discount {{Item2.Discount}} <br>				
				DetailPrice {{Item2.DetailPrice}} <br>
				ExtraCharge {{Item2.ExtraCharge}} <br>
				Provision {{Item2.Provision}} <br>		
				DriversPrice {{Item2.DriversPrice}} <br>
				DriverExtraCharge {{Item2.DriverExtraCharge}} <br>
				GrossMargin {{Item2.GrossMargin}} <br>
				Ratio <b>{{Item2.Ratio}}</b> <br>
			</div>
		</div>		
		<div class="tab-pane" id="tab_3">
			Under consturction
		</div>
	</div>
</div>	

	<script>

	// Change the icon and sorting:
	async function setSort(field,direction) {
		$('#sortField').val(field);
		$('#sortDirection').val(direction);
	}	
	function allSort(field,direction) {	
		setSort(field,direction).then(function() {allItems();});
	}	
</script>



</script>




