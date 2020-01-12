<html>
	 <head>
		 <title>RPiTermometr</title>
		 <link rel="stylesheet" href="main.css"/>
	 </head>
	 <body>
		<div id="page">
			<div id="header" class="frame">

				<h1 align="center">Raspberry Pi Termometr</h1>
				
			</div>
			
			<div id="menu" class="frame">
			</div>
			
			<div id="header" class="frame">

				<h1 align="center">Aktualny pomiar:</h1>
				
			</div>
			
			<div id="menu" class="frame">
			</div>

			<div id="content" class="frame">
				<div align="center">

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
			<div id="bottom" class="frame">
				<div align="center">
				<p>@2020 Martyna Kamieniorz</p>
				</div>
			</div>
		</div>
	 </body>

</html>
