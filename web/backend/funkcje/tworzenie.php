<?php
require 'baza.php';
// Startowe tworzenie bazy danych

$baza->multi_query(file_get_contents('sklepik.sql'));

echo "Stworzono baze danych";