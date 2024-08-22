<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "osiguravajuca_kompanija"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija neuspešna: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];

    $query = "SELECT * FROM korisnici WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Nalog sa tim emailom već postoji.'); window.location.href='registracija.php';</script>";
    } else {
        $hashed_password = password_hash($lozinka, PASSWORD_BCRYPT);
        $query = "INSERT INTO korisnici (ime, prezime, email, lozinka) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $ime, $prezime, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Uspešno ste se registrovali!'); window.location.href='prijava.php';</script>";
        } else {
            echo "<script>alert('Došlo je do greške. Pokušajte ponovo.'); window.location.href='registracija.php';</script>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>
