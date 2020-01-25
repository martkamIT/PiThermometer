<?php
$db = new SQLite3('temp.db');

$stm = $db->prepare('SELECT * FROM temp ORDER BY id LIMIT 50');
$res = $stm->execute();
$table = array();
						
while ($row = $res->fetchArray()) {
							
$dt = new DateTime();
						
$dt->setTimestamp($row[1]);
$dt->setTimeZone(new DateTimeZone("Europe/Warsaw"));
$row[1] = $dt->format('Y-m-d H:i');
							
array_push($table, array("y" => $row[2], "label" => $row[1]));
							
}

$dataPoints = $table;


?>
<!DOCTYPE HTML>
<html>
<head>
	<title>RPiTermometr</title>
	<link rel="stylesheet" href="main.css"/>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Ostatnie 50 pomiarów temperatury",
		fontFamily: "arial",
		fontWeight: "bold",
		fontSize: 34,
		fontColor: "black",
		padding: 48
	},
	axisY: {
		title: "Temperatura",
		maximum: 34,
		minimum: 18
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
	<div id="page">
			<div id="header" class="frame">

				<h1 align="center">Raspberry Pi Termometr</h1>
				
			</div>
			
			<div id="menu" class="frame">
			</div>
<div id="chartContainer" style="height: 470px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div id="bottom" class="frame">
				<div align="center">
				<p>@2020 Martyna Kamieniorz</p>
				</div>
			</div>
</body>
</html>
