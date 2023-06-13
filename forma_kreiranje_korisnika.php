<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/KorisnikKontroler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kreiranje korisnika</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Kreiranje korisnika</h2>
    <form method="post" action="kreiraj_korisnika.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" required><br><br>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required><br><br>
        
        <div class="button-group">
        <a class="btn_grey" href="index.php">Uloguj se</a>
        <input type="submit" value="Kreiraj korisnika">
        </div>
    </form>
</body>
</html>
