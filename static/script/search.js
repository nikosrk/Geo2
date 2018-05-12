var country_data;
//JAVASCRIPT FUNCTION TRIGGERED WHEN BUTTON IS CLICKED
$(document).on('click', '#search', function(){
	
	var x = document.getElementById("live_data");
	x.style.visibility='hidden';
	var y = document.getElementById("live_message");
	y.style.visibility='hidden';
	var z = document.getElementById("submit_data");
	z.style.visibility='hidden';
	
	var loader2 = document.getElementById("loader2");
	loader2.style.display = "block";
	
	
	//PASSING TEXT VALUE TO A VARIABLE
	var country_name = $('#country').val();
	
	var show = false;
	
	//DYNAMICALLY PRESENTING FETCHED WIKIPEDIA DATA WITH AJAX
	$.ajax({  
		url:"scrap.php",  
		method:"GET",
		data:{"country_name":country_name},
		contentType: 'application/json; charset=utf-8',
		dataType: "text",
		success:function(data){  
			
			x.style.visibility='visible';
			
			loader2.style.display = "none";
			handleResponse(data);
			 
		}  
	});  
	
	
	
	
	
});


//HANDLING SUCCESSFUL AJAX RESPOND
function handleResponse(data) {
	
	
	
	var x = document.getElementById("submit_data");
	
    if(data == "Wrong input"){
		x.style.visibility='hidden';
	}
	else{
		
		country_data = data.split('~');
		
		data = country_data[0];
		x.style.visibility='visible';
	}
	$('#live_data').html(data); 
	
}


//SUBMITING DATA TO DATABASE
$(document).on('click', '#submit', function(){
	
	
	
	var dataToSend = { "flag": country_data[1],
								"name": country_data[2],
								"cname": country_data[3],
								"lat": country_data[4],
								"lon": country_data[5],
								"area": country_data[6],
								"pop": country_data[7],
								"gdp": country_data[8],
								"hdi": country_data[9],
								"gini": country_data[10] };
								
	//$('#live_message').html(dataToSend);
	$.ajax({  
		url:"submit.php",  
		method:"POST",
		data: JSON.stringify(dataToSend),
		beforeSend: function(x) {
            if (x && x.overrideMimeType) {
              x.overrideMimeType("application/j-son;charset=UTF-8");
            }
          },
		success:function(data){  
		
			var x = document.getElementById("live_message");
			x.style.visibility='visible';
			
			$('#live_message').html(data);  
			}  
		}); 
	
});

