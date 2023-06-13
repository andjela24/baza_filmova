<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';

// Provera da li je prosleđen film_id za brisanje
if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];
    
    // Kreiranje instance klase FilmKontroler
    $filmKontroler = new FilmKontroler();
    
    // Pozivanje metode za brisanje filma
    $filmKontroler->obrisi_film($film_id);
    
    // Preusmeravanje korisnika na željenu stranicu nakon brisanja
    header('Location: filmovi.php');
    exit();
} else {
    // Ako nije prosleđen film_id, možete obraditi tu situaciju ili prikazati poruku korisniku
    echo "Nije prosleđen film_id.";
    exit();
}
?>
