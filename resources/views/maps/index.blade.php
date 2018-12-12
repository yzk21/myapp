<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Google Maps APIテスト</title>
	<style type="text/css">
		#container {
			width: 700px;
			margin: 0 auto;
		}
		#sample {
			width: 700px;
			height: 400px;
		}
	</style>
</head>
	<body>

		<div id="container">
			<div id="sample"></div>

			<p><button class="" onclick="test">検索</button></p>
		</div>

		<script>
			var map;
			var marker = [];
			var infoWindow = [];
			var markerData = [
				 {
					name: '長崎駅',
					lat: 32.750286,
					lng: 129.877667,
					icon: 'tam.png' //
				}, {
					name: '長崎大学',
					lat: 32.786129,
					lng: 129.864659
				}, {
					name: '夢タウン',
					lat: 32.746283,
					lng: 129.869982
				}, {
					name: '浜の町',
					lat: 32.743141,
					lng: 129.87489
				}, {
					name: 'ココウォーク',
					lat: 32.762534,
					lng: 129.864648
				}
			];

			function initMap() {
				var map = new google.maps.Map(document.getElementById('sample'), {
					center: {
						lat: markerData[0]['lat'], //緯度を設定
						lng: markerData[0]['lng'] //経度を設定
					},
					zoom: 15 //地図のズームを設定
				  });

				for (var i = 0; i < markerData.length; i++) {
					markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']});
					marker[i] = new google.maps.Marker({
						position: markerLatLng,
						map: map
					});

					infoWindow[i] = new google.maps.InfoWindow({
						content: '<div class="sample">' + markerData[i]['name'] + '</div>'
					});

					markerEvent(i);
				}

				marker[0].setOptions({
					icon: {
						url: markerData[0]['icon']
					}
				});
			}

			function markerEvent(i) {
				marker[i].addListener('click', function() {
					infoWindow[i].open(map, marker[i]);
				});
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyDs8ZQZl7iOsTLyawcCtPdAxPXZ_kU2j6o"></script>
	</body>
</html>
   