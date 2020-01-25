<html>
	 <head>
		 <title>RPiTermometr</title>
		 <link rel="stylesheet" href="main.css"/>
		 <style>
.myButton {
	box-shadow:inset 0px 1px 0px 0px #7a8eb9;
	background-color:#345BEB;
	border:4px solid #CCC;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:28px;
	font-weight:bold;
	padding:18px 64px;
	text-decoration:none;
}
.myButton:hover {
	background-color:#4b6ce7;
}
.myButton:active {
	position:relative;
	top:1px;
}
		 </style>
	 </head>
	 <body>
		<div id="page">
			<div id="header" class="frame">

				<h1 align="center">Raspberry Pi Termometr</h1>
				
			</div>
			
			<div id="menu" class="frame">
			</div>

			<div id="content" class="frame">
				
				
				<div align="center">
					<h2>Aktualny pomiar:</h2>
					
					<?php
						$db = new SQLite3('temp.db');

						echo "Data:";
						echo "\n";

						$stm = $db->prepare('SELECT data FROM temp ORDER BY id DESC LIMIT 1');
						$res = $stm->execute();
						
						
						$row = $res->fetchArray(SQLITE3_NUM);
						$dt = new DateTime();
						
						
						$dt->setTimestamp($row[0]);
						$dt->setTimeZone(new DateTimeZone("Europe/Warsaw"));
						$datetime = $dt->format('Y-m-d H:i');
						
						echo "$datetime"
						
					?>	
				</div>
				<div align="center">
					<?php
						$db = new SQLite3('temp.db');

						echo "Temperatura:";
						echo "\n";

						$stm = $db->prepare('SELECT temperature FROM temp ORDER BY id DESC LIMIT 1');
						$res = $stm->execute();

						$row = $res->fetchArray(SQLITE3_NUM);
						echo "$row[0]";
					?>	
				</div>

				<div id="content" class="frame">
				<div align="center">
					<h4>Podstrony:</h4>
						<a href="index2.php" class="myButton">Tabela pomiarów</a>
						<a href="index3.php" class="myButton">Wykres pomiarów</a>

					</div>
					</div>
				
			<div id="bottom" class="frame">
				<div align="center">
				<p>@2020 Martyna Kamieniorz</p>
				</div>
			</div>
		</div>
	 </body>

</html>
