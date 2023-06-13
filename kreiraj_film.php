<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreiranje instance
    $filmKontroler = new FilmKontroler();
    $filmKontroler->kreiraj_film($_POST['naslov'], $_POST['godina'], $_POST['zanr_id']);

    // Preusmeravanje korisnika na željenu stranicu nakon obrade forme
    header('Location: filmovi.php');
    exit();
}
?>