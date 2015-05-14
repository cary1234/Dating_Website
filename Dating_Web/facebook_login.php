<?php

###### connect to user table and fb ########
require_once 'config.php';

require_once __DIR__ . "/facebook-php-sdk-v4-4.0-dev/autoload.php"; //include autoload from SDK folder
//import required class to the current scope

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRedirectLoginHelper;

FacebookSession::setDefaultApplication($app_id, $app_secret);
$helper = new FacebookRedirectLoginHelper($redirect_url);

try {
    $session = $helper->getSessionFromRedirect();
} catch (FacebookRequestException $ex) {
    die(" Error : " . $ex->getMessage());
} catch (\Exception $ex) {
    die(" Error : " . $ex->getMessage());
}


//if user wants to log out
if (isset($_GET["log-out"]) && $_GET["log-out"] == 1) {
    unset($_SESSION["fb_user_details"]);
    //session ver is set, redirect user 
    header("location: " . $redirect_url);
}

//Test normal login / logout with session

if ($session) { //if we have the FB session
    //get user data
    $user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());

    //save session var as array
    $_SESSION["fb_user_details"] = $user_profile->asArray();

    $id_get = "id";
    $fname_get = "first_name";
    $lname_get = "last_name";
    $gender_get = "gender";
    $email_get = "email";
    $link_get = "link";

    $fb_id = ( isset($_SESSION["fb_user_details"][$id_get]) ) ? $_SESSION["fb_user_details"][$id_get] : "";
    $user_fname = ( isset($_SESSION["fb_user_details"][$fname_get]) ) ? $_SESSION["fb_user_details"][$fname_get] : "";
    $user_lname = ( isset($_SESSION["fb_user_details"][$lname_get]) ) ? $_SESSION["fb_user_details"][$lname_get] : "";
    $user_gender = ( isset($_SESSION["fb_user_details"][$gender_get]) ) ? $_SESSION["fb_user_details"][$gender_get] : "";
    $user_email = ( isset($_SESSION["fb_user_details"][$email_get]) ) ? $_SESSION["fb_user_details"][$email_get] : "";
    $user_link = ( isset($_SESSION["fb_user_details"][$link_get]) ) ? $_SESSION["fb_user_details"][$link_get] : "";



    //check user exist in table (using Facebook ID)
    $results = $dbh->query("SELECT COUNT(*) FROM fb_info WHERE fb_id=" . $fb_id);
    $get_total_rows = $results->fetch_row();

    if (!$get_total_rows[0]) { //no user exist in table, create new user
        $insert_row = $dbh->query("INSERT INTO users (email, password, fname, lname, sex, profile_image) VALUES('" . $user_email . "', 'facebook', '" . $user_fname . "', '" . $user_lname . "', '" . $user_gender . "', 'https://graph.facebook.com/" . $fb_id . "/picture?type=large')");

        if ($dbh->query($insert_row) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insert_row . "<br>" . $dbh->error;
        }

        $stmt = $dbh->prepare("SELECT LAST_INSERT_ID() AS user_id FROM users");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $last_user_id = $row['user_id'];



        echo $last_user_id;
        echo "<br />";

        $insert_row = $dbh->query("INSERT INTO fb_info (user_id, fb_id, fb_link) VALUES($last_user_id, '" . $fb_id . "', '" . $user_link . "')");

        echo $last_user_id;
        echo "<br />";

        $insert_row = $dbh->query("INSERT INTO users_info (user_id) VALUES($last_user_id)");


        echo $last_user_id;
        echo "<br />";
    }

    //session ver is set, redirect user 
    header("location: " . $redirect_url);
} else {

    //session var is still there
    if (isset($_SESSION["fb_user_details"])) {

        $fb_id = $_SESSION["fb_user_details"]["id"];

        $stmt = $dbh->prepare("SELECT user_id FROM fb_info  WHERE fb_id = ?");

        $stmt->bind_param("s", $fb_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $user_id_val = $row['user_id'];

        echo $user_id_val;
        echo "<br />";
        echo $fb_id;
        echo "<br />";


        $stmt = $dbh->prepare("SELECT users.id AS id, users.fname AS fname, users.lname AS lname, users.email AS email,users_info.street AS street, users_info.city AS city, users_info.country AS country, users.birthday AS birthday, users.sex AS sex, users.role AS role, users.profile_image AS profile_image FROM users JOIN fb_info ON users.id = fb_info.user_id JOIN users_info ON users.id = users_info.user_id WHERE users.id = ?");

        $stmt->bind_param("s", $user_id_val);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $email_val = $row['email'];
        $fname_val = $row['fname'];
        $lname_val = $row['lname'];
        $birthday_val = $row['birthday'];
        $street_val = $row['street'];
        $city_val = $row['city'];
        $country_val = $row['country'];
        $sex_val = $row['sex'];
        $role_val = $row['role'];
        $profile_image_val = $row['profile_image'];

        $_SESSION["user_id"] = $user_id_val;
        $_SESSION["email"] = $email_val;
        $_SESSION["fname"] = $fname_val;
        $_SESSION["lname"] = $lname_val;
        $_SESSION["birthday"] = $birthday_val;
        $_SESSION["street"] = $street_val;
        $_SESSION["city"] = $city_val;
        $_SESSION["country"] = $country_val;
        $_SESSION["sex"] = $sex_val;
        $_SESSION["role"] = $role_val;
        $_SESSION["profile_image"] = $profile_image_val;

        /*
          echo $_SESSION["user_id"] . " " . $_SESSION["email"] . " " . $_SESSION["fname"] . " " . $_SESSION["lname"] . " " . $_SESSION["birthday"] . " " . $_SESSION["street"] . " " . $_SESSION["city"] . " " . $_SESSION["country"] . " " . $_SESSION["sex"] . " " . $_SESSION["role"] . " " . $_SESSION["profile_image"];
         */

        header("Location: user_menu.php");
    } else {
        //display login url
        $login_url = $helper->getLoginUrl(array('scope' => $required_scope));
        ?>
        <a class="btn btn-primary center-block" href="<?php echo $login_url ?>" role="button">
            <h2>
                <i class = "fa fa-2x fa-facebook-official"></i>
                &#160;
                Connect with Facebook
            </h2>
        </a>
        <?php
    }
}


/* Demo review
if ($session){ //if we have the FB session
	
	######## Fetch user Info ###########
	$user_profile = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
    $user_id =  $user_profile->getId(); 
    $user_name = $user_profile->getName(); 
	$user_email =  $user_profile->getEmail();
	$location =  $user_profile->getLocation();


    ######## Check User Permission called 'publish_actions' ##########
    $user_permissions = (new FacebookRequest($session, 'GET', '/me/permissions'))->execute()->getGraphObject(GraphUser::className())->asArray();
    $found_permission = false;
    foreach($user_permissions as $key => $val){         
        if($val->permission == 'publish_actions'){
            $found_permission = true;
        }
    }
    
	###### post image if 'publish_actions' permission available ########
    if($found_permission){
		$image = "/home/images/image_name.jpg"; //server path to image
		$post_data = array('source' => '@'.$image, 'message' => 'This is test Message');
		$response = (new FacebookRequest( $session, 'POST', '/me/photos', $post_data ))->execute()->getGraphObject();
    }


	###### Save info in database ########
	$dbh = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_db_name);
	if ($dbh->connect_error) {
		die('Error : ('. $dbh->connect_errno .') '. $dbh->connect_error);
	}
	$results = $dbh->query("SELECT COUNT(*) FROM usertable WHERE id=".$user_id);
	$get_total_rows = $results->fetch_row();
	
	if(!$get_total_rows[0]){
		$insert_row = $dbh->query("INSERT INTO usertable (fbid, fullname, email) VALUES(".$user_id.", '".$user_name."', '".$user_email."')");
		if($insert_row){
			print 'Success! ID of last inserted record is : ' .$dbh->insert_id .'<br />'; 
		}
	}
}else{ 

	//display login url 
	$login_url = $helper->getLoginUrl( array( 'scope' => $required_scope ) );
	echo '<a href="'.$login_url.'">Login with Facebook</a>'; 
}
*/