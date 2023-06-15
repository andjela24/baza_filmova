<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/model/Korisnik.php';

// Postavljanje početne vrednosti poruke na null
$poruka = null;

// Provera da li je metod post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dohvatite korisničko ime i lozinku iz forme
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Provera korisničkog imena i lozinke
    if (validirajKorisnika($username, $password)) {
        header('Location: filmovi.php');

    } else {
        // Pogrešno korisničko ime ili lozinka
        $poruka = "Pogrešno korisničko ime ili lozinka.";
    }
}

function validirajKorisnika($username, $password)
{
    // Pristup bazi podataka
    $konekcija = Konekcija::getInstance();
    
    // Priprema upita za proveru korisnika
    $query = $konekcija->prepare('SELECT * FROM korisnik WHERE username = ? AND password = ?');
    $query->bindParam(1, $username);
    $query->bindParam(2, $password);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    // Provera rezultata upita
    if ($result) {
        // Korisnik pronađen
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
    <h2 class="title">Prijava</h2>
    <form method="post" action="">
        <label for="username">Korisničko ime:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Lozinka:</label>
        <input type="password" id="password" name="password" required><br><br>

        <?php
        // Prikaz poruke o grešci, ako postoji
        if (!empty($poruka)) {
            echo '<p class="input-error">' . $poruka . '</p>';
        }
        ?>
        <div class="button-group">
        <p>Nemate nalog? </p><a class="btn_grey" href="forma_kreiranje_korisnika.php">Registrujte se</a>
        <input type="submit" value="Prijavi se">
        </div>
    </form>
</body>
</html>
