<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>HRP Geolocator</title>
	<style type="text/css">* { border: 0; margin: 0; padding: 0; width: 100%; height: 100%;}</style>
</head>
<?php if( isset($_POST['button']) ) {
	if( $_POST['lat'] != 0 && $_POST['lon'] != 0)
		file_put_contents("positions.txt", date("d/m/o H:i", time()+7200).",".$_POST['lat'].",".$_POST['lon']."\n", FILE_APPEND); ?>
<body>
	<p>Position added.</p>
</body>
<?php }
else { ?>
<body onload="getLocation()">
	<form method="post">
		<input type="hidden" name="lat" id="lat" value="0">
		<input type="hidden" name="lon" id="lon" value="0">
		<button type="submit" name="button" id="button">Waiting for geolocation...</button>
	</form>

	<script>
	var x = document.getElementById("button");
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}
	function showPosition(position) {
		document.getElementById("lat").value = position.coords.latitude;
		document.getElementById("lon").value = position.coords.longitude;
		x.innerHTML = "Latitude: " + position.coords.latitude +
		"<br>Longitude: " + position.coords.longitude;
	}
	</script> 
</body>
<?php } ?>
</html>