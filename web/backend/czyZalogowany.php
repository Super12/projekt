<?php
//Startujemy sesje
session_start();
// Ustawiamy nagłówek na JSON
header('Content-Type: application/json');

if (!is_null($_SESSION["admin"]))
{

	echo '{"zalogowany": 1, "admin" : "'.$_SESSION["admin"].'"}';
} else
{
	//echo '{'zalogowany' : 10, 'admin' : ''}";
}