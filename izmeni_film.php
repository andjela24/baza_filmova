<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/FilmKontroler.php';

// Provjerite da li je zahtjev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreirajte instancu vaše klase
    $filmKontroler = new FilmKontroler();

    // Pozovite odgovarajući metod
    $filmKontroler->izmeni_film($_POST['film_id']);

    // Preusmjerite korisnika na željenu stranicu nakon obrade forme
    header('Location: filmovi.php');
    exit();
}

// Provera da li je prosleđen film_id za izmenu
if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];
    $filmKontroler = new FilmKontroler();
    $film = $filmKontroler->vrati_film($film_id);
    // Provera da li je prisutan zanr_id u $_POST nizu
    if (!isset($_POST['zanr_id'])) {
        echo "Nedostaje zanr_id.";
        exit;
    }

    // Provera da li je pronađen film
    if ($film) {
        $naslov = $film->naslov;
        $godina = $film->godina;
        $zanr_id = $film->zanr_id;
    } else {
        // Ako film nije pronađen, možete obraditi tu situaciju ili prikazati poruku korisniku
        echo "Film nije pronađen.";
        exit;
    }
} else {
    // Ako nije prosleđen film_id, možete obraditi tu situaciju ili prikazati poruku korisniku
    echo "Nije prosleđen film_id.";
    exit;
}
