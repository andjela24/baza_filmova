<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/KorisnikKontroler.php';

$korisnikKontroler = new KorisnikKontroler();

$usernameError = '';
$passwordError = '';
$passwordRepeatError = '';
$imeError = '';
$prezimeError = '';

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Provera da li je prosleđen korisnik_id za izmenu
    if (isset($_POST['korisnik_id'])) {
        $korisnik_id = $_POST['korisnik_id'];
        $korisnik = $korisnikKontroler->vrati_korisnika($korisnik_id);

        // Provera da li je pronađen korisnik
        if ($korisnik) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $ponovljeni_password = $_POST['ponovljeni_password'];

            // Osnovna validacija podataka
            if (strlen($password) < 8) {
                $passwordError = "Lozinka mora imati najmanje 8 karaktera.";
            }

            else if (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) {
                $passwordError = "Lozinka mora sadržati mala i velika slova, broj i specijalni karakter.";
            }

            if ($password !== $ponovljeni_password) {
                $passwordRepeatError = "Lozinke se ne poklapaju.";
            }
            if (!ctype_upper(substr($ime, 0, 1))) {
                $imeError = "Ime mora početi velikim slovom.";
            }

            if (!ctype_upper(substr($prezime, 0, 1))) {
                $prezimeError = "Prezime mora početi velikim slovom.";
            }

            // Provera da li postoje greške u validaciji
            if (empty($usernameError) && empty($passwordError) && empty($passwordRepeatError) && empty($imeError) && empty($prezimeError)) {
                // Izmena korisnika
                $korisnikKontroler->izmeni_korisnika($korisnik_id);

                // Preusmeravanje korisnika na željenu stranicu nakon obrade forme
                header('Location: korisnici.php');
                exit;
            }
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
}

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
    <h2 class="title">Izmena korisnika</h2>
    <form method="post" action="">
        <input type="hidden" name="korisnik_id" value="<?php echo $korisnik_id; ?>">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>
        <span class="input-error"><?php echo $usernameError; ?></span><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <span class="input-error"><?php echo $passwordError; ?></span><br><br>

        <label for="ponovljeni_password">Ponovite password:</label>
        <input type="password" id="ponovljeni_password" name="ponovljeni_password" required><br>
        <span class="input-error"><?php echo $passwordRepeatError; ?></span><br><br>

        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" value="<?php echo $ime; ?>" required><br>
        <span class="input-error"><?php echo $imeError; ?></span><br><br>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" value="<?php echo $prezime; ?>" required><br>
        <span class="input-error"><?php echo $prezimeError; ?></span><br><br>

        <div class="button-group">
            <a class="btn_grey" href="korisnici.php">Nazad na sve korisnike</a>
            <input type="submit" value="Izmeni korisnika">
        </div>
    </form>
</body>

</html>
