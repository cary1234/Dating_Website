<?php

session_start();

include ('config.php');

/*
date_default_timezone_set("Asia/Taipei");
$date = date('M d, Y  H:i:s');
$user_id = ($_SESSION['id']);
$action = "INSERT INTO actions(user_id,action,Date_Time) values ('$user_id','Sign out','$date')";
$action_result = mysqli_query($dbh, $action);
*/

session_unset();
session_destroy();


header("Location: index.php");