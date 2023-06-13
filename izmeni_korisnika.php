<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/KorisnikKontroler.php';

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreiranje instance
    $korisnikKontroler = new KorisnikKontroler();
    $korisnikKontroler->izmeni_korisnika($_POST['korisnik_id']);

    // Preusmeravanje korisnika na zeljenu stranicu nakon obrade forme
    header('Location: korisnici.php');
    exit();
}

// Provera da li je prosleđen korisnik_id za izmenu
if (isset($_GET['korisnik_id'])) {

    $korisnik_id = $_GET['korisnik_id'];
    $korisnik = $korisnikKontroler->vrati_korisnika($korisnik_id);

    // Provera da li je pronadjen korisnik
    if ($korisnik) {
        $username = $korisnik->username;
        $password = $korisnik->password;
        $ime = $korisnik->ime;
        $prezime = $korisnik->prezime;
    } else {
        // Ako korisnik nije pronađen
        echo "Korisnik nije pronađen.";
        exit;
    }
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
} else {
    // Ako nije prosleđen korisnik_id
    echo "Nije prosleđen korisnik_id.";
    exit;
}
