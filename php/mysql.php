<?php

$host 		= '84.246.225.145';
$login 		= 'lumieresdusud';
$pass 		= 'bronzette';
$db 		= 'lumieresdusud';

$db_local	= 'lumieresdusud'; // Nom de la base de données en LOCAL

//<---------------------------------------------------->

$local = $_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1';

$host 	= $local ? 'localhost' 	: $host;
$login 	= $local ? 'root' 		: $login;
$pass 	= $local ? '' 			: $pass;
$db 	= $local ? $db_local 	: $db;

mysql_connect($host, $login, $pass);
mysql_select_db($db);

?>