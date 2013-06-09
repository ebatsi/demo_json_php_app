<?php
	$url = "http://eva.batsi.me/foodspot/types.php";
	$json = file_get_contents($url);
	$types = json_decode($json, true);
	
?>
<html>
<head>
<style>
	#page-container {
		width:50%;
		margin: 0 auto;
		background-color: #fff;
		border-radius: 5px;
		background-color: #E4E4E4;
		padding: 2em;
	}
	#result {
		color: #0040FF;
	}
</style>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
	$(document).ready(function() {
		$('#submit').click(function (){
			var current_type = $('#restaurant_types option:selected').text();
			$.get("restaurants.php", { restaurant_types: $('#restaurant_types').val()}, function(response){
				$("#result").html("<p>" +response+ " " + current_type + " restaurants found.</p>");

			});
		}); 
	});
</script>
</head>
<body>
	<div id='page-container'>
		<form>
			<p>Select a restaurant type and we will give you the total number of restaurants found on the database.</p>
			<select name='restaurant_types' id='restaurant_types'>
				<?php 
					$i = 1;
					foreach ($types as $type) {
						echo "<option value='".$i."'>".$type."</option>";
						$i ++;
					}
				?>
			</select>
			<input type="button" value="submit" id="submit" />
		</form>
		<div id="result">
		</div>
	</div>
</body>
</html>