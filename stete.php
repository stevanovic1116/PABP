<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos Štete - Stevanović osiguranje</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, h1, .navbar-nav .nav-link, .navbar-brand {
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
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Unos Štete</h1>
        <form id="steteForm" action="povezivanjestete.php" method="POST">
            <div class="form-group">
                <label for="datum_stete">Datum nezgode:</label>
                <input type="date" class="form-control" id="datum_stete" name="datum_stete" required>
            </div>
            <div class="form-group">
                <label for="vreme_stete">Vreme nezgode:</label>
                <input type="time" class="form-control" id="vreme_stete" name="vreme_stete" required>
            </div>
            <div class="form-group">
                <label for="mesto">Mesto nezgode:</label>
                <input type="text" class="form-control" id="mesto" name="mesto" required>
            </div>
            <div class="form-group">
                <label for="drzava">Država nezgode:</label>
                <input type="text" class="form-control" id="drzava" name="drzava" required>
            </div>
            <div class="form-group">
                <label for="povredjeni">Povređeni:</label>
                <select class="form-control" id="povredjeni" name="povredjeni" required>
                    <option value="Da">Da</option>
                    <option value="Ne">Ne</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ime">Ime povređenog:</label>
                <input type="text" class="form-control" id="ime" name="ime">
            </div>
            <div class="form-group">
                <label for="prezime">Prezime povređenog:</label>
                <input type="text" class="form-control" id="prezime" name="prezime">
            </div>
            <div class="form-group">
                <label for="jmbg">JMBG povređenog:</label>
                <input type="text" class="form-control" id="jmbg" name="jmbg">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon povređenog:</label>
                <input type="text" class="form-control" id="telefon" name="telefon">
            </div>
            <div class="form-group">
                <label for="iznos_stete">Iznos štete:</label>
                <input type="number" class="form-control" id="iznos_stete" name="iznos_stete" required>
            </div>
            <div class="form-group">
                <label for="opis">Opis štete:</label>
                <textarea class="form-control" id="opis" name="opis"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Unesi štetu</button>
        </form>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Uspešno dodato</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Šteta je uspešno dodata u bazu podataka.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="modalRedirectBtn">Početna strana</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
</body>
</html>
