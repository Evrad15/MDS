<?php include 'header.php'; ?>
<?php
$host = 'localhost';
$db = 'compteur_visites';
$user = 'root';
$pass = '';

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lire le compteur actuel
    $stmt = $pdo->query("SELECT compteur FROM visites WHERE id = 1");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentCount = $row['compteur'];

    // Incrémenter le compteur
    $currentCount++;
    $pdo->query("UPDATE visites SET compteur = $currentCount WHERE id = 1");

    // Enregistrer le compteur dans une variable de session
    $_SESSION['counter'] = $currentCount;
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
<br>
<br>
<br>
<br>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Carousel Example</title>
    <style>
        /* Custom styles for this template */
        .carousel-item {
            height: 32rem;
            background-color: #777;
            color: white;
            position: relative;
            overflow: hidden;
        }
        .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .carousel-caption {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            text-align: left;
        }

        body {
            background-color: wheat;
            font-family: 'Arial', sans-serif;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #777;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 50px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

    </style>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/Fond d'écran pour MacBook _ fond d'écran de bureau _ Fond d'écran minimaliste esthétique.jpeg" alt="Image 1">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Example headline.</h1>
                        <p class="opacity-75">Some representative placeholder content for the first slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/IMG-20241127-WA0008.jpg" alt="Image 2">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>BIENVENUE SUR LE SITE DU MARIO DIGITAL STORE</h1>
                        <p>Votre repère en matière d'electronique </p>
                        <p><a class="btn btn-lg btn-primary" href="A propos de nous.php">En savoir plus</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/az.jpeg" alt="Image 3">
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Jouer est un art !</h1>
                        <p>Découvrez le monde du game au MARIO DIGITAL STORE</p>
                        <p><a class="btn btn-lg btn-primary" href="Consoles"></a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </header>
<!-- ************************************SMARTPHONE********************************************** -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4 position-relative"> 
            <h1 class="text-center flex-grow-1">SMARTPHONES <i class="bi bi-phone-fill"></i></h1> 
            <a href="smartphone.php" class="position-absolute end-0 text-decoration-none">Afficher plus >>></a> 
        </div>
        <div class="card-container">
            <div class="card">
                <img src="images/P3yl6Ga.jpeg" alt="Téléphone 1">
                <div class="card-body">
                    <h5 class="card-title">APPLE <i class="bi bi-apple"></i></h5>
                    <p class="card-text">Description du téléphone 1. Élégant et performant.</p>
                    <a href="apple.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Samsung logo.jpeg" alt="Téléphone 2">
                <div class="card-body">
                    <h5 class="card-title">SAMSUNG <i class="fab fa-samsung icon-samsung"></i></h5>
                    <p class="card-text">Description du téléphone 2. Innovant et stylé.</p>
                    <a href="samsung.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Xiaomi Logo.jpeg" alt="Téléphone 3">
                <div class="card-body">
                    <h5 class="card-title">XIAOMI </h5>
                    <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                    <a href="xiaomi.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <!-- Ajoutez plus de cartes ici -->
        </div>
    </div>
    <!-- *********************************CONSOLES*************************** -->
    <div class="container" id="consoles">
        <div class="d-flex justify-content-between align-items-center my-4 position-relative"> 
            <h1 class="text-center flex-grow-1">CONSOLES <i class="bi bi-controller"></i></h1> 
        </div>
        <div class="card-container">
            <div class="card">
                <img src="images/PlayStation App.jpeg" alt="Téléphone 1">
                <div class="card-body">
                    <h5 class="card-title">PLAYSTATION <i class="bi bi-playstation"></i></h5>
                    <p class="card-text">Description du téléphone 1. Élégant et performant.</p>
                    <a href="playstation.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Xbox (logo).jpeg" alt="Téléphone 2">
                <div class="card-body">
                    <h5 class="card-title">XBOX <i class="bi bi-xbox"></i></h5>
                    <p class="card-text">Description du téléphone 2. Innovant et stylé.</p>
                    <a href="xbox.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Nintendo 公式チャンネル.jpeg" alt="Téléphone 3">
                <div class="card-body">
                    <h5 class="card-title">NINTENDO <i class="bi bi-nintendo-switch"></i></h5>
                    <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                    <a href="nintendo.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <!-- Ajoutez plus de cartes ici -->
        </div>
    </div>
    <!-- ******************************************JEUX VIDEOS****************************** -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4 position-relative"> 
            <h1 class="text-center flex-grow-1">JEUX VIDEOS </h1> 
            <a href="link-to-more-accessories" class="position-absolute end-0 text-decoration-none">Afficher plus >>></a> 
        </div>
        <div class="card-container">
            <div class="card">
                <img src="images/ps5.jpeg" alt="Téléphone 1">
                <div class="card-body">
                    <h5 class="card-title">JEUX PLAYSTATION </h5>
                    <p class="card-text">Description du téléphone 1. Élégant et performant.</p>
                    <a href="jeups.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Xbox One!.jpeg" alt="Téléphone 2">
                <div class="card-body">
                    <h5 class="card-title">JEUX XBOX</h5>
                    <p class="card-text">Description du téléphone 2. Innovant et stylé.</p>
                    <a href="jeuxbox.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Nintendo confirma que Super Smash Bros_ Ultimate funciona a 720p en portátil, 1080p en dock y 60 FPS en ambos modos - Nintenderos.jpeg" alt="Téléphone 3">
                <div class="card-body">
                    <h5 class="card-title">JEUX NINTENDO</h5>
                    <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                    <a href="jeunintendo.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <!-- Ajoutez plus de cartes ici -->
        </div>
    </div>
    <!-- ***********************************ELECTRONIQUE******************************* -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4 position-relative"> 
            <h1 class="text-center flex-grow-1">ELECTRONIQUE <i class="bi bi-lightning-fill"></i></h1> 
            <a href="link-to-more-accessories" class="position-absolute end-0 text-decoration-none">Afficher plus >>></a> 
        </div>
        <div class="card-container">
            <div class="card">
                <img src="images/windows logo.jpeg" alt="Téléphone 1">
                <div class="card-body">
                    <h5 class="card-title">ORDINATEUR <i class="bi bi-pc-display-horizontal"></i></h5>
                    <p class="card-text">Description du téléphone 1. Élégant et performant.</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Hisense 75_ Class U8 Series 4K ULED in Black - Smart Google TV _ Nebraska Furniture Mart.jpeg" alt="Téléphone 2">
                <div class="card-body">
                    <h5 class="card-title">TELEVISEUR <i class="bi bi-tv-fill"></i></h5>
                    <p class="card-text">Description du téléphone 2. Innovant et stylé.</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/300x200" alt="Téléphone 3">
                <div class="card-body">
                    <h5 class="card-title">TECNO</h5>
                    <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <!-- Ajoutez plus de cartes ici -->
        </div>
    </div>
    <!-- ******************************************ACCESSOIRES********************************* -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4 position-relative"> 
            <h1 class="text-center flex-grow-1">ACCESSOIRES <i class="bi bi-lightning-fill"></i></h1> 
            <a href="link-to-more-accessories" class="position-absolute end-0 text-decoration-none">Afficher plus >>></a> 
        </div>
        <div class="card-container">
            <div class="card">
                <img src="images/Batterie de Téléphone Maroc _ Achat Batterie de Téléphone à prix pas cher _ Jumia.jpg" alt="Téléphone 1">
                <div class="card-body">
                    <h5 class="card-title">POWER BANK</h5>
                    <p class="card-text">Description du téléphone 1. Élégant et performant.</p>
                    <a href="power bank.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Kingston USB Flash Drives Pen Drive DTXON Pendrive 32GB 64GB 128GB 256GB CLE USB 3_2 Flash Disk Mini.jpeg" alt="Téléphone 2">
                <div class="card-body">
                    <h5 class="card-title">CLE USB <i class="bi bi-usb-symbol"></i></h5>
                    <p class="card-text">Description du téléphone 2. Innovant et stylé.</p>
                    <a href="cle usb.php" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="card">
                <img src="images/Apple AirPods Pro (2nd Generation).jpeg" alt="Téléphone 3">
                <div class="card-body">
                    <h5 class="card-title">AIRPODS</h5>
                    <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                    <a href="#" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
        <!-- Ajoutez plus de cartes ici -->
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <?php include 'footer.php'; ?>
</body>
</html>
