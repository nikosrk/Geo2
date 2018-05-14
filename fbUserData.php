<?php
    session_start();

    //Load the database configuration file
    include 'models/user.php';

    //Convert JSON data into PHP variable
    $userData = json_decode($_POST['userData']);
	
	die(100);

    if(!empty($userData)){
        $oauth_provider = $_POST['oauth_provider'];
        if (getFbUser($_POST['oauth_provider'], $userData->id)) {
            if (updateFbUser($_POST['oauth_provider'], $userData->first_name, $userData->last_name, $userData->id, $userData->email)) {
                // XSS
                $_SESSION['username'] = $userData->id;
            }
        }
        else {
             if (addFbUser($_POST['oauth_provider'], $userData->first_name, $userData->last_name, $userData->id, $userData->email)) {
                $_SESSION['username'] = $userData->id;
             }
        }
    }
?>
