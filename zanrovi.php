<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/ZanrKontroler.php';

// Dohvatite sve filmove
$zanrKontroler = new ZanrKontroler();
$zanrovi = $zanrKontroler->vrati_sve_zanrove();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prikaz zanrova</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Prikaz zanrova</h2>
    <a class="button" href="filmovi.php">Filmovi</a>
    <a class="button" href="korsnici.php">Korisnici</a>
    <table>
        <tr>
            <th>Naziv</th>
            <th>Izmeni</th>
            <th>Obriši</th>
        </tr>
        <?php foreach ($zanrovi as $zanr) { ?>
            <tr>
                <td><?php echo $zanr['naziv']; ?></td>
                <td><a class="button" href="forma_izmena_zanra.php?zanr_id=<?php echo $zanr['zanr_id']; ?>">Izmeni</a></td>
                <td><a class="btn_crveno" href="obrisi_zanr.php?zanr_id=<?php echo $zanr['zanr_id']; ?>">Obriši</a></td>
            </tr>
        <?php } ?>
    </table>
    <a class="button" href="forma_kreiranje_zanra.php">Kreiraj novi zanr</a>
</body>
</html>
