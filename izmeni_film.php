<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/FilmKontroler.php';

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreiranje instance
    $filmKontroler = new FilmKontroler();
    $filmKontroler->izmeni_film($_POST['film_id']);

    // Preusmeravanje korisnika na zeljenu stranicu nakon obrade forme
    header('Location: filmovi.php');
    exit();
}

// Provera da li je prosleđen film_id za izmenu
if (isset($_GET['film_id'])) {

    $film_id = $_GET['film_id'];
    $film = $filmKontroler->vrati_film($film_id);

    // Provera da li je prisutan zanr_id u $_POST nizu
    if (!isset($_POST['zanr_id'])) {
        echo "Nedostaje zanr_id.";
        exit;
    }

    // Provera da li je pronadjen film
    if ($film) {
        $naslov = $film->naslov;
        $godina = $film->godina;
        $zanr_id = $film->zanr_id;
    } else {
        // Ako film nije pronađen
        echo "Film nije pronađen.";
        exit;
    }
} else {
    // Ako nije prosleđen film_id
    echo "Nije prosleđen film_id.";
    exit;
}
