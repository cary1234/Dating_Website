<?php session_start(); ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dating Website</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row-fluid">
                <div class="col-md-offset-2 col-md-8 col-md-offset-2">         
                    <img src="holder.js/750x500" class="img-responsive"/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                    <br />
                    <h2 class="text-center">
                        Search, Message &#38; Locate your next date.
                        </p>
                        <p class="lead text-muted text-center">
                            The simplest way to find a date via our step by step GPS route guide.
                        </p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-offset-2 col-md-8 col-md-offset-2">

                    <?php require "facebook_login.php"; ?>


                    <br />
                    <a class="btn btn-danger center-block" href="#" role="button">
                        <h2>
                            <i class="fa fa-2x fa-google-plus"></i>
                            &#160;
                            Connect with Google Plus
                        </h2>
                    </a><br />
                    <a class="btn btn-success center-block" href="signin.php" role="button">
                        <h2>
                            <i class="fa fa-2x fa-user"></i>
                            &#160;
                            Sign in
                        </h2>
                    </a>
                    <br />
                    <a class="btn btn-info center-block" href="signup.php" role="button">
                        <h2>
                            <i class="fa fa-2x fa-sign-in"></i>
                            &#160;
                            Sign up
                        </h2>
                    </a>
                </div>
            </div>
        </div>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
    </body>
</html>
