<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
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
            max-width: 600px;
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
        input[type="text"],
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
        <h1>Registracija</h1>
        <form method="post" action="">
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" required><br>
            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="lozinka">Lozinka:</label>
            <input type="password" id="lozinka" name="lozinka" required><br>
            <input type="submit" value="Registruj se">
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
                echo "<script>alert('Nalog sa tim emailom već postoji.');</script>";
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
    </div>
</body>
</html>
