<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija - Stevanović osiguranje</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Registracija</h1>
        <form action="php/povezivanje.php" method="POST">
            <div class="form-group">
                <label for="email">Email adresa:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="ime">Ime:</label>
                <input type="text" class="form-control" id="ime" name="ime" required>
            </div>
            <div class="form-group">
                <label for="prezime">Prezime:</label>
                <input type="text" class="form-control" id="prezime" name="prezime" required>
            </div>
            <div class="form-group">
                <label for="lozinka">Lozinka:</label>
                <input type="password" class="form-control" id="lozinka" name="lozinka" required>
            </div>
            <button type="submit" class="btn btn-primary">Registruj se</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>