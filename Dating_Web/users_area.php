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
        <link href="css/jasny-bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/chatstyles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>



    </head>
    <body>


        <?php
        require_once 'config.php';


        $query = "SELECT users.id AS id, users.fname AS fname, users.lname AS lname, users.email AS email, users_info.city AS city, users_info.country AS country, users.birthday AS birthday, users.sex AS sex, users.role AS role, users.profile_image AS profile_image FROM users LEFT JOIN users_info ON users.id = users_info.id";
        $result = $dbh->query($query);
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table center-block text-center" id="users_table">
                        <tbody>
                            <?php
                            $td_num = 4;
                            while ($row = $result->fetch_array()) {


                                $user_id_val = $row['id'];
                                $fname_val = $row['fname'];
                                $lname_val = $row['lname'];
                                $email_val = $row['email'];
                                $city_val = $row['city'];
                                $country_val = $row['country'];
                                $birthday_val = $row['birthday'];
                                $sex_val = $row['sex'];
                                $role_val = $row['role'];
                                $profile_image_val = $row['profile_image'];



                                if ($td_num === 4) {
                                    echo "<tr>";
                                    $td_num = 0;
                                }
                                ?>
                            <td>
                                <img class="img-thumbnail" id="user_<?php echo $user_id_val ?>" height="250" width="250"

                                     <?php
                                     if (empty($profile_image_val)) {
                                         echo "src='holder.js/250x250'";
                                     } else {
                                         echo "src='images/users_images/$profile_image_val'";
                                     }
                                     ?>

                                     />
                                <br />
                                <h4 id="user_<?php echo $user_id_val ?>"><?php echo $fname_val . " " . $lname_val; ?></h4>
                                <p class="text-muted">
                                    <?php
                                    if ((!isset($city_val) && !isset($country_val)) || (empty($city_val) && empty($country_val))) {
                                        echo "N/A";
                                    }
                                    if (empty($country_val)) {
                                        echo $city_val;
                                    }
                                    if (empty($city_val)) {
                                        echo $country_val;
                                    }
                                    if (!empty($city_val) && !empty($country_val)){
                                        echo $city_val . ", " . $country_val;
                                    }
                                    ?>
                                </p>
                                <input class="rmdjclassMessage" data-id="<?php echo $user_id_val ?>" type="button" value="message" />
                                <input type="button" value="interested" />
                            </td>
                            <?php
                            if ($td_num === 4) {
                                echo "</tr>";
                            }
                            $td_num += 1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="containerchat">


        </div>



        <input type="hidden" id="USER_ID" value="<?php echo $_SESSION["user_id"]; ?>"/>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="js/jasny-bootstrap.min.js"></script>
        <script src="js/holder.js"></script>

        <script src="js/socket.io.js"></script>
        <script src="js/client.js"></script>
    </body>
<script>
    $("#users_table").on("click",".rmdjclassMessage",function(){
////        alert($(this).data("id"));
//        var idFrom = $("#USER_ID").val();
        var idTo = $(this).data("id");
//        var msg = "Hi";
//
//        $().sendMessage(idFrom,idTo,msg);
        var check = document.getElementById("chat"+idTo+"");
        if(check === null){
            var genchatbox = "";
            genchatbox =
                '<div id="chat'+idTo+'" class="chat">'+
                    '<section class="module">'+
                    '<header class="top-bar">'+
                    '<div class="left">'+
                    '<span class="icon typicons-message"></span>'+
                    '<h1>User Id:'+idTo+'</h1>'+
                    '</div>'+
                    '<div class="right">'+
                    '<span class="icon typicons-minus"></span>'+
                    '<span class="icon typicons-times"></span>'+
                    '</div>'+
                    '</header>'+
                    '<ol id="discussion-chat'+idTo+'" class="discussion">'+

                    '</ol>'+
                    '<textarea id="textareamsg-'+idTo+'" style="width: 80%;"></textarea>'+
                    '<input class="sendMessgaebtn" data-id="'+idTo+'" type="button" value="Send"/>'+
                    '</section>'+
                    '</div>';

            $("#containerchat").prepend(genchatbox);
            $(".sendMessgaebtn").on("click",function(){
//        alert($(this).data("id"));
                var idFrom = $("#USER_ID").val();
                var idTo = $(this).data("id");
                var msg = $("#textareamsg-"+idTo).val();
                var appendmsgchatbox =
                    '<li class="self">'+
                        '<div class="avatar">'+
                        '<img src="http://s3-us-west-2.amazonaws.com/s.cdpn.io/3/profile/profile-80_20.jpg" />'+
                        '</div>'+
                        '<div class="messages">'+
                        msg +
                        '<time datetime="YYYY-mm-dd">xx mins</time>'+
                        '</div>'+
                        '</li>';
                $("#discussion-chat"+idTo).append(appendmsgchatbox);
                var divto = "chat"+idTo;
                $().sendMessage(idFrom,idTo,msg,divto);

            });
        }


    });

</script>

</html>
