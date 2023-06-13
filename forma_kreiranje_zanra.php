<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/ZanrKontroler.php';
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kreiranje žanra</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Kreiranje žanra</h2>
    <form method="post" action="kreiraj_zanr.php">
        <label for="naziv">Naziv:</label>
        <input type="text" id="naziv" name="naziv" required><br><br>
        <div class="button-group">
        <a class="btn_grey" href="zanrovi.php">Nazad na sve žanrove</a>
        <input type="submit" value="Kreiraj žanr">
        </div>
    </form>
</body>
</html>
