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

 
function fm_giphy_serch() {
    $jsonurl = "https://api.giphy.com/v1/gifs/trending?api_key=pLURtkhVrUXr3KG25Gy5IvzziV5OrZGa";
    $json = file_get_contents($jsonurl);
    var_dump(json_decode($json));    
}

?>
