<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';

// Provjerite da li je zahtjev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreirajte instancu vaše klase
    $filmKontroler = new FilmKontroler();

    // Pozovite odgovarajući metod
    $filmKontroler->kreiraj_film($_POST['naslov'], $_POST['godina'], $_POST['zanr']);

    // Preusmjerite korisnika na željenu stranicu nakon obrade forme
    header('Location: filmovi.php');
    exit();
}
?>