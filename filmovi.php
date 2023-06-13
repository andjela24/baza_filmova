<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/ZanrKontroler.php';

// Dohvatite sve filmove
$filmKontroler = new FilmKontroler();
$filmovi = $filmKontroler->vrati_sve_filmove();
// Dohvatite sve žanrove
$zanrKontroler = new ZanrKontroler();
$zanrovi = $zanrKontroler->vrati_sve_zanrove();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prikaz filmova</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Prikaz filmova</h2>
    <a class="btn_grey" href="zanrovi.php">Žanrovi</a>
    <a class="btn_grey" href="korisnici.php">Korisnici</a>
    <table>
        <tr>
            <th>Naslov</th>
            <th>Godina</th>
            <th>Dodato</th>
            <th>Žanr</th>
            <th>Izmeni</th>
            <th>Obriši</th>
        </tr>
        <?php foreach ($filmovi as $film) { ?>
            <tr>
                <td><?php echo $film['naslov']; ?></td>
                <td><?php echo $film['godina']; ?></td>
                <td><?php echo $film['dodato_at']; ?></td>
                <td><?php echo pronadjiNazivZanra($film['zanr_id'], $zanrovi); ?></td>
                <td><a class="button" href="forma_izmena_filma.php?film_id=<?php echo $film['film_id']; ?>">Izmeni</a></td>
                <td><a class="btn_red" href="obrisi_film.php?film_id=<?php echo $film['film_id']; ?>">Obriši</a></td>
            </tr>
        <?php } ?>
    </table>
    <a class="btn_blue" href="forma_kreiranje_filma.php">Kreiraj novi film</a>

    <?php
// Pomoćna funkcija za pronalaženje naziva žanra na osnovu zanr_id
function pronadjiNazivZanra($zanr_id, $zanrovi) {
    foreach ($zanrovi as $zanr) {
        if ($zanr['zanr_id'] == $zanr_id) {
            return $zanr['naziv'];
        }
    }
    return "";
}
?>
</body>
</html>
