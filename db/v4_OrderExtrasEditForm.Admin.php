
<script type="text/x-handlebars-template" id="v4_OrderExtrasEditTemplate">
<form id="v4_OrderExtrasEditForm{{ID}}" class="form box box-info" enctype="multipart/form-data" method="post" onsubmit="return false;">
	<div class="box-header">
		<div class="box-title">
			<? if ($isNew) { ?>
				<h3><?= NNEW ?></h3>
			<? } else { ?>
				<h3><?= EDIT ?> - {{ID}}</h3>
			<? } ?>
		</div>
		<div class="box-tools pull-right">
			
			<span id="statusMessage" class="text-info xl"></span>
			
			<? if (!$isNew) { ?>
				<? if ($inList=='true') { ?>
					<button class="btn" title="<?= CLOSE?>" 
					onclick="return editClosev4_OrderExtras('{{ID}}', '<?= $inList ?>');">
					<i class="fa fa-arrow-up"></i>
					</button>
				<? } else { ?>
					<button class="btn btn-danger" title="<?= CANCEL ?>" 
					onclick="return deletev4_OrderExtras('{{ID}}', '<?= $inList ?>');">
					<i class="fa fa-ban"></i>
					</button>
				<? } ?>	
			<? } ?>	
			<button class="btn btn-info" title="<?= SAVE_CHANGES ?>" 
			onclick="return editSavev4_OrderExtras('{{ID}}', '<?= $inList ?>');">
			<i class="ic-disk"></i>
			</button>
			<? if (!$isNew) { ?>
				<button class="btn btn-danger" title="<?= PRINTIT ?>" 
				onclick="return editPrintv4_OrderExtras('{{ID}}', '<?= $inList ?>');">
				<i class="ic-print"></i>
				</button>
			<? } ?>	
		</div>
	</div>

	<div class="box-body ">
        <div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-3">
						<label for="ID"><?=ID;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="ID" id="ID" class="w100" value="{{ID}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="OwnerID"><?=OWNERID;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="OwnerID" id="OwnerID" class="w100" value="{{OwnerID}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="OrderDetailsID"><?=ORDERDETAILSID;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="OrderDetailsID" id="OrderDetailsID" class="w100" value="{{OrderDetailsID}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="ServiceID"><?=SERVICEID;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="ServiceID" id="ServiceID" class="w100" value="{{ServiceID}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="ServiceName"><?=SERVICENAME;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="ServiceName" id="ServiceName" class="w100" value="{{ServiceName}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="Provision"><?=PROVISION;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="Provision" id="Provision" class="w100" value="{{Provision}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="DriverPrice"><?=DRIVERPRICE;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="DriverPrice" id="DriverPrice" class="w100" value="{{DriverPrice}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="Price"><?=PRICE;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="Price" id="Price" class="w100" value="{{Price}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="Qty"><?=QTY;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="Qty" id="Qty" class="w100" value="{{Qty}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="DriverPriceSum"><?=DRIVERPRICESUM;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="DriverPriceSum" id="DriverPriceSum" class="w100" value="{{DriverPriceSum}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="Sum"><?=SUM;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="Sum" id="Sum" class="w100" value="{{Sum}}">
					</div>
				</div>


			</div>
	    </div>
		    

	<!-- Statuses and messages -->
	<div class="box-footer">
		<? if (!$isNew) { ?>
		<div>
    	<button class="btn btn-default" onclick="return deletev4_OrderExtras('{{ID}}', '<?= $inList ?>');">
    		<i class="ic-cancel-circle"></i> <?= DELETE ?>
    	</button>
    	</div>
    	<? } ?>

	</div>
</form>


	<script>

		//bootstrap WYSIHTML5 - text editor
		$(".textarea").wysihtml5({
				"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
				"emphasis": true, //Italics, bold, etc. Default true
				"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
				"html": true, //Button which allows you to edit the generated HTML. Default false
				"link": true, //Button to insert a link. Default true
				"image": true, //Button to insert an image. Default true,
				"color": true //Button to change color of font 
				
		});
		
		// uklanja ikonu Saved - statusMessage sa ekrana
		$("form").change(function(){
			$("#statusMessage").html('');
		});
	
	</script>
</script>
	