<?php
include $_SERVER['DOCUMENT_ROOT'].'/bioskop/kontroler/ZanrKontroler.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Izmena filma</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Izmena filma</h2>
    <?php
    require_once 'FilmKontroler.php';
    
    // Provjeri postoji li film_id u URL parametrima
    if (isset($_GET['film_id'])) {
        $film_id = $_GET['film_id'];
        
        // Kreiraj instancu FilmKontroler-a
        $filmKontroler = new FilmKontroler();
        
        // Dohvati podatke o filmu
        $film = $filmKontroler->vrati_film($film_id);
    } else {
        // Ako film_id nije dostupan, preusmjeri na početnu stranicu ili prikaži poruku o greški
        header('Location: index.php');
        exit();
    }
    ?>
    <form method="post" action="azuriraj_film.php">
        <input type="hidden" name="film_id" value="<?php echo $film->get_film_id(); ?>">
        
        <label for="naslov">Naslov:</label>
        <input type="text" id="naslov" name="naslov" value="<?php echo $film->get_naslov(); ?>" required><br><br>

        <label for="godina">Godina:</label>
        <input type="number" id="godina" name="godina" value="<?php echo $film->get_godina(); ?>" required><br><br>

        <label for="zanr">Žanr:</label>
        <select id="zanr" name="zanr" required>
            <?php
            $zanrKontroler = new ZanrKontroler();
            $zanrovi = $zanrKontroler->vrati_sve_zanrove();

            foreach ($zanrovi as $zanr) {
                $selected = ($zanr->get_zanr_id() == $film->get_zanr_id()) ? 'selected' : '';
                echo '<option value="' . $zanr->get_zanr_id() . '" ' . $selected . '>' . $zanr->get_naziv() . '</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Ažuriraj film">
    </form>
</body>
</html>
