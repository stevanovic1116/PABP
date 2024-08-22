<?php
$host = 'localhost';
$user = 'root';
$password = ''; 
$database = 'osiguravajuca_kompanija';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_error) {
    die('Konekcija na bazu nije uspela: ' . $mysqli->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM stete WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Šteta uspešno obrisana!";
    } else {
        echo "Greška pri brisanju štete: " . $mysqli->error;
    }

    $stmt->close();
} else {
    echo "Nije prosleđen validan ID.";
}

$mysqli->close();
header("Location: unetestete.php");
exit();
?>
