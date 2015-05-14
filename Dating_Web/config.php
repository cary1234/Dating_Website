<?php
/*
$host = "";
$username ="";
$password = "";
$database = "";
*/

$host = "localhost";
$username ="root";
$password = "";
$database = "dating_website";


$dbh = mysqli_connect($host, $username, $password, $database) or die("Error " . mysqli_error($dbh));


$app_id = '1558269114455356';  //localhost
$app_secret = '5fa4a7909db66aaad5098321cc2979b0';
$required_scope = 'public_profile, user_friends, email'; //Permissions required
$redirect_url = 'http://99b5603.ngrok.com/Projects/Dating%20Website/Dating_Web/'; //FB redirects to this page with a code