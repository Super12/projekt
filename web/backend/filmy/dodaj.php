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

	// GENERUJEMY ZDJĘCIE
	$nazwa = random_string(20);
	$link = "http://$_SERVER[HTTP_HOST]/images/filmy/".$nazwa.".jpeg";
	//pobieranie zdjęcia

	copy('http://lorempixel.com/800/300', '../../images/filmy/'.$nazwa.'.jpeg');


	
	// rozbraja nam zapytanie GET (kod znaleziony na intenecie)
	$columns = implode(", ",array_keys($_GET));
	$escaped_values = array_values($_GET);
	$values  = implode('", "', $escaped_values);

	$sql = "INSERT INTO `filmy` ($columns, `adres_do_obrazka`) VALUES (\"$values\", '$link')";

	// Wyslij zapytanie tworzące

	$baza->query($sql);
} else {

	echo "czego tu szukasz";
}