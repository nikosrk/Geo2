<?php
    session_start();
    include "connect.php";
    include "common.php";

    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, md5($_POST['password']));

    if (empty($username) || empty($password)) {

		$_GET['error'] = 2;

        redirect("index.php");
    }

    $sql = "SELECT username, password FROM users WHERE username='$username' and password='$password'";

    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);

		$_SESSION['username'] = $username;

        redirect("menu.php");
    }
    else {

		$_GET['error'] = 3;

        redirect("index.php");
    }


?>
