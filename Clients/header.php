<?php
session_start(); // Assurez-vous que les sessions sont démarrées
// Vérifiez l'état de connexion de l'utilisateur
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;

?>


<!doctype html>
<html lang="fr" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>MARIO DIGITAL STORE</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="images/IMG-20241127-WA0007-removebg-preview.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .navbar { 
            height: 100px; /* Ajustez cette valeur pour définir la hauteur souhaitée */ 
        }

        .navbar-brand img {
            height: 250px;
            width: 250px; 
            margin: -100px -50px -90px -30px ; /* Ajustez cette valeur en fonction de la taille désirée */
        }

        .user-icon { 
            margin: 50px;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
</head>
<body>
<header class="p-3 text-bg-dark fixed-top">
    <div class="d-flex flex-wrap align-items-center justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center text-white text-decoration-none">
            <img src="images/IMG-20241127-WA0007-removebg-preview.png" alt="Logo">
            <svg class="bi me-2 ms-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="acceuill.php" class="nav-link px-2 text-blue"><i class="bi bi-house-fill"></i></a></li>
            <li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle px-2 text-white" id="articlesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Articles</a> 
                <ul class="dropdown-menu" aria-labelledby="articlesDropdown"> 
                    <li><a class="dropdown-item" href="smartphone.php">Smartphone <i class="bi bi-apple"></i></a></li> 
                    <li><a class="dropdown-item" href="accessoires.php">Accessoires <i class="bi bi-tools"></i></a></li> 
                    <li><a class="dropdown-item" href="#consoles">Consoles <i class="bi bi-playstation"></i></a></li> 
                    <li><a class="dropdown-item" href="jeux vidéos.php">Jeux vidéos <i class="bi bi-unity"></i></a></li> 
                    <li><a class="dropdown-item" href="electronique.php">Electronique <i class="bi bi-pc-display"></i></a></li>  
                </ul> 
            </li> 
            <li><a href="A propos de nous.php#contact" class="nav-link px-2 text-white">Nous contactez <i class="bi bi-telephone-fill"></i></a></li>  
            <li><a href="A propos de nous.php" class="nav-link px-2 text-white">A propos de nous</a></li>  
            <br>
            <br>
            
        </ul>

        <form role="search" action="recherche.php" method="POST">
          <input class="form-control" type="search" name="search" id="search" placeholder="Recherche....." aria-label="Search" required>
        </form>
    </div>
</header>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
