	<style>
		table {
			border: 1px solid black;
		}


		td, th {
			border: 1px solid black;
			text-align: center;
		}	
	</style>
	
    <div class="box box-info box-info-edit">
        <div class="box-header">
            <i class="fa fa-road"></i>
            <h3 class="box-title">{$ACTUAL_TRANSFERS} {$timeStart} - {$timeEnd} ({$today})</h3>
		</div>	
	<div class="box-body">	
		{$data}
	</div>


<script>
{literal}
	$(".mytooltip").popover({trigger:'hover', html:true, placement:'bottom'});
{/literal}
</script>