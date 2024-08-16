<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polise - Stevanović osiguranje</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, h1, .navbar-nav .nav-link, .navbar-brand {
            font-family: 'Times New Roman', Times, serif;
            font-size: 1.2em;
        }
        body {
            background-color: #e0ffe0;
        }
        .container {
            text-align: center;
        }
        .polisa {
            margin-bottom: 20px;
        }
        .polisa img {
            max-width: 100%;
            height: 200px; /* Postavljamo fiksnu visinu za slike */
            object-fit: cover; /* Da bi slike zadržale svoj odnos širine i visine */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Stevanović osiguranje</a>
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
                    <a class="nav-link active" href="polise.php">Polise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="stete.php">Stete</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="unetestete.php">Unete stete</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="prijava.php">Prijava</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registracija.php">Registracija</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "osiguravajuca_kompanija";

            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Neuspela konekcija: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM polisa";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img src="<?php echo $row["slika_polise"]; ?>" class="card-img-top" alt="<?php echo $row["naziv"]; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["naziv"]; ?></h5>
                                <p class="card-text"><?php echo $row["opis_polise"]; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Nema rezultata.";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <div class="container mt-5">
        <p>
            Polise osiguranja su kao čuvari mira u finansijskom svetu. One pružaju sigurnost i zaštitu od neočekivanih događaja, bilo da je reč o šteti na imovini, zdravstvenim problemima ili gubicima na putovanjima. Kao čuvari, polise osiguranja grade mostove između nesigurnosti i stabilnosti, pružajući pojedincima i kompanijama osnovu za napredak i bezbrižnost. One su kao tkanje sigurnosne mreže koja pruža zaštitu kada se suočimo sa životnim izazovima. 

            Osiguravajuće polise su poput personalizovanih štitova, prilagođenih individualnim potrebama i životnim okolnostima svake osobe. Bez obzira da li je reč o automobilskom, zdravstvenom, putnom ili životnom osiguranju, svaka polisa nosi sa sobom obećanje da će biti tu kada je najpotrebnije. One su poput čarobnih štapića koji mogu olakšati teret nepredviđenih troškova i nevolja, pružajući mir uma u turbulentnim vremenima. Stevanović osiguranje će vam pružiti maksimalno osiguranje za sve prilike koje će vas u životu zadesiti.
        </p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
