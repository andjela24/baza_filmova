<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/KorisnikKontroler.php';

$korisnikKontroler = new KorisnikKontroler();

// Proveri da li je korisnik popunio formu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dohvati podatke iz forme
    $username = $_POST['username'];
    $password = $_POST['password'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];

    // Osnovna validacija podataka
    if (strlen($password) < 8) {
        echo "Lozinka mora imati najmanje 8 karaktera.";
        return;
    }

    if (!ctype_upper(substr($ime, 0, 1))) {
        echo "Ime mora početi velikim slovom.";
        return;
    }

    if (!ctype_upper(substr($prezime, 0, 1))) {
        echo "Prezime mora početi velikim slovom.";
        return;
    }
    // Kreiraj novog korisnika pomoću kontrolera
    $korisnikKontroler->kreiraj_korinsika($username, $password, $ime, $prezime);
    
    // Preusmeravanje korisnika na željenu stranicu nakon obrade forme
    header('Location: filmovi.php');
    exit();

}
?>