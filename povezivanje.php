<?php
// Povezivanje sa bazom podataka
$servername = "localhost";
$username = "root";
$password = "";
$database = "osiguravajuca_kompanija";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Neuspela konekcija: " . $conn->connect_error);
}

$ime = $_POST['ime'];
$email = $_POST['email'];
$lozinka = password_hash($_POST['lozinka'], PASSWORD_BCRYPT);
$sql = "SELECT * FROM korisnici WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $message = "Korisnik sa ovim emailom već postoji.";
    $exists = true;
} else {
    $sql = "INSERT INTO korisnici (ime, email, lozinka) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $ime, $email, $lozinka);

    if ($stmt->execute()) {
        $message = "Uspešno ste se registrovali.";
        $exists = false;
    } else {
        $message = "Greška prilikom registracije: " . $stmt->error;
        $exists = false;
    }
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .centered-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }
        .message {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .btn-custom {
            font-size: 1.2rem;
            margin: 5px;
        }
    </style>
</head>
<body>
    <div class="container centered-container">
        <div class="message"><?php echo $message; ?></div>
        <a href="/Projekat/prijava.php" class="btn btn-primary btn-custom">Odlazak na prijavu</a>
        <?php if (isset($exists) && $exists): ?>
            <a href="/Projekat/registracija.php" class="btn btn-secondary btn-custom">Ponovna registracija</a>
        <?php endif; ?>
    </div>
</body>
</html>
