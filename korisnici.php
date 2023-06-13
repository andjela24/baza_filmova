<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/KorisnikKontroler.php';

// Dohvatite sve korisnike
$korisnikKontroler = new KorisnikKontroler();
$korisnici = $korisnikKontroler->vrati_sve_korisnike();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prikaz korisnika</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Prikaz korisnika</h2>
    <a class="button" href="filmovi.php">Filmovi</a>
    <a class="button" href="zanr.php">Zanrovi</a>
    <table>
        <tr>
            <th>Username</th>
            <th>Ime</th>
            <th>prezime</th>
            <th>Izmeni</th>
            <th>Obriši</th>
        </tr>
        <?php foreach ($korisnici as $korisnik) { ?>
            <tr>
                <td><?php echo $korisnik['username']; ?></td>
                <td><?php echo $korisnik['ime']; ?></td>
                <td><?php echo $korisnik['prezime']; ?></td>
                <td><a class="button" href="forma_izmena_korisnika.php?korisnik_id=<?php echo $korisnik['korisnik_id']; ?>">Izmeni</a></td>
                <td><a class="btn_crveno" href="obrisi_korisnika.php?korisnik_id=<?php echo $zanr['korisnik_id']; ?>">Obriši</a></td>
            </tr>
        <?php } ?>
    </table>
    <a class="button" href="forma_kreiranje_korisnika.php">Kreiraj novog korisnika</a>
</body>
</html>
