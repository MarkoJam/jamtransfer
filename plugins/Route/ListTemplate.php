<?
if (isset($_SESSION['UseDriverID']) && $_SESSION['UseDriverID']>0) {	
	$arr_row['id']=1;
	$arr_row['name']="Connected";
	$arr_all[]=$arr_row;	
	$arr_row['id']=2;
	$arr_row['name']="Not Connected";
	$arr_all[]=$arr_row;	
	$smarty->assign('options',$arr_all);
	$smarty->assign('selecttype',true);
}
?>

<script type="text/x-handlebars-template" id="ItemListTemplate">


	{{#each Item}}
	<div class="row">
		<div class="col-sm-10">		
			<div  onclick="oneItem({{RouteID}});">		
				<div class="row {{color}} pad1em listTile" 
				style="border-top:1px solid #ddd" 
				id="t_{{RouteID}}">
						
						<div class="col-sm-5">
							{{RouteName}}
						</div>					
						<div class="col-sm-1">
						
							{{#compare Approved ">" 0}}
								<i class="fa fa-check text-green"></i>
							{{else}}
								<i class="fa fa-close text-red"></i>
							{{/compare}}											
						</div>
				</div>
			</div>
			<div id="ItemWrapper{{RouteID}}" class="editFrame" style="display:none">
				<div id="inlineContent{{RouteID}}" class="row">
					<div id="one_Item{{RouteID}}" >
						<?= LOADING ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
	{{/each}}


</script>
	
