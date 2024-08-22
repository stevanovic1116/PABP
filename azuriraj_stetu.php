<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'osiguravajuca_kompanija';
$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_error) {
    die('Konekcija na bazu nije uspela: ' . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $datum_stete = $_POST['datum_stete'];
    $vreme_stete = $_POST['vreme_stete'];
    $mesto = $_POST['mesto'];
    $drzava = $_POST['drzava'];
    $povredjeni = $_POST['povredjeni'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $jmbg = $_POST['jmbg'];
    $telefon = $_POST['telefon'];
    $opis = $_POST['opis'];

    $sql = "UPDATE stete SET datum_stete=?, vreme_stete=?, mesto=?, drzava=?, povredjeni=?, ime=?, prezime=?, jmbg=?, telefon=?, opis=? WHERE id=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssssssssssi', $datum_stete, $vreme_stete, $mesto, $drzava, $povredjeni, $ime, $prezime, $jmbg, $telefon, $opis, $id);

    if ($stmt->execute()) {
        header("Location: azuriraj_stetu.php?success=true&id=" . $id);
        exit;
    } else {
        echo "Greška pri ažuriranju: " . $mysqli->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
$success = isset($_GET['success']) ? $_GET['success'] : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ažuriranje Štete - Stevanović osiguranje</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php if ($success): ?>
            <div class="alert alert-success">
                Šteta ID <?php echo htmlspecialchars($id); ?> je uspešno ažurirana!
            </div>
        <?php else: ?>
            <div class="alert alert-danger">
                Ažuriranje nije uspelo ili nije bilo podataka za ažuriranje.
            </div>
        <?php endif; ?>
        <a href="stete.php" class="btn btn-primary mt-3">Povratak na listu šteta</a>
    </div>
</body>
</html>
