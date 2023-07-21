<?
	foreach($StatusDescription as $nn => $id) {
		$arr_row['id']=$nn;
		$arr_row['name']=$id;
		$arr_all[]=$arr_row;
	}
	$smarty->assign('options',$arr_all);
	
	$excl=array(0,1,2,4);
	foreach($DriverConfStatus as $nn => $id) {
		if (!in_array($nn,$excl)) {
			$arr_row['id']=$nn;
			$arr_row['name']=$id;
			$arr_all3[]=$arr_row;
		}
	}
	$smarty->assign('options3',$arr_all3);	
	$smarty->assign('selecttype',true);	
	$smarty->assign('selecttype3',true);	
	$smarty->assign('date1',true);
	$smarty->assign('date2',true);	
?>



<!-- Script: -->


<!-- =================================================================== -->

<script type="text/x-handlebars-template" id="ItemListTemplate">

<div class="nav-tabs-custom nav-tabs-custom-edit">
	<ul class="nav nav-tabs dorder">
		<li class="active"><a href="#tab_1" data-toggle="tab"><?=LIST_ORDER;?></a></li>
		<li><a href="#tab_2" data-toggle="tab"><?=REPORTER;?></a></li>
	</ul>
	<div class="tab-content tab-content-edit">	
		<div class="tab-pane active" id="tab_1">
			<div class="row row-edit">

				
				<div class="col-md-1">
					<?=ID;?>
				</div>					
				<div class="col-md-2">
					<?=SUBDRIVERS;?>
				</div>					
				<div class="col-md-2">
					Number of Drives
				</div>					
				<div class="col-md-2">
					Total Value
				</div>				
				<div class="col-md-2">
					FreeDays (now Working Days)
				</div>							
	
			</div>	
			{{#each Item}}
				<div>
				
					<div class="row {{color}} pad1em listTile listTile-edit orders-edit" 
					id="t_{{DetailsID}}">
						<div class="col-md-1">
							{{AuthUserID}}
						</div>
						<div class="col-md-2">						
							{{SubDriverName}}
						</div>						
						<div class="col-md-2">						
							{{NoT}} 
						</div>						
						<div class="col-md-2">						
							{{Value}} 
						</div>						
						<div class="col-md-2">						
							{{FreeDays}} 
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

		<!-- Reporter: -->
		<div class="tab-pane" id="tab_2">
			<div id="sum" class="sum-edit sum-edit-labels">


			</div> <!-- End of #sum -->
		
			{{#each Item2}}
				<div id="sum" class="sum-edit sum-edit-2">
					{{sdid}} {{not}}
				</div> <!-- End of #sum -->
			{{/each}}
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