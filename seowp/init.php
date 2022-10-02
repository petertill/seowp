<?php 
/** 
 * WpShop 
 * 
 * @package SEOWP 
 * @author Peter Till
 * @copyright 2022 Peter Till 
 * @license GPL-2.0-or-later 
 * 
 * @wordpress-plugin 
 * Plugin Name: SEOWP 
 * Plugin URI: https://mysite.com/hello-world 
 * Description: Prints "Hello World" in WordPress admin. 
 * Version: 0.0.1 
 * Author: Peter Till 
 * Author URI: https://github.com/petertill
 * Text Domain: seowp
 * License: GPL v2 or later 
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt */
?>


<?php
function seowp_main()  {
	echo "<h1>Hey, Admin!</h1>";
	echo "<h3 style='color: gray;'>Here you can change your SEO settings easily to get better rankings in search engines. You can also get ideas here about how to improve your SEO.</h3>";
}
function main_admin_menu()  {
  add_menu_page(
    'SEOWP Settings',// page title  
    'SEOWP',// menu title  
    'manage_options',// capability  
    'seowp_admin_main',// menu slug  
    'seowp_main',  // callback function
    'dashicons-tag' //icon
  );  
}  
add_action( 'admin_menu', 'main_admin_menu' );






?>
