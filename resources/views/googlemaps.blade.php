<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Google Maps API</title>
	<style>
		#map{
			height: 500px;
			width:100%;
		}
	</style>
</head>
<body>
	<div id="map"></div>

	<script>
		function initMap(){
			var location = {lat: 10.767881 ,lng: 106.610681};
			var map = new google.maps.Map(document.getElementById('map'),{
				zoom: 18,
				center: location,
				draggable: true
			});
		}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap"
	async defer></script>
</body>
</html>