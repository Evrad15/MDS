<?php include 'header.php'; ?>
<br>
<br>
<br>
<!doctype html>
<html lang="fr" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/product/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .background-image {
            background-image: url('images/GAMING PC WALLPAPER.jpeg'); /* Remplacez cette URL par le chemin de votre image */
            background-size: cover;
            background-position: center;
            height: 50vh; /* Ajustez la hauteur selon vos besoins */
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
</head>
<body>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary background-image">
    <div class="col-md-6 p-lg-5 mx-auto my-5">
        <h1 class="display-6 fw-bold text-white">Quel smartphone vous ferait plaisir ?</h1>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div class="container">
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
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        <div class="card">
                <img src="images/one plus.jpg" alt="Téléphone 3">
            <div class="card-body">
                <h5 class="card-title">ONE + </h5>
                <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        <div class="card">
                <img src="images/huawei.jpeg" alt="Téléphone 3">
            <div class="card-body">
                <h5 class="card-title">HUAWEI </h5>
                <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        <div class="card">
                <img src="images/oppo.jpg" alt="Téléphone 3">
            <div class="card-body">
                <h5 class="card-title">OPPO </h5>
                <p class="card-text">Description du téléphone 3. Puissant et polyvalent.</p>
                <a href="#" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        <div class="card">
                <img src="images/Google Pixel vector logo (_SVG + .jpg" alt="Téléphone 3">
            <div class="card-body">
                <h5 class="card-title">PIXEL </h5>
                <a href="pixels.php" class="btn btn-primary">Voir plus</a>
            </div>
        </div>
        <!-- Ajoutez plus de cartes ici -->
    </div>
    </div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
