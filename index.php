<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Index</title>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="static/style/index.css">
    </head>

    <body>
        <div class="bgimg-1">
            <br />
            <br />
            <br />
            <br />
            <!--<center><h2 style="Lucida Console, Monaco, monospace"> Welcome to our Page</h2></center>-->
            <br />
            <br />
            <form name="login" method="post" action="login.php">
            <table class="table1" align="center">
                <tr>
                    <td class="round" width="219"  bgcolor="#387C0B">
                        <p align="center"><font color="black"><span style="font-size:14pt;"><b>Login</b></span></font></p>
                    </td>
                </tr>
                <tr>
                    <td width="219">
                        <table border="0" width="320" align="center">
                            <tr>
                                <td width="71" class="info">Username:</td>
                                <td width="139"><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td width="71" class="info">Password:</td>
                                <td width="139"><input type="password" name="password"></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td width="71">&nbsp;</td>
                                    <td width="139">
                                        <p align="right"><input type="submit" name="submit" value="Submit"></p>
                                    </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>

                    <?php
                        $out = '<td width="220"><span style="font-size:11pt;">';
                        if(isset($_GET['error'])){
                            if($_GET['error'] == 2){

                                $out .= '
                                         *Please write both your username and password
                                        ';
                                $_GET['error'] == 0;
                            }
                            else if($_GET['error'] == 1){
                                $out .= '
                                         *Problem with database connection
                                        ';
                                $_GET['error'] == 0;
                            }
                            else if($_GET['error'] == 3){
                                $out .= '
                                         *Wrong username or password
                                        ';
                                $_GET['error'] == 0;
                            }
                        }
                        $out .= '</span></td>';

                        echo $out;
                    ?>
                </tr>
                <tr>
                    <td class="round" width="219" bgcolor="#387C0B">
                        <font color="black">Not Registered? </font>
                        <a href="register.php" target="_self">
                            <font color="#29CEBE">Register</font>
                        </a>
                        <font color="#29CEBE"> </font>
                        <b>
                            <i>
                                <font color="black"> Now!</font>
                            </i>
                        </b>
                    </td>
                </tr>
            </table>
            </form>


            <!-- Facebook login or logout button -->
            <center>
                <a href="javascript:void(0);" onclick="fbLogin()" id="fbLink">
                    <img src="img/fblogin.png" height="80" width="330" />
                </a>
            </center>

        </div>
    </body>

<script src="static/script/index.js"></script>
