<?php
//Startujemy sesje
session_start();
    require '/../funkcje/baza.php';



// rozbraja nam zapytanie GET (kod znaleziony na intenecie)
$columns = implode(", ",array_keys($_GET));
$escaped_values = array_values($_GET);
$values  = implode('", "', $escaped_values);

$sql = "INSERT INTO `zamowienia` ($columns) VALUES (\"$values\")";

// Wyslij zapytanie tworzące

$baza->query($sql);
