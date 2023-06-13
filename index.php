<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/model/Korisnik.php';
session_start();

// Provjerite je li korisnik poslao obrazac
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dohvatite korisničko ime i lozinku iz obrasca
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proveri korisničkog imena i lozinke
    if (validirajKorisnika($username, $password)) {
        //Cuvanje sesije na osnovu username-a
        $_SESSION['username'] = $username;
        header('Location: filmovi.php');

    } else {
        // Pogrešno korisničko ime ili lozinka, prikažite odgovarajuću poruku o grešci
        echo "Pogrešno korisničko ime ili lozinka.";
    }
}

function validirajKorisnika($username, $password)
{
    // Pristup bazi podataka
    $konekcija = Konekcija::getInstance();
    
    // Priprema upita za provjeru korisnika
    $query = $konekcija->prepare('SELECT * FROM korisnik WHERE username = ? AND password = ?');
    $query->bindParam(1, $username);
    $query->bindParam(2, $password);
    //$query->execute(['username' => $username]);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    // Provjera rezultata upita
    if ($result) {
        // Korisnik pronađen, provjerite lozinku
        return true;
    } else {
        // Korisnik nije pronađen
        return false;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prijava</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Prijava</h2>
    <form method="post" action="">
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required><br><br>

        <div class="button-group">
        <p>Nemate nalog? </p><a class="btn_grey" href="forma_kreiranje_korisnika.php">Registrujte se</a>
        <input type="submit" value="Prijavi se">
        </div>
    </form>
</body>
</html>
