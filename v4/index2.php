<html>
	 <head>
		 <title>RPiTermometr</title>
		 <style>
			table {
			border-collapse: collapse;
			width: 60%;
			font-size:110%;
			text-align: center;

			}
			th {
			background-color: #345BEB;
			color: white;
			font-size:100%;
			}
			tr:nth-child(even) {background-color: #f2f2f2}

		 </style>
		 <link rel="stylesheet" href="main.css"/>
	 </head>
	 <body>
		<div id="page">
			<div id="header" class="frame">

				<h1 align="center">Raspberry Pi Termometr</h1>
				
			</div>
			
			<div id="menu" class="frame">
			</div>

			<div id="content" class="frame">				
				<table align="center">
					
					<h2 align="center">Ostatnie 50 pomiarów temperatury:</h2>
					
					<tr>
					<th>Id</th>
					<th>Data i godzina</th>
					<th>Temperatura</th>
					</tr>
					<?php
						$db = new SQLite3('temp.db');

						$stm = $db->prepare('SELECT * FROM temp ORDER BY id DESC LIMIT 50');
						$res = $stm->execute();
						
						
						while ($row = $res->fetchArray()) {
							
							
							$dt = new DateTime();
						
						
							$dt->setTimestamp($row[1]);
							$dt->setTimeZone(new DateTimeZone("Europe/Warsaw"));
							$row[1] = $dt->format('Y-m-d H:i');
							
							echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";
							
						}
					?>	
					</table>

			<div id="bottom" class="frame">
				<div align="center">
				<p>@2020 Martyna Kamieniorz</p>
				</div>
			</div>
		</div>
	 </body>

</html>
