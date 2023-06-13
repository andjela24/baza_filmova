<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/ZanrKontroler.php';

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreiranje instance
    $zanrKontroler = new ZanrKontroler();
    $zanrKontroler->izmeni_zanr($_POST['zanr_id']);

    // Preusmeravanje korisnika na zeljenu stranicu nakon obrade forme
    header('Location: zanrovi.php');
    exit();
}

// Provera da li je prosleđen zanr_id za izmenu
if (isset($_GET['zanr_id'])) {
    $zanr_id = $_GET['zanr_id'];
    $zanr = $zanrKontroler->vrati_zanr($zanr_id);
    
    // Provera da li je pronađen zanr
    if ($zanr) {
        $naziv = $zanr->naziv;
    } else {
        // Ako zanr nije pronađen
        echo "Zanr nije pronađen.";
        exit;
    }
} else {
    // Ako nije prosleđen zanr_id
    echo "Nije prosleđen zanr_id.";
    exit;
}
