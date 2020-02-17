<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* local */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'apatour');
define('DB_USER', 'root');
define('DB_PASS', '');


if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
	define("URL", "https://".$_SERVER["HTTP_HOST"]."/apatour/");
}else{
	define("URL", "http://".$_SERVER["HTTP_HOST"]."/apatour/");
}
//echo URL;
?>