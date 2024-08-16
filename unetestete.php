<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'osiguravajuca_kompanija';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_error) {
    die('Konekcija na bazu nije uspela: ' . $mysqli->connect_error);
}
$sql = "SELECT * FROM stete";
$result = $mysqli->query($sql);

if (!$result) {
    die('Greška pri preuzimanju podataka: ' . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unete Štete - Stevanović osiguranje</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, h1 {
            font-family: 'Times New Roman', Times, serif;
            font-size: 1.2em;
        }
        body {
            background-color: #e6ffe6;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            Stevanović osiguranje
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="pocetna.php">Početna strana</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="onama.php">O nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="polise.php">Polise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stete.php">Stete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="unetestete.php">Unete stete</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="prijava.php">Prijava</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registracija.php">Registracija</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Unete Štete</h1>
        <div class="row">
            <?php while ($steta = $result->fetch_assoc()): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            Šteta ID: <?php echo htmlspecialchars($steta['id']); ?>
                        </div>
                        <div class="card-body">
                            <form action="azuriraj_stetu.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($steta['id']); ?>">
                                <div class="form-group">
                                    <label for="datum_stete">Datum nezgode:</label>
                                    <input type="date" class="form-control" name="datum_stete" value="<?php echo htmlspecialchars($steta['datum_stete']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="vreme_stete">Vreme nezgode:</label>
                                    <input type="time" class="form-control" name="vreme_stete" value="<?php echo htmlspecialchars($steta['vreme_stete']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="mesto">Mesto nezgode:</label>
                                    <input type="text" class="form-control" name="mesto" value="<?php echo htmlspecialchars($steta['mesto']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="drzava">Država nezgode:</label>
                                    <input type="text" class="form-control" name="drzava" value="<?php echo htmlspecialchars($steta['drzava']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="povredjeni">Povređeni:</label>
                                    <select class="form-control" name="povredjeni" required>
                                        <option value="Da" <?php if($steta['povredjeni'] == 'Da') echo 'selected'; ?>>Da</option>
                                        <option value="Ne" <?php if($steta['povredjeni'] == 'Ne') echo 'selected'; ?>>Ne</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ime">Ime povređenog:</label>
                                    <input type="text" class="form-control" name="ime" value="<?php echo htmlspecialchars($steta['ime']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="prezime">Prezime povređenog:</label>
                                    <input type="text" class="form-control" name="prezime" value="<?php echo htmlspecialchars($steta['prezime']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jmbg">JMBG povređenog:</label>
                                    <input type="text" class="form-control" name="jmbg" value="<?php echo htmlspecialchars($steta['jmbg']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="telefon">Telefon povređenog:</label>
                                    <input type="text" class="form-control" name="telefon" value="<?php echo htmlspecialchars($steta['telefon']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="opis">Opis štete:</label>
                                    <textarea class="form-control" name="opis"><?php echo htmlspecialchars($steta['opis']); ?></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Ažuriraj štetu</button>
                            </form>
                            <form action="obrisi_stetu.php" method="POST" class="mt-2">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($steta['id']); ?>">
                                <button type="submit" class="btn btn-danger">Obriši štetu</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$result->free();
$mysqli->close();
?>
