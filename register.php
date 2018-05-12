<?php
session_start();
?>

<head>
	<title>Register</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="static/style/register.css">
</head>

<body>

<div class="bgimg-1">
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

<?php
    include "models/user.php";
    include "common.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST" && (isset($_POST['submit'])) && ($_POST['submit'] == 'Submit')) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if (empty($email) || (empty($username)) || empty($password)) {
            redirect("register.php");
        }

        if (register($username, $password, $fname, $lname, $email)) {
            redirect("index.php");
        }
        else {
            echo "<center><div class='fail'>";
            echo "Εμφανίστηκε πρόβλημα στην βάση";
            echo "</div></center>";
        }
    }
?>

    <form action="register.php" method="post">
        <table class="table1"border="0" width="225" align="center">
            <tr>
                <td class="round" width="219" bgcolor="#387C0B">
                    <p align="center"><font color="black"><span style="font-size:14pt;"><b>Registration</b></span></font></p>
                </td>
            </tr>
            <tr>
                <td width="219">
                    <table border="0" width="382" align="center">
                        <tr>
                            <td width="116" class="info">First Name:</td>
                            <td width="256"><input type="text" name="fname" maxlength="100"> </td>
                        </tr>
                        <tr>
                            <td width="116" class="info">Last Name:</td>
                            <td width="156"><input type="text" name="lname" maxlength="100"> </td>
                        </tr>
                        <tr>
                            <td width="116" class="info">Email:</span></td>
                            <td width="156"><input type="text" name="email" maxlength="100"> * </td>
                        </tr>
                        <tr>
                            <td width="116" class="info">Username:</td>
                            <td width="156"><input type="text" name="username"> * </td>
                        </tr>
                        <tr>
                            <td width="116" class="info">Password:</td>
                            <td width="156"><input type="password" name="password"> * </td>
                        </tr>
                        <tr>
                            <td width="116">&nbsp;</td>
                            <td width="156">

                                <p align="left"><input type="submit" name="submit" value="Submit"></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="round" width="219" bgcolor="#387C0B"><font color="black">Already Registered?? </font><a href="index.php" target="_self"><font color="#29CEBE">Log in</font></a><font color="#29CEBE"> </font><b><i><font color="black"> Now!</font></i></b></td>
            </tr>
        </table>
    </form>

</div>
</body>

</html>
