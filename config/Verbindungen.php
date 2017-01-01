<?php
include(__DIR__ . "/config.php");

$sqlserver = "localhost";	// Nur einstellen wenn MySQL aktiv sein soll
$sqlusername = "root";	// Nur einstellen wenn MySQL aktiv sein soll
$sqlpassword = "";	// Nur einstellen wenn MySQL aktiv sein soll

$sqldatenbank = "analyse";	// Nur einstellen wenn MySQL aktiv sein soll

if ($enableMysql) {
	$verbindung = mysqli_connect($sqlserver, $sqlusername, $sqlpassword)
	or die ("Fehler bei der Anmeldung");

	mysqli_select_db($verbindung, $sqldatenbank)
	or die ("Verbindung zur Datenbank gescheitert");
}

?>
