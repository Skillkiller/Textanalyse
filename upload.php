<?php
$filename = pathinfo($_FILES['datei']['name'], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));
 
 
//Überprüfung der Dateiendung
$allowed_extensions = array('txt');
if(!in_array($extension, $allowed_extensions)) {
 die("Ungültige Dateiendung. Nur txt erlaubt!");
}
 
//Überprüfung der Dateigröße
$max_size = 15*1024*1024; //15 MB
if($_FILES['datei']['size'] > $max_size) {
 die("Bitte keine Dateien größer 15 MB hochladen");
}
 
//Pfad zum Upload
$new_path = "Chat.txt";
 
//Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file($_FILES['datei']['tmp_name'], $new_path);
echo "Datei hochgeladen: Weiterleitung läuft";
echo "<meta http-equiv=\"refresh\" content=\"1; URL=analyse.php\"  />"
?>