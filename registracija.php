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
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registracija</title>
</head>
<body>
    <h2>Registracija</h2>
    <form method="post" action="">
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br><br>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required><br><br>

        <input type="submit" value="Registriraj se">
    </form>
</body>
</html>

