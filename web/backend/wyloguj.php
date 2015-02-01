<?php
// Inicjalizuj sesję
// Jeśli używasz sesion_name("cośtam"), nie zapomnij o tym teraz!
session_start();
// Usuń wszystkie zmienne sesyjne
$_SESSION = array();

// Jeśli pożądane jest zabicie sesji, usuń także ciasteczko sesyjne.
// Uwaga: to usunie sesję, nie tylko dane sesji
if (isset($_COOKIE[session_name()])) { 
   setcookie(session_name(), '', time()-42000, '/'); 
}

// Na koniec zniszcz sesję
session_destroy();
header('Location: /~s175155/');

