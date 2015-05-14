<?php
session_start();

$profile_image = $_SESSION['profile_image'];

if (isset($_SESSION['fname'])) {
    $fname = $_SESSION['fname'];
} else {
    $fname = "";
}

if (isset($_SESSION['lname'])) {
    $lname = $_SESSION['lname'];
} else {
    $lname = "";
}

if (isset($_SESSION['birthday'])) {
    $birthday = $_SESSION['birthday'];
} else {
    $birthday = "";
}

if (isset($_SESSION['age'])) {
    $age = $_SESSION['age'];
} else {
    $age = "";
}

if (isset($_SESSION['street'])) {
    $street = $_SESSION['street'];
} else {
    $street = "";
}

if (isset($_SESSION['city'])) {
    $city = $_SESSION['city'];
} else {
    $city = "";
}

if (isset($_SESSION['country'])) {
    $country = $_SESSION['country'];
} else {
    $country = "";
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>User Menu</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="css/jasny-bootstrap.min.css"></script>
        <script src="js/signup_ajax.js"></script>
        <script src="js/socket.io.js"></script>
        <script src="js/client.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-thumbnail center-block" height="150" width="150"

                         <?php
                         if (empty($profile_image)) {
                             ?>
                             src='holder.js/150x150'
                             <?php
                         } else {
                             ?>
                             src=<?php echo $profile_image; ?>
                             <?php
                         }
                         ?>


                         />
                    <p class="lead text-center"><?php echo $fname . " " . $lname ?></p>
                    <p class="text-muted text-center"><a href="user_profile.php"><small>Edit My Profile</small></a></p>
                    <p class="text-muted text-center"><a href="signout.php"><small>Signout</small></a></p>
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
            </div>
            <br />
            <br />            
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <a href="#">
                            <img class="img-circle img-responsive center-block" src="holder.js/150x150" />
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="#">
                            <img class="img-circle img-responsive center-block" src="holder.js/150x150" />
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="users_area.php">
                            <img class="img-circle center-block" src="images/search.png" />
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <script>
            $('.inputmask').inputmask({
                mask: '9999-99-99'
            });
        </script>




        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
        <script src="js/jasny-bootstrap.min.js"></script>
    </body>
</html>
