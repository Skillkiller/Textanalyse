<html>
<head>
	<meta charset="utf-8">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	
	<!-- Schrift Style -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<!-- Form Style -->
	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
</head>
<?php // content="text/plain; charset=utf-8"

$file = 'Chat.txt';

if (!file_exists($file)) {
	?>
	<body>
		<div class="box box-solid box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Datei fehlt!</h3>
			</div>
			<div class=box-body">
				<p>Die angeforderte Datei fehlt.</p>
				<p>Leite auf die Upload Seite weiter</p>
			</div>
		</div>
		<meta http-equiv="refresh" content="3; URL=index.html"  />	
	</body>
	<?php
	exit;
}

$file_handle = fopen($file, 'r');
$muster = "/[\d]{2}.[\d]{2}.[\d]{2}, [\d]{1,2}:[\d]{2} (PM|AM)? - [\w]{1,}( [\w]{1,})?: /";
$buchstaben = array(
"a" => 0,
"b" => 0,
"c" => 0,
"d" => 0,
"e" => 0,
"f" => 0,
"g" => 0,
"h" => 0,
"i" => 0,
"j" => 0,
"k" => 0,
"l" => 0,
"m" => 0,
"n" => 0,
"o" => 0,
"p" => 0,
"q" => 0,
"r" => 0,
"s" => 0,
"t" => 0,
"u" => 0,
"v" => 0,
"w" => 0,
"x" => 0,
"y" => 0,
"z" => 0,);
$buchstabenliste = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$all = 0;

while (!feof($file_handle)) {

	//Öffne Datei "Chat.txt"
	$line = fgets($file_handle);
	
	//Prüfe ob RegEx zutrifft
	if(preg_match($muster, $line)) {
		$line = preg_replace($muster, "", $line);
	}
	
	//Text in Kleinbuchstaben verwandeln
	$line = strtolower(utf8_encode($line));
	
	//Zeichen zählen
	foreach ($buchstabenliste as $buchstabe) {
		$buchstaben[$buchstabe] = $buchstaben[$buchstabe] + substr_count($line, $buchstabe);
	}
}

//Zähle alle erkannten Buchstaben zusammen
foreach ($buchstaben as $zahl) {
	$all = $all + $zahl;
}
?>
<body>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Gezählte Buchstaben</h3>
			<a href="index.html"><button type="submit" class="btn btn-info pull-right">Zurück</button></a>
        </div>
		<div class="box-body no-padding">
			<table class="table table-striped">
				<tbody>
					<tr>
						<th style="width: 10px">#</th>
						<th style="width: 50px">Anzahl</th>
						<th>Benutzung</th>
						<th style="width: 40px">Prozent</th>
					</tr>
					<tr> <!-- All Zeile | Gebe Daten aller erkannten Buchstaben aus-->
						<td>All</td>
						<td><span class="badge bg-green"><?php echo "$all";?></span></td>
						<td>
							<div class="progress progress-xs progress-striped active">
							<div class="progress-bar progress-bar-success" style="width: 100%"></div>
							</div>
						</td>
						<td><span class="badge bg-green">100%</span></td>
					</tr>
					
					<?php

					//Gebe Anzahl der Buchstaben sortiert nach Buchstabe aus
					foreach ($buchstabenliste as $buchstabe) {
						$gros = strtoupper($buchstabe);
						$prozent = 100/$all;
						$prozent = $prozent * $buchstaben[$buchstabe];
						
						
						?>
					<tr>
						<td><?php echo "$gros";?></td>
						<td><span class="badge bg-green"><?php echo "$buchstaben[$buchstabe]";?></span></td>
						<td>
							<div class="progress progress-xs">
							<div class="progress-bar progress-bar-warning" style="width: <?php echo "$prozent"?>%"></div>
							</div>
						</td>
						<td><span class="badge bg-green"><?php echo number_format($prozent, 3);?>%</span></td>
					</tr>
						<?php
					}

				//Schließe Datei
				fclose($file_handle);

				//Lösche "Chat.txt"
				unlink($file);
				?>
					
					
					
					
					
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>