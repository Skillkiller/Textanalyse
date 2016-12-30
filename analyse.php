<?php // content="text/plain; charset=utf-8"

$file = 'Chat.txt';

if (!file_exists($file)) {
	?>
	<p>Es exestiert keine Datei! Weiterleitung läuft</p>
	<meta http-equiv="refresh" content="1; URL=index.php"  />
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

//Gebe Anzahl aller erkannten Buchstaben aus
echo "<b>All: $all </b><br />";

//Gebe Anzahl der Buchstaben sortiert nach Buchstabe aus
foreach ($buchstabenliste as $buchstabe) {
	$gros = strtoupper($buchstabe);
	echo "$gros: $buchstaben[$buchstabe] <br />";
}

//Schließe Datei
fclose($file_handle);

//Lösche "Chat.txt"
unlink($file);

?>