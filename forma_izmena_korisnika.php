<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/KorisnikKontroler.php';


$korisnikKontroler = new KorisnikKontroler();

// Provera da li je prosleđen korisnik_id za izmenu
if (isset($_GET['korisnik_id'])) {
    $korisnik_id = $_GET['korisnik_id'];
    $korisnik = $korisnikKontroler->vrati_korisnika($korisnik_id);

    // Provera da li je pronađen korisnik
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
} else {
    // Ako nije prosleđen korisnik_id
    echo "Nije prosleđen korisnik_id.";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Izmena korisnika</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2>Izmena korisnika</h2>
    <form method="post" action="izmeni_korisnika.php">
        <input type="hidden" name="korisnik_id" value="<?php echo $korisnik_id; ?>">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br><br>
        
        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" value="<?php echo $ime; ?>" required><br><br>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" value="<?php echo $prezime; ?>" required><br><br>

        <div class="button-group">
        <a class="btn_grey" href="korisnici.php">Nazad na sve korisnike</a>
        <input type="submit" value="Izmeni korisnika">
        </div>
    </form>
</body>

</html>