<style>
	
	h2{
		
		text-align: center;
	}
	div{
		
		margin-bottom: 20px;
	}
	
	
</style>

<div class="container">
	<div id="table-wrapper" class="col-md-12">
		<header>
			<h2 class="well">jQuery Autocomplete</h2>
		</header>
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>City </th>
						<th>State </th> 
						<th>Zip </th>
						<th>County </th>
						<th>Area Code </th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<div>
						<tr>
							<td>
								<input data-col="City" id="city-tag"> 
							</td>
							<td>
								<input data-col="State" id="state-tag">
							</td>
							<td>
								<input data-col="Zipcode" id="Zipcode-tag"> 
							</td>
							<td>
								<input data-col="other" id="tags"> 
							</td>
							<td>
								<input data-col="other" id="tags"> 
							</td>
							<td>
								<button data-col="btn" id ="search-button" class="btn-primary">Search</button>
							</td>	
						</tr>
					
					</div>
				</tbody>
			</table>
			<div class="well" id="details"></div>
		</div>
</div>


<? function Scripts(){ ?>

	<? global $model; ?>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript">
			
		var details = $("#details");		
		//Add autocomplete to each cell
		$('tr td input').each(function(){
				
			var id = "#" + this.id,
			column = $(this).data('col');
			
			$(id).autocomplete({
		        source: "?action=terms&column="+column+"&format=plain",
		        minLength: 1
		    });
		    
		    $( id ).autocomplete({
		 		 search: function( event, ui ) {
		 		 	
		 		 				var data = [];

		 		 	$('input').each(function(){
				
						data.push( $(this).val());
						//data[$(this).data('col')] = $(this).val();	
					});
			
					details.load("?action=search", {'data[]': data, format: 'plain'});
		 		 }
			});
		});

		$( "#search-button" ).on( "click", function(e){
			
			var data = [];
			//Add autocomplete to each cell
			$('input').each(function(){
				
				data.push( $(this).val());
				//data[$(this).data('col')] = $(this).val();	
			});
			
			details.load("?action=search", {'data[]': data, format: 'plain'});	
		});
	</script>

<? } ?>