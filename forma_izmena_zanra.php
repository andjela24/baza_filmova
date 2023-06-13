<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bioskop/kontroler/ZanrKontroler.php';

$zanrKontroler = new ZanrKontroler();

// Provera da li je prosledjen zanr_id za izmenu
if (isset($_GET['zanr_id'])) {
    $zanr_id = $_GET['zanr_id'];
    $zanr = $zanrKontroler->vrati_zanr($zanr_id);

    // Provera da li je pronadjen zanr
    if ($zanr) {
        $naziv = $zanr->naziv;
    } else {
        // Ako zanr nije pronadjen
        echo "Zanr nije pronađen.";
        exit;
    }
} else {
    // Ako nije prosledjen zanr_id
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
    <h2>Izmena žanra</h2>
    <form method="post" action="izmeni_zanr.php">
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