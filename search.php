<?php
session_start();
?>

<html>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Country Search info</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            $(function() {
                var availableCountries = [];
                $.ajax({
                    type: 'POST',
                    url: 'countriesSearched.php',
                    success: function(result) {
                        json = JSON.parse(result);
                        var keys = Object.keys(json);
                        keys.forEach(function(key){
                            availableCountries.push(json[key]);
                        });
                    }
                });

                $( "#country" ).autocomplete({
                  source: availableCountries
                });
            });
        </script>

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="static/style/search.css" />
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
                <div class="ui-widget">
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
