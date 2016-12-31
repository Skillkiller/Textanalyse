<?php
$enableMysql = true;

$verbindung = mysqli_connect("localhost", "Benutzer", "Kennwort")
or die ("Fehler bei der Anmeldung");

mysqli_select_db($verbindung, "Analyse")
or die ("Verbindung zur Datenbank gescheitert");
?>
