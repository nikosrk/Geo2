<?php
    include "connect.php";

    function isUser($username, $password) {
        $username = mysqli_real_escape_string($GLOBALS['link'], $username);
        $password = mysqli_real_escape_string($GLOBALS['link'], md5($password));

        $sql = "SELECT username, password FROM users WHERE username='$username' and password='$password'";

        $result = mysqli_query( $GLOBALS['link'], $sql) or die(mysqli_error( $GLOBALS['link']));
        $count = mysqli_num_rows($result);

        return $count == 1;
    }

    function register($username, $password, $fname, $lname, $email) {
        $password = md5($password);

        $query = "insert into users
                                (
                                    oauth_provider,
                                    username,
                                    password,
                                    first_name,
                                    last_name,
                                    email,
                                    created
                                )
                                Values
                                (
                                    'original',
                                    '$username',
                                    '$password',
                                    '$fname',
                                    '$lname',
                                    '$email',
                                     now()
                                )";

        return mysqli_query( $GLOBALS['link'], $query);
    }

    function getFbUser($oauth, $username) {
        $prevQuery = "SELECT * FROM users WHERE oauth_provider = '" . $oauth . "' AND username = '" . $username . "'";
        $prevResult =  $GLOBALS['link']->query($prevQuery);

        return $prevResult;
    }

    function updateFbUser($oauth, $fname, $lname, $username, $email) {
        $oauth_provider = mysqli_real_escape_string( $GLOBALS['link'], $oauth);
        $fname = mysqli_real_escape_string( $GLOBALS['link'], $fname);
        $lname = mysqli_real_escape_string( $GLOBALS['link'], $lname);
        $username = mysqli_real_escape_string( $GLOBALS['link'], $username);
        $email = mysqli_real_escape_string( $GLOBALS['link'], $email);

        $query = "UPDATE users SET first_name = '" . $fname . "', last_name = '" . $lname . "', email = '" . $email . "', modified = '" . date("Y-m-d H:i:s") . "' WHERE oauth_provider = '" . $oauth_provider . "' AND username = '" . $username . "'";
        $update =  $GLOBALS['link']->query($query);

        return $update;
    }

    function addFbUser($oauth, $fname, $lname, $username, $email) {
        $oauth_provider = mysqli_real_escape_string( $GLOBALS['link'], $oauth);
        $fname = mysqli_real_escape_string( $GLOBALS['link'], $fname);
        $lname = mysqli_real_escape_string( $GLOBALS['link'], $lname);
        $username = mysqli_real_escape_string( $GLOBALS['link'], $username);
        $email = mysqli_real_escape_string( $GLOBALS['link'], $email);

        $query = "insert into users
                            (
                                oauth_provider,
                                username,
                                first_name,
                                last_name,
                                email,
                                created
                            )
                            Values
                            (
                                '$oauth_provider',
                                '$username',
                                '$fname',
                                '$lname',
                                '$email',
                                 now()
                            )";

        $result = mysqli_query( $GLOBALS['link'], $query);
        return $result;
    }
?>
