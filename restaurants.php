<?php 
 	$restaurant_type = $_GET['restaurant_types'];

	$url = "http://eva.batsi.me/foodspot/restaurants.php";
	$json = file_get_contents($url);
	$restaurants = json_decode($json, true);

	$total_restaurants_fount = 0;
	foreach ($restaurants as $restaurant) {
		if ($restaurant['type'] == $restaurant_type) {
			$total_restaurants_fount = $total_restaurants_fount + 1;
		}
	}
	echo $total_restaurants_fount;
?>