<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/FilmKontroler.php';
session_start();
// Kreirajte instancu kontrolera filma
$filmKontroler = new FilmKontroler();

// Dohvatite sve filmove
$filmovi = $filmKontroler->vrati_sve_filmove();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Prikaz filmova</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Prikaz filmova</h2>
    <table>
        <tr>
            <th>Naslov</th>
            <th>Godina</th>
            <th>Dodato</th>
            <th>Izmeni</th>
            <th>Obriši</th>
        </tr>
        <?php foreach ($filmovi as $film) { ?>
            <tr>
                <td><?php echo $film['naslov']; ?></td>
                <td><?php echo $film['godina']; ?></td>
                <td><?php echo $film['dodato_at']; ?></td>
                <td><a class="button" href="edit_film.php?film_id=<?php echo $film['film_id']; ?>">Izmeni</a></td>
                <td><a class="button" href="delete_film.php?film_id=<?php echo $film['film_id']; ?>">Obriši</a></td>
            </tr>
        <?php } ?>
    </table>
    <a class="button" href="forma_kreiranje_filma.php">Kreiraj novi film</a>
</body>
</html>
