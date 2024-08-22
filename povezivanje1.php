<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "osiguravajuca_kompanija; // Zameni sa imenom tvoje baze

// Kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Proveri konekciju
if ($conn->connect_error) {
    die("Konekcija neuspešna: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];

    // Proveri da li email postoji
    $query = "SELECT lozinka FROM korisnici WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Proveri lozinku
        if (password_verify($lozinka, $hashed_password)) {
            echo "<script>window.location.href='pocetna.php';</script>";
        } else {
            echo "<script>alert('Neispravna lozinka ili email.'); window.location.href='prijava.php';</script>";
        }
    } else {
        echo "<script>alert('Nalog ne postoji.'); window.location.href='prijava.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
