	<h2>{$VehicleName}</h2>
	<table>
		<tr>
			<th width='300px'>
				{$TITLE}
			</th>
			{section name=pom loop=$list_all}
				<th width='200px'>
					{if $list_all[pom].expense eq '109'}{$ZADUZENJE}{/if}
					{if $list_all[pom].expense eq '127'}{$RAZDUZENJE}{/if}
					<br>
					{$list_all[pom].vreme}
					<br>
					{$list_all[pom].drivername}		
					<br>		
					{if $list_all[pom].approved eq '1'}{$APPROVED}{/if}
					{if $list_all[pom].expense eq '0'}{$NOT_APPROVED}{/if}
					
				</th>		
			{/section}	
		</tr>
		{section name=pom2 loop=$checklist}
			<tr>
				<td width='300px'>
					{$checklist[pom2].title}
				</td>
				{section name=pom loop=$list_all}
					<td width='200px'>
						{if isset($checklist[pom2].photo[{$list_all[pom].id}])}<img width='100' src='{$checklist[pom2].photo[{$list_all[pom].id}]}'/>{/if}
					</td>		
				{/section}			
			</tr>	
		{/section}	
	</table>	

