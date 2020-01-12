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

			<div id="content" class="frame">
				<script src="index.js"></script>
				<div align="center">
					<?php
						$db = new SQLite3('temp.db');

						echo "Temperatura:";
						echo "\n";

						$stm = $db->prepare('SELECT temperature FROM temp ORDER BY id DESC LIMIT 1');
						$res = $stm->execute();

						$row = $res->fetchArray(SQLITE3_NUM);
						echo "{$row[0]} {$row[1]} {$row[2]}";
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
