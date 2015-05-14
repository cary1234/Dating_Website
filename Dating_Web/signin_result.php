<?php session_start(); ?>
<?php

require_once 'config.php';

$email_post = filter_input(INPUT_POST, 'email');
$password_post = filter_input(INPUT_POST, 'password');


if (empty($email_post)) {
    $errors['email'] = 'Please enter your email.';
}

if (empty($password_post)) {
    $errors['password'] = 'Please enter your password.';
}

if (!empty($email_post) && !empty($password_post)) {

    $stmt = $dbh->prepare("SELECT email, password FROM `users` WHERE `email` = ? LIMIT 1");
    $stmt->bind_param("s", $email_post);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $row_cnt = mysqli_num_rows($result);

    $password_val = $row['password'];

    if ($row_cnt == 0) {

        $errors['password'] = 'Invalid Account';
    } else if ($password_val == "facebook") {

        $errors['password'] = 'Please login using facebook';
    } else {

        $stmt = $dbh->prepare("SELECT salt FROM `users` WHERE `email` = ? LIMIT 1");
        $stmt->bind_param("s", $email_post);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $salt_val = $row['salt'];

        if (CRYPT_BLOWFISH != 1) {
            throw new Exception("bcrypt not supported in this installation. See http://php.net/crypt");
        }

        $password_decrypt = crypt($password_post, $salt_val);

        $stmt = $dbh->prepare("SELECT * FROM `users` WHERE `email` = ? AND `password` = ? LIMIT 1");
        $stmt->bind_param("ss", $email_post, $password_decrypt);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();


        $user_id_val = $row['id'];
        $fname_val = $row['fname'];
        $lname_val = $row['lname'];
        $email_val = $row['email'];
        $password_val = $row['password'];
        $birthday_val = $row['birthday'];
        $sex_val = $row['sex'];
        $role_val = $row['role'];
        $profile_image_val = $row['profile_image'];
        $row_cnt = mysqli_num_rows($result);

        $errors = array();   // array to hold validation errors
        $data = array();   // array to pass back data
        //
        // validate the variables ======================================================
        // if any of these variables don't exist, add an error to our $errors array

        if ($row_cnt == 0) {
            $errors['password'] = 'Invalid account.';
        }
        if ($role_val != "admin" && $role_val != "user") {
            $errors['password'] = 'Please activate your account.';
        }
    }
}
// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    // if there are no errors process our form, then return a message
    // DO ALL YOUR FORM PROCESSING HERE
    // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
    // show a message of success and provide a true success variable

    session_unset();

    $_SESSION["user_id"] = $user_id_val;
    $_SESSION["email"] = $email_val;
    $_SESSION["fname"] = $fname_val;
    $_SESSION["lname"] = $lname_val;

    $birthday_explode = explode("-", $birthday_val);
    $birthdate = $birthday_explode[1] . "/" . $birthday_explode[2] . "/" . $birthday_explode[0];
    $_SESSION["birthday"] = $birthdate;

    $age = date_diff(new DateTime($birthday_val), date_create('today'))->y;
    $_SESSION["age"] = $age;

    $_SESSION["sex"] = $sex_val;
    $_SESSION["role"] = $role_val;
    $_SESSION["profile_image"] = "images/users_images/" . $profile_image_val;


    $stmt = $dbh->prepare("SELECT * FROM `users_info` WHERE `user_id` = ? LIMIT 1");
    $stmt->bind_param("s", $user_id_val);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $row_cnt = mysqli_num_rows($result);

    if ($row_cnt != 0) {
        $work_val = $row['work'];
        $zip_code_val = $row['zip_code'];
        $street_val = $row['street'];
        $city_val = $row['city'];
        $country_val = $row['country'];
        $status_val = $row['status'];

        $_SESSION["work"] = $work_val;
        $_SESSION["zip_code"] = $zip_code_val;
        $_SESSION["street"] = $street_val;
        $_SESSION["city"] = $city_val;
        $_SESSION["country"] = $country_val;
        $_SESSION["status"] = $status_val;
    }


    $data['success'] = true;
    $data['message'] = "Signing In, please wait.";
}

// return all our data to an AJAX call
echo json_encode($data);
