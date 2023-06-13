<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/Zanrontroler.php';

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreiranje instance
    $zanrKontroler = new ZanrKontroler();
    $zanrKontroler->kreiraj_zanr($_POST['naziv']);

    // Preusmeravanje korisnika na željenu stranicu nakon obrade forme
    header('Location: zanrovi.php');
    exit();
}
?>