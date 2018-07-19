<!DOCTYPE html>
<html>
<head>
	<title>Medicento Dealers</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="googleMap.js"></script>
	<link rel="stylesheet" type="text/css" href="dealer1.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-light bg-light nav">
  		<a class="navbar-brand" href="#">Medicento</a>
  	</nav>

  	<div class="container">
  		<form>
  		<div id="input">
  			<div class="form-group">
      		<label for="city">Search By Name or Address : </label>
      		<input type="text" class="form-control" placeholder="Name or Address" name="name" id="city" >
      		</div>
      	</div>
      	<div id="input">
      		<div class="form-group">
      		<label for="current">Locate Your Nearest Medicento Dealer  </label>
      		<button class="btn btn-primary" id="marginOne" name="current">Use My Current Location</button>
      	</div>
      </div>
  	</form>
	  	<div id="input">
	  		<label>Sort Dealer By : </label>
	  		<select id="marginOne">
	  			<option>Distance</option>
	  			<option>Name</option>
	  		</select>
	  		<label>Show Dealer Within</label>
	  		<select>
	  			<option>10km</option>
	  			<option>20km</option>
	  			<option>30km</option>
			</select>
	  	</div>
	  	<div id="addr" hidden="true">Jeewan Mala Hospital, SHREE JEEWAN HOSPITAL, New Rohtak Rd, Block 65, Karol Bagh, New Delhi, Delhi 110005</div>
	  	<div class="row">
	      <div class="col-sm-12 col-md-5">
	        <div id="result"></div>
	      </div> 
	      <div class="col-sm-12 col-md-7">
	        <div id="map"></div>
	      </div>    
	    </div>
    </div>
	<script type="text/javascript" src="googleMap.js" ></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkUeA9GLW4szU-BoclL4vcw-ypVaISHtY&&callback=initMap"></script>
    <script>
$(document).ready(function(){
 load_data();
 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
    $('.address').click(function(){
   		var latlong = $(this).html();
   		var result = latlong.split("i> ")
   		$("#addr").html(result[1]);
   		console.log($('#addr').html());
   		coreAddress();
   	});
   }
  });
 }
 $('#city').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
</body>
</html>