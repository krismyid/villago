<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>VillaGo</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
		<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet"/>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!--Scripts-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoNqDy1CX5_DPZXlfSw-3gjMhPeVqi84c&sensor=false"></script>
	<script type="text/javascript">
	geocoder = new google.maps.Geocoder();

	  if (navigator.geolocation) {
	    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
	}
	//Get the latitude and the longitude;
	function successFunction(position) {
	    var lat = position.coords.latitude;
	    var lng = position.coords.longitude;
	    codeLatLng(lat, lng)
	}



	function errorFunction(){
	    alert("Geocoder failed");
	}

	  function initialize() {
	    geocoder = new google.maps.Geocoder();



	  }

	  function codeLatLng(lat, lng) {

	    var latlng = new google.maps.LatLng(lat, lng);
	    geocoder.geocode({'latLng': latlng}, function(results, status) {
	      if (status == google.maps.GeocoderStatus.OK) {
	      console.log(results)
	        if (results[1]) {
	         //formatted address
					 document.getElementById("geoaddress").innerHTML = results[0].formatted_address;
					 document.getElementById("currentLatitude").value = lat;
					 document.getElementById("currentLongtitude").value = lng;

	         //alert(results[0].formatted_address)

	        } else {
	          alert("No results found");
	        }
	      } else {
	        alert("Geocoder failed due to: " + status);
	      }
	    });
	  }

	</script>
	<style>
	       #map {
	        height: 400px;
	        width: 100%;
	       }
	    </style>


</head>
