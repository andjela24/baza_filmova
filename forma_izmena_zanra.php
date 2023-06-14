<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/ZanrKontroler.php';

$zanrKontroler = new ZanrKontroler();

// Provera da li je zahtev POST metoda
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Provera da li je prosleđen zanr_id za izmenu
    if (isset($_POST['zanr_id'])) {
        $zanr_id = $_POST['zanr_id'];
        $zanr = $zanrKontroler->vrati_zanr($zanr_id);

        // Provera da li je pronađen zanr
        if ($zanr) {
            $naziv = $zanr->naziv;
            //Izemna zanra
            $zanrKontroler->izmeni_zanr($zanr_id);
            // Preusmeravanje korisnika na zeljenu stranicu nakon obrade forme
            header('Location: zanrovi.php');
            exit();
        } else {
            // Ako zanr nije pronađen
            echo "Zanr nije pronađen.";
            exit;
        }
    } else {
        // Ako nije prosleđen zanr_id
        echo "Nije prosleđen zanr_id.";
        exit;
    }
}
if (isset($_GET['zanr_id'])) {
    $zanr_id = $_GET['zanr_id'];
    $zanr = $zanrKontroler->vrati_zanr($zanr_id);

    // Provera da li je pronađen zanr
    if ($zanr) {
        $naziv = $zanr->naziv;
    } else {
        // Ako zanr nije pronađen
        echo "Zanr nije pronađen.";
        exit;
    }
} else {
    // Ako nije prosleđen zanr_id
    echo "Nije prosleđen zanr_id.";
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Izmena žanra</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h2 class="title">Izmena žanra</h2>
    <form method="post" action="">
        <input type="hidden" name="zanr_id" value="<?php echo $zanr_id; ?>">

        <label for="naziv">Naziv:</label>
        <input type="text" id="naziv" name="naziv" value="<?php echo $naziv; ?>" required><br><br>

        <div class="button-group">
            <a class="btn_grey" href="zanrovi.php">Nazad na sve žanrove</a>
            <input type="submit" value="Izmeni žanr">
        </div>
    </form>
</body>

</html>