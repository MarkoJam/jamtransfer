
<script type="text/x-handlebars-template" id="v4_InvoiceDetailsListTemplate">

	{{#each v4_InvoiceDetails}}
		<div  onclick="one_v4_InvoiceDetails({{ID}});">
		
			<div class="row {{color}} pad1em listTile" 
			style="border-top:1px solid #ddd" 
			id="t_{{ID}}">
		
					<div class="col-md-3">
						<strong>{{ID}}</strong>
					</div>

					<div class="col-md-2">
					</div>

					<div class="col-md-2">
					</div>

					<div class="col-md-3">
					</div>
			</div>
		</div>
		<div id="v4_InvoiceDetailsWrapper{{ID}}" class="editFrame" style="display:none">
			<div id="inlineContent{{ID}}" class="row">
				<div id="one_v4_InvoiceDetails{{ID}}" >
					<?= LOADING ?>
				</div>
			</div>
		</div>

	{{/each}}


</script>
	