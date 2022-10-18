<script type="text/x-handlebars-template" id="ItemListTemplate">
	{{#each Item}}
		<div  onclick="oneItem({{id}});">
		
			<div class="row {{color}} pad1em listTile" 
			style="border-top:1px solid #ddd" 
			id="t_{{id}}">
				<div class="col-md-2">
					<strong>{{id}}</strong>
				</div>

				<div class="col-md-10">
					<strong>{{key}}</strong>
				</div>
			</div>
		</div>
		<div id="ItemWrapper{{id}}" class="editFrame" style="display:none">
			<div id="inlineContent{{id}}" class="row">
				<div id="one_Item{{id}}" >
					<?= LOADING ?>
				</div>
			</div>
		</div>

	{{/each}}
</script>