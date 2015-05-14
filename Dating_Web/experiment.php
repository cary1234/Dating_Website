<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    </head>
    <body>
        
        <?php //phpinfo() ?>
        
        <?php
        $birthday_post = "09/12/1992";
        $birthday_explode = explode("/", $birthday_post);
        $birthdate = $birthday_explode[2] . "-" . $birthday_explode[0] . "-" . $birthday_explode[1];

        echo $birthday_post;
        echo "<br />";
        echo $birthdate;



        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";



        require_once 'config.php';

        $email_post = "admin@sample.com";

        $stmt = $dbh->prepare("SELECT * FROM `users` WHERE `email` = ? LIMIT 1");
        $stmt->bind_param("s", $email_post);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        $birthday_val = $row['birthday'];
        
        echo $birthday_val;


        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";
        echo "<br />";

        echo date_diff(new DateTime($birthdate), date_create('today'))->y;
        ?>
        <!--Latest compiled and minified JavaScript -->
        <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/jasny-bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
    </body>
</html>
