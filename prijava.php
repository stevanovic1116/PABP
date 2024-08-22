<?php
session_start(); // Pokreni sesiju
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #d0f0c0;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-size: 18px;
        }
        input[type="email"],
        input[type="password"] {
            padding: 10px;
            font-size: 18px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 15px;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Prijava</h1>
        <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="lozinka">Lozinka:</label>
            <input type="password" id="lozinka" name="lozinka" required><br>
            <input type="submit" value="Prijavi se">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "osiguravajuca_kompanija";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Konekcija neuspešna: " . $conn->connect_error);
            }

            $email = $_POST['email'];
            $lozinka = $_POST['lozinka'];

            // Pretraga korisnika
            $query = "SELECT id, lozinka FROM korisnici WHERE email=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($user_id, $hashed_password);
                $stmt->fetch();
                if (password_verify($lozinka, $hashed_password)) {
                    // Postavi sesiju i preusmeri
                    $_SESSION['user_id'] = $user_id;
                    header("Location: pocetna.php");
                    exit();
                } else {
                    echo "<script>alert('Neispravna lozinka ili email.');</script>";
                }
            } else {
                echo "<script>alert('Nalog ne postoji.');</script>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
