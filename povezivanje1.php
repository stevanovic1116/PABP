<?php
// Povezivanje sa bazom podataka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osiguravajuca_kompanija";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $lozinka = $_POST['lozinka'];
    $sql = "SELECT * FROM korisnici WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($lozinka, $user['lozinka'])) {
            echo "Uspešno ste se prijavili!";
        } else {
            echo "Email ili lozinka nisu ispravni.";
        }
    } else {
        echo "Email ili lozinka nisu ispravni.";
    }

    $stmt->close();
}

$conn->close();
?>
