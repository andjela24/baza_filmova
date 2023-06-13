<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/ZanrKontroler.php';

// Provera da li je prosleđen zanr_id za brisanje
if (isset($_GET['zanr_id'])) {
    $zanr_id = $_GET['zanr_id'];
    
    // Kreiranje instance
    $zanrKontroler = new ZanrKontroler();
    $zanrKontroler->obrisi_zanr($zanr_id);
    
    // Preusmeravanje korisnika na željenu stranicu nakon brisanja
    header('Location: zanrovi.php');
    exit();
} else {
    // Ako nije prosleđen zanr_id
    echo "Nije prosleđen zanr_id.";
    exit();
}
?>
