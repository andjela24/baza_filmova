<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/KorisnikKontroler.php';

$korisnikKontroler = new KorisnikKontroler();

$usernameError = '';
$passwordError = '';
$passwordRepeatError = '';
$imeError = '';
$prezimeError = '';

// Provera da li je korisnik popunio formu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dohvati podatke iz forme
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = isset($_POST['password_repeat']) ? $_POST['password_repeat'] : '';
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];

    // Osnovna validacija podataka
    if (strlen($password) < 8) {
        $passwordError = "Lozinka mora imati najmanje 8 karaktera.";
    } elseif (!preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[^a-zA-Z0-9]/', $password)) {
        $passwordError = "Lozinka mora sadržati mala slova, velika slova, brojeve i specijalne karaktere.";
    }

    if ($password !== $passwordRepeat) {
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
        // Kreiraj novog korisnika pomoću kontrolera
        $korisnikKontroler->kreiraj_korinsika($username, $password, $ime, $prezime);
        
        // Preusmeravanje korisnika na željenu stranicu nakon obrade forme
        header('Location: filmovi.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kreiranje korisnika</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2 class="title">Kreiranje korisnika - registracija</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <span class="input-error"><?php echo $usernameError; ?></span><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <span class="input-error"><?php echo $passwordError; ?></span><br><br>

        <label for="password_repeat">Ponovi password:</label>
        <input type="password" id="password_repeat" name="password_repeat" required><br>
        <span class="input-error"><?php echo $passwordRepeatError; ?></span><br><br>

        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br>
        <span class="input-error"><?php echo $imeError; ?></span><br><br>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required><br>
        <span class="input-error"><?php echo $prezimeError; ?></span><br><br>
        
        <div class="button-group">
            <a class="btn_grey" href="index.php">Uloguj se</a>
            <input type="submit" value="Kreiraj korisnika">
        </div>
    </form>
</body>
</html>
