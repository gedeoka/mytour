<?php
// Auto Login
require ('libs/Bootstrap.php');
require ('libs/Controllers.php');
require ('libs/Models.php');
require ('libs/View.php');
require ('libs/Session.php');
require ('libs/PHPMailerAutoload.php');
//Library
require ('libs/Database.php');
require ('libs/config.php');

//config
//require ('config/Database.php');
//require ('config/Path.php');
require ('libs/Code.php');
error_reporting(-1);
$app = new Bootstarp();