
<script type="text/x-handlebars-template" id="v4_SurchargesEditTemplate">
<form id="v4_SurchargesEditForm{{OwnerID}}" class="form box box-info" enctype="multipart/form-data" method="post" onsubmit="return false;">
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
					onclick="return editClosev4_Surcharges('{{OwnerID}}', '<?= $inList ?>');">
					<i class="fa fa-arrow-up"></i>
					</button>
				<? } else { ?>
					<button class="btn btn-danger" title="<?= CANCEL ?>" 
					onclick="return deletev4_Surcharges('{{OwnerID}}', '<?= $inList ?>');">
					<i class="fa fa-ban"></i>
					</button>
				<? } ?>	
			<? } ?>	
			<button class="btn btn-info" title="<?= SAVE_CHANGES ?>" 
			onclick="return editSavev4_Surcharges('{{OwnerID}}', '<?= $inList ?>');">
			<i class="ic-disk"></i>
			</button>
			<? if (!$isNew) { ?>
				<button class="btn btn-danger" title="<?= PRINTIT ?>" 
				onclick="return editPrintv4_Surcharges('{{OwnerID}}', '<?= $inList ?>');">
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
						<label for="VehicleID"><?=VEHICLEID;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="VehicleID" id="VehicleID" class="w100" value="{{VehicleID}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="NgtStartHour"><?=NGTSTARTHOUR;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="NgtStartHour" id="NgtStartHour" class="w100" value="{{NgtStartHour}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="NgtEndHour"><?=NGTENDHOUR;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="NgtEndHour" id="NgtEndHour" class="w100" value="{{NgtEndHour}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="NgtSurcharge"><?=NGTSURCHARGE;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="NgtSurcharge" id="NgtSurcharge" class="w100" value="{{NgtSurcharge}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="WkndSurcharge"><?=WKNDSURCHARGE;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="WkndSurcharge" id="WkndSurcharge" class="w100" value="{{WkndSurcharge}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="NgtAddPrice"><?=NGTADDPRICE;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="NgtAddPrice" id="NgtAddPrice" class="w100" value="{{NgtAddPrice}}">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<label for="WkndAddPrice"><?=WKNDADDPRICE;?></label>
					</div>
					<div class="col-md-9">
						<input type="text" name="WkndAddPrice" id="WkndAddPrice" class="w100" value="{{WkndAddPrice}}">
					</div>
				</div>


			</div>
	    </div>
		    

	<!-- Statuses and messages -->
	<div class="box-footer">
		<? if (!$isNew) { ?>
		<div>
    	<button class="btn btn-default" onclick="return deletev4_Surcharges('{{OwnerID}}', '<?= $inList ?>');">
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
	