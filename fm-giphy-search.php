<?php
/**
 * Plugin Name:       FM Giphy Search
 * Description:       advanced prototype of a wordpress plugin that functions as a Gif browser
 * Version:           0.1
 * Author:            Francisco Matelli
 * Author URI:        https://www.franciscomat.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       fm-giphy-search
 */

add_action('the_content', 'hook_plugin_in_html');

function hook_plugin_in_html() {
	$query_gif_input = $_POST["query_gif_input"];
	#
	echo '<h1>Gif Finder</h1>';
	echo '<div class="container">';

	#
	output_search_input();
	if(!isset($query_gif_input) || empty($query_gif_input) ) {
		echo "<p>Use the input to search for some wonderfull gifs!!!!</p>";
		echo "<p>Checkout some trending gifts</p>";
		fm_giphy_serch(NULL);
	} else {
		echo "<h2>Searching for $query_gif_input</h2>";
		fm_giphy_serch($query_gif_input);
	}
	echo '</div>';
	#die;
}

function output_search_input() {
	echo '<div class="row">';
	echo '<form method="POST">';
	echo '<input type="text" placeholder="enter gifs you want to see" name="query_gif_input">';
	echo '<input type="submit" value="Search">';
	echo '</form>';
	echo '</div>';
}

function fm_giphy_serch($query_gif_input_received) {
	if(!isset($query_gif_input_received) || empty($query_gif_input_received)) {
		$jsonurl = "https://api.giphy.com/v1/gifs/trending?api_key=pLURtkhVrUXr3KG25Gy5IvzziV5OrZGa&limit=12";
	} else {
		$query_gif_input_received = urlencode( $query_gif_input_received );
		$jsonurl = "https://api.giphy.com/v1/gifs/search?api_key=pLURtkhVrUXr3KG25Gy5IvzziV5OrZGa&q=$query_gif_input_received&limit=12";
	}
	$json = file_get_contents($jsonurl);
	$json_d = json_decode($json, true);	
	
	echo '<div class="row">';
	foreach ($json_d['data'] as $k => $v) {
		$img_src = $v["images"]["downsized"]["url"];
		echo '<div class="col-lg-3 col-md-4 col-sm-6">';
		echo "<img src=$img_src>";
		echo '</div>';
	}
	echo '</div>';	
}
?>
