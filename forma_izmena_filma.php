<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/ZanrKontroler.php';
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/FilmKontroler.php';

$filmKontroler = new FilmKontroler();

// Provera da li je prosleđen film_id za izmenu
if (isset($_GET['film_id'])) {
    $film_id = $_GET['film_id'];
    $film = $filmKontroler->vrati_film($film_id);

    // Provera da li je pronađen film
    if ($film) {
        $naslov = $film->naslov;
        $godina = $film->godina;
        $zanr_id = $film->zanr_id;
    } else {
        // Ako film nije pronađen
        echo "Film nije pronađen.";
        exit;
    }
} else {
    // Ako nije prosleđen film_id
    echo "Nije prosleđen film_id.";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Izmena filma</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2>Izmena filma</h2>
    <form method="post" action="izmeni_film.php">
        <input type="hidden" name="film_id" value="<?php echo $film_id; ?>">

        <label for="naslov">Naslov:</label>
        <input type="text" id="naslov" name="naslov" value="<?php echo $naslov; ?>" required><br><br>

        <label for="godina">Godina:</label>
        <input type="number" id="godina" name="godina" value="<?php echo $godina; ?>" required><br><br>
        <label for="zanr_id">Žanr:</label>
        <select id="zanr_id" name="zanr_id" required>
            <?php
            $zanrKontroler = new ZanrKontroler();
            $zanrovi = $zanrKontroler->vrati_sve_zanrove();

            foreach ($zanrovi as $zanr) {
                $selected = ($zanr['zanr_id'] == $zanr_id) ? 'selected' : '';
                echo '<option value="' . $zanr['zanr_id'] . '" ' . $selected . '>' . $zanr['naziv'] . '</option>';
            }
            ?>
        </select><br><br>
        <div class="button-group">
        <a class="btn_grey" href="filmovi.php">Nazad na sve filmove</a>
        <input type="submit" value="Izmeni film">
        </div>
    </form>
</body>

</html>