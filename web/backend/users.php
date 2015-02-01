<?php
//Startujemy sesje
session_start();
// Ustawiamy nagłówek na JSON
header('Content-Type: application/json');

//Tablica z administratorami login:pass
$admini = [
		'admin:pass',
		'tester:tester',
		'piotr:super'
		];

// sprawdzamy czy w tablicy są dane z GET
if (array_search($_GET['login'].':'.$_GET['pass'], $admini) > -1)
{
	// jesli znalazło swróc pozytywny wynik i zarejestruj sesje
	$_SESSION["admin"] = $_GET['login'];

	echo '{"ok" : 1}';

} else
{
	//Zwróc, że hasło jest nieprawidłowe
	echo '{"ok" : 0}';
}