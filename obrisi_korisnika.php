<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/KorisnikKontroler.php';

// Provera da li je prosleđen korisnik_id za brisanje
if (isset($_GET['korisnik_id'])) {
    $korisnik_id = $_GET['korisnik_id'];
    
    // Kreiranje instance
    $korisnikKontroler = new KorisnikKontroler();
    $korisnikKontroler->obrisi_korisnika($korisnik_id);
    
    // Preusmeravanje korisnika na željenu stranicu nakon brisanja
    header('Location: korisnici.php');
    exit();
} else {
    // Ako nije prosleđen korisnik_id
    echo "Nije prosleđen korisnik_id.";
    exit();
}
?>
