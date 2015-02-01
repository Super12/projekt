<?php
//Startujemy sesje
session_start();
    require '/../funkcje/baza.php';

//generowanie losowwej nazwy zdjecia
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}

 


// jeśli nie jesteś zalogowany jako admin to nic nie doda
if (!is_null($_SESSION["admin"]))
{
	// robrazja nam zapytanie GET (kod znaleziony na intenecie)
	$columns = implode(", ",array_keys($_GET));
	$escaped_values = array_values($_GET);
	$values  = implode('", "', $escaped_values);

	$sql = "INSERT INTO `filmy` ($columns) VALUES (\"$values\")";

	//echo $sql;
	// Wyslij zapytanie tworzące
	echo random_striny(20);
	copy('http://lorempixel.com/800/300', '../../images/filmy/file.jpeg');
	//$baza->query($sql);
}{

	echo "czego tu szukasz";
}