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
        <title>Home Page</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
         <script src="js/signin_ajax.js"></script> <!---->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                    <form action="signin_result.php" method="POST">
                        <!-- Email -->
                        <div id="email-group" class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter your email address" />
                            <!-- errors will go here -->
                        </div>

                        <!-- Password -->
                        <div id="password-group" class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" />
                            <!-- errors will go here -->
                        </div>

                        <a href="#" class="text-muted">Forgot your password?</a>

                        <button type="submit" class="btn btn-success center-block btn-block" name="submit"/>
                        <i class="fa fa-2x fa-user"></i>
                        &#160;
                        Sign in
                        </button>
                    </form>
                </div>
            </div>
        </div>




        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
    </body>
</html>
