<?php
    session_start();

    include "common.php";
    include "models/user.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
		$_GET['error'] = 2;
        redirect("index.php");
    }

    if (isUser($username, $password)) {
        // XSS
        $_SESSION['username'] = $username;
        redirect("menu.php");
    }
    else {
		$_GET['error'] = 3;
        redirect("index.php");
    }
?>
