

window.fbAsyncInit = function() {
    // FB JavaScript SDK configuration and setup
    FB.init({
      appId      : '370867696733649', // FB App ID
      cookie     : true,  // enable cookies to allow the server to access the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v2.8' // use graph api version 2.8
    });

};


var finished_rendering = function() {
	console.log("finished rendering plugins");
	var spinner = document.getElementById("spinner");
	spinner.removeAttribute("style");
	spinner.removeChild(spinner.childNodes[0]);
}

FB.Event.subscribe('xfbml.render', finished_rendering);
FB.Event.subscribe("auth.login", function() {getFbUserData()});


// Facebook login with JavaScript SDK
function fbLogin() {
    FB.login(function (response) {
        if (response.authResponse) {
            // Get and display the user profile data
            getFbUserData(saveFbUserData);
        } else {
            document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
        }
    }, {scope: 'email'});
}

// Fetch the user profile data from facebook
function getFbUserData(){
    FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email'},
		function (response) {savefbUserData(response);}
	);
}

function savefbUserData(userData){
    $.post(
		'fbUserData.php',
		{
			oauth_provider:'facebook',
			userData: JSON.stringify(userData)
		},
		function(data){
			window.location = "/geo/menu.php";
		}
	);
}