<?php
session_start ();

// server vars
$server = "localhost";
$user = "root";
$password = "";
$database = "raff";

// connect to the server
mysql_connect ( $server, $user, $password ) or die ( "Sorry can't connect to the server" );

// select the database
mysql_select_db ( $database ) or die ( "Sorry can't find this database" );

// to remove all notice messages
error_reporting ( 'E-All ~E-Notice' );

mysql_query ("SET NAMES utf8");

ob_start();
?>