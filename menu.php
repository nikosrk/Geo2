<?php session_start();?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Welcome</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="static/style/menu.css">
    </head>


    <body>
        <div class="bgimg-1">
            <br>
            <br>
            <br>
            <br>
            <center>
                <h1 style="Lucida Console, Monaco, monospace">
                    Hey <?php echo $_SESSION['username'];?> ! Choose something to do on our website:
                </h1>
            </center>
            <br>
            <br>
            <table border="0" width="320" align="center">
                <tr>
                    <td width="50"><img src="img/geo_trans.png" height="50" width="50"/></td>
                    <td width="139"><a href="search.php"  id="1" >Search Country</a></td>
                </tr>
                <tr>
                    <td width="50"><img src="img/geo_trans.png" height="50" width="50"/></td>
                    <td width="139"><a href="graphs.php"  id="2" >Show Graphs</a></td>
                </tr>
                <tr>
                    <td width="50"><img src="img/geo_trans.png" height="50" width="50"/></td>
                    <td width="139"><a href="kmeans.php"  id="3" >Geolocation based Clustering</a></td>
                </tr>
                <tr>
                    <td width="50"><img src="img/geo_trans.png" height="50" width="50"/></td>
                    <td width="139"><a href="kmeans2.php"  id="4" >Clustering</a></td>
                </tr>
            </table>

            <br>
            <br>
            <br>
            <br>
            <!-- Display logout status -->
            <center>
                <a href="javascript:void(0);" onclick="fbLogout()" id="fbLink" style="visibility:hidden;">
                    <img src="img/fb_logout2.png" height="120" width="380"/>
                </a>
            </center>
            <center>
                <a href="index.php" id="logout" style="visibility:hidden;">
                    <img src="img/logout.png" height="100" width="230" />
                </a>
            </center>
    </body>
</html>

<script src="static/script/menu.js"></script>
