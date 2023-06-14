<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/ZanrKontroler.php';

$zanrKontroler = new ZanrKontroler();

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kreiranje žanra
    $zanrKontroler->kreiraj_zanr($_POST['naziv']);
    // Preusmeravanje korisnika na željenu stranicu nakon obrade forme
    header('Location: zanrovi.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Kreiranje žanra</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2 class="title">Kreiranje žanra</h2>
    <form method="post" action="">
        <label for="naziv">Naziv:</label>
        <input type="text" id="naziv" name="naziv" required><br><br>
        <div class="button-group">
            <a class="btn_grey" href="zanrovi.php">Nazad na sve žanrove</a>
            <input type="submit" value="Kreiraj žanr">
        </div>
    </form>
</body>

</html>