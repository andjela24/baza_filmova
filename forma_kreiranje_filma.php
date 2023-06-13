<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/ZanrKontroler.php';
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kreiranje filma</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Kreiranje filma</h2>
    <form method="post" action="kreiraj_film.php">
        <label for="naslov">Naslov:</label>
        <input type="text" id="naslov" name="naslov" required><br><br>

        <label for="godina">Godina:</label>
        <input type="number" id="godina" name="godina" required><br><br>

        <label for="zanr_id">Žanr:</label>
        <select id="zanr_id" name="zanr_id" required>
            <?php

            $zanrKontroler = new ZanrKontroler();
            $zanrovi = $zanrKontroler->vrati_sve_zanrove();

            foreach ($zanrovi as $zanr) {
                echo '<option value="' . $zanr['zanr_id'] . '">' . $zanr['naziv'] . '</option>';
            }
            ?>
        </select><br><br>
        <div class="button-group">
        <a class="btn_grey" href="filmovi.php">Nazad na sve filmove</a>
        <input type="submit" value="Kreiraj film">
        </div>
    </form>
</body>
</html>
