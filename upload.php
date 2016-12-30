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
<?php
if (!isset($datei)) {
	?>
	<body>
		<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
			<div class="box box-solid box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Error: Kein Datei</h3>
				</div>
				<div class="box-body">
					<p>Du hast keine Datei ausgewählt oder bist auf versehentlich auf diese Seite gelangt</p>
					<p>Leite dich zurück auf die Upload Seite</p>
				</div>
			</div>
		</div>
		<meta http-equiv="refresh" content="3; URL=index.html"  />
	</body>	
	<?php
	exit;
}
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('txt');
if(!in_array($extension, $allowed_extensions)) {
?>
<body>
	<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
		<div class="box box-solid box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Error: Falscher Datei Typ!</h3>
			</div>
			<div class="box-body">
				<p>Du darfst hier nur ".txt" Dateien hochladen</p>
				<p>Leite dich zurück auf die Upload Seite</p>
			</div>
		</div>
	</div>
	<meta http-equiv="refresh" content="3; URL=index.html"  />
</body>
<?php
exit;
}
 
//Überprüfung der Dateigröße
$max_size = 15*1024*1024; //15 MB
if($_FILES['datei']['size'] > $max_size) {
?>
<body>
	<div class="col-md-4" style="margin-top: 10px; margin-right: auto; /* Abstand rechts */ margin-bottom: 10px; margin-left: auto; /* Abstand links */ float: none;">
		<div class="box box-solid box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Error: Datei zu groß</h3>
			</div>
			<div class="box-body">
				<p>Die Datei darf maximal 15 MB groß sein</p>
				<p>Leite dich zurück auf die Upload Seite</p>
			</div>
		</div>
	</div>
	<meta http-equiv="refresh" content="5; URL=index.html"  />
</body> 
<?php
exit;
}
 
//Pfad zum Upload
$new_path = "Chat.txt";
 
//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
?>
<body>
	<div class="box box-solid box-success">
		<div class="box-header with-border">
			<h3 class="box-title">Datei hochgeladen</h3>
		</div>
		<div class="box-body">
			<p>Die Datei wurde erfolgreich hochgeladen und wir jetzt analysiert</p>
			<p>Weiterleitung läuft</p>
		</div>
	</div>
	<meta http-equiv="refresh" content="1; URL=analyse.php"  />
</body>
</html>