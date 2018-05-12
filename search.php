<?php
session_start();
?>

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Country Search info</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="static/style/search.css">
	</head>

    <body align="center">
        <div class="bgimg-1">
            <div class="label">
                <br />
                <h2>Input a countrys name to see information</h2>
            </div>
            <div class="container">
                <br />
                <br />
                <div class="searching">
                    <input type="text" id="country" value=""> <br>
                    <button type="button" id="search">Search Country</button>
                </div>

                <center>
                    <div class="loader" id="loader2"></div>
                </center>

                <br/>
                <div class="table_responsive" align="center">
                    <div id="live_data"></div>
                </div>


                <div id="submit_data" style="visibility:hidden;">
                    <button type="button" id="submit">Submit Data</button>
                </div>
                <br>
                <div class="table-responsive" align="center">
                    <div id="live_message"></div>
                </div>

            </div>
        </div>
    </body>
</html>

<script src="static/script/search.js"></script>
