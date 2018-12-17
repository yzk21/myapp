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
		
		/* テキストボックスのサイズ */
        input[type=text]{
        width:165px;
        height:38px;
        }
	</style>
</head>
	<body>
	    
	    <input type="text">
	    <input type="text">
	    <input type="text">
	    <input type="text">
	    <input type="text">
	    
	    <nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">タイトル</a>
		</div>
		
		<div class="collapse navbar-collapse" id="navbarEexample1">
			<ul class="nav navbar-nav">
				<li><a href="#">メニューＡ</a></li>
				<li class="active"><a href="#">メニューＢ</a></li>
				<li><a href="#">メニューＣ</a></li>
			</ul>
		</div>
	</div>
</nav>
	    

		<div id="container">
			<div id="sample"></div>

			<p><button class="" onclick="maker()">検索</button></p>
		</div>

		<script>
		
		function map(){
		var map = new google.maps.Map(document.getElementById('sample'), {
					center: {
						lat: 32.750286, //緯度を設定
						lng: 129.877667 //経度を設定
					},
					zoom: 15 //地図のズームを設定
					});
		}
		
			var map;
			var marker = [];
			var infoWindow = [];
			var markerData = [];
			
		function maker (){
		    
			markerData = [
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
			
			initMap();
			}

			function initMap() {
				var map = new google.maps.Map(document.getElementById('sample'), {
					center: {
						lat: 32.750286, //緯度を設定
						lng: 129.877667 //経度を設定
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
		<script src="https://maps.googleapis.com/maps/api/js?callback=map&key=AIzaSyDs8ZQZl7iOsTLyawcCtPdAxPXZ_kU2j6o"></script>
	</body>
</html>
   