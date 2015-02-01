<?php
    // Pobierz polączenie z bazą danych
    require '/../funkcje/baza.php';

    // tworzenei tabeli

    echo '<table class="table table-striped">';
    echo '<thead><tr><th>Numer</th><th>Nazwa filmu</th><th>Imie i nazwisko</th><th>Data</th></tr></thead><tbody>';

    $results = $baza->get_results("SELECT * FROM zamowienia");
    // iteruj po wszystkich filmach
    foreach($results as $zamowienie) {
        $film = $baza->get_row("SELECT `nazwa` FROM filmy WHERE id=".$zamowienie->film_id);
        echo '<tr><td>'.$zamowienie->id.'</td><td>'.$film->nazwa.'</td><td>'.$zamowienie->imie_nazwisko.'</td><td>'.$zamowienie->data.'</td></tr>';
    }
    echo '</tbody></table>';
?>