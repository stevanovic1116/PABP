<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stevanović osiguranje</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, h1, .navbar-nav .nav-link, .navbar-brand {
            font-family: 'Times New Roman', Times, serif;
            font-size: 1.2em;
        }
        body {
            background-color: #e6ffe6;
            position: relative;
            min-height: 100vh;
        }
        .navbar-brand img {
            max-height: 50px;
            margin-right: 10px;
        }
        .carousel-item img {
            width: 100%;
            height: 700px;
            object-fit: cover;
        }
        .bottom-left-image {
            position: absolute;
            bottom: 10px;
            left: 10px;
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            Stevanović osiguranje
        </a>
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
                    <a class="nav-link" href="polise.php">Polise</a>
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
        <h1 class="text-center">Dobrodošli u Stevanović osiguranje</h1>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/osiguranje.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/insurance1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/insurance2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="bottom-left-image">
        <img src="img\kartice.png" alt="Opis slike">
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>