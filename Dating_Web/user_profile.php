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
        <title>Home Page</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    </head>
    <body>


        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <img class="img-thumbnail img-responsive center-block"

                             <?php
                             if (empty($profile_image)) {
                                 ?>
                                 src='holder.js/150x150'
                                 <?php
                             } else {
                                 ?>
                                 src=<?php echo $profile_image . "?type=large"; ?>
                                 <?php
                             }
                             ?>

                             />
                        <p class="text-success text-center">Active over a month ago</p>
                    </div>
                    <br />
                    <div class="row">
                        <a class="btn btn-danger center-block" href="#" role="button">
                            <h4>
                                <i class="fa fa-envelope-o"></i>
                                &#160;
                                Message
                            </h4>
                        </a>
                    </div>
                    <br />
                    <div class="row">
                        <a class="btn btn-danger center-block" href="#" role="button">
                            <h4>
                                <i class="fa fa-heart"></i>
                                &#160;
                                Flirt
                            </h4>
                        </a>
                    </div>
                    <br />
                    <div class="row">
                        <a class="btn btn-default center-block" href="#" role="button">
                            <h4>
                                <i class="fa fa-file-image-o"></i>
                                &#160;
                                Photos
                            </h4>
                        </a>
                    </div>

                    <hr class="featurette-divider">

                    <div class="row">
                        <a class="btn btn-default center-block" href="#" role="button">
                            <h4>
                                <i class="fa fa-star-o"></i>
                                &#160;
                                Favorite
                            </h4>
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <h2>
                                    <?php echo $fname . " " . $lname; ?>
                                </h2>
                                <p class="text-muted">
                                    <?php
                                    if ($street != "") {
                                        echo $street;
                                    }
                                    if ($city != "") {
                                        if ($street != "") {
                                            echo ", " . $city;
                                        } else {
                                            echo $city;
                                        }
                                    }
                                    if ($country != "") {
                                        if ($city != "") {
                                            echo ", " . $country;
                                        } else if ($street != "") {
                                            echo ", " . $country;
                                        } else {
                                            echo $country;
                                        }
                                    }
                                    ?>
                                </p>

                            </h3>
                            <span class="pull-right">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                    <li class="active"><a href="#tab1" data-toggle="tab">Bio</a></li>
                                    <li><a href="#tab2" data-toggle="tab">Photos</a></li>     
                                </ul>
                            </span>
                        </div>
                        <div class="panel-body col-md-offset-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab1">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <table class="table table-hover text-center">
                                                    <tr>
                                                        <td>
                                                            <h4>Birthdate:</h4>
                                                        </td>
                                                        <td>
                                                            <h4><?php echo $birthday; ?></h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>Age:</h4>
                                                        </td>
                                                        <td>
                                                            <h4><?php echo $age; ?></h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>Height:</h4>
                                                        </td>
                                                        <td>
                                                            <h4>-</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>Hair:</h4>
                                                        </td>
                                                        <td>
                                                            <h4>-</h4>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>Eyes:</h4>
                                                        </td>
                                                        <td>
                                                            <h4>-</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>Ethnicity:</h4>
                                                        </td>
                                                        <td>
                                                            <h4>-</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>Children:</h4>
                                                        </td>
                                                        <td>
                                                            <h4>-</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h4>Smoke:</h4>
                                                        </td>
                                                        <td>
                                                            <h4>-</h5>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab2">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <table class="table center-block">
                                                <tr>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                    <td>
                                                        <img class="img-rounded img-responsive" src="holder.js/150x150" />
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <img class="img-thumbnail img-responsive center-block" src="holder.js/100x100" />
                        <p class="text-muted text-center">
                            <small>
                                I want more action!
                            </small>
                        </p>
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <a class="btn btn-danger btn-sm btn-block" href="#" role="button">
                                <small>
                                    Upgrade
                                </small>
                            </a>
                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <div class="row text-center">
                        <table class="table">
                            <h5>
                                <strong>Search:</strong>
                            </h5>
                            <tr>
                                <td>
                                    Location: <br />
                                    <input type="text" size="16"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Age between: <br />
                                    <input type="number" min="18" max="100"  />
                                    and
                                    <input type="number" min="18" max="100" minlength="1" maxlength="3" />
                                </td>
                            </tr>
                        </table>
                        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                            <input type="button" class="btn btn-danger btn-sm btn-block" value="Done">

                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <div class="row">
                        <img class="img-thumbnail img-responsive center-block" src="holder.js/100x100" />
                        <p class="text-muted text-center">
                            <small>
                                Cary Bondoc
                                <br />
                                Caloocan City, Philippines
                                <br />
                                Meet him now
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
    </body>
</html>
