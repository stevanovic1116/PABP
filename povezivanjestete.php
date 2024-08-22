<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osiguravajuca_kompanija"; 
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Konekcija nije uspela: " . $conn->connect_error);
}
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
echo "<pre>";
print_r($_POST);
echo "</pre>";
$sql = $conn->prepare("INSERT INTO stete (datum_stete, vreme_stete, mesto, drzava, povredjeni, ime, prezime, jmbg, telefon, opis) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssssssss", $datum_stete, $vreme_stete, $mesto, $drzava, $povredjeni, $ime, $prezime, $jmbg, $telefon, $opis);
if ($sql->execute() === TRUE) {
    echo "Šteta je uspešno dodata.";
    header("Location: unetestete.php?id=$id");
} else {
    echo "Greška pri unosu štete: " . $conn->error;
    var_dump($conn->error);
}
$sql->close();
$conn->close();
?>
