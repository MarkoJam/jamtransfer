
		<div id="v4_VehiclesWrapperNew" class="editFrame container-fluid" style="display:none">
			<div id="inlineContentNew" class="row">
				<div id="new_v4_Vehicles">
					
				</div>
			</div>
		</div>
<?
	define("READ_ONLY_FLD","");
	$isNew = true;

	if (isset($_SESSION['UseDriverID']) && $_SESSION['UseDriverID']>0) require_once 'p/modules/v4_Vehicles/v4_VehiclesEditForm.Driver.php';
	else require_once 'p/modules/v4_Vehicles/v4_VehiclesEditForm.Admin.php';
	require_once 'p/modules/v4_Vehicles/v4_Vehicles_JS.php';
?>
<script>
	new_v4_Vehicles();
</script>
	