<?php include 'header.php'; ?>
<br>
<br>
<br>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .hero-section {
            background-color: #007bff;
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        .hero-content h1 {
            margin: 0;
            font-size: 3rem;
        }

        .hero-content p {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .about, .products, .contact {
            margin-bottom: 40px;
        }

        h2 {
            font-size: 2rem;
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-item {
            flex: 1 1 calc(33% - 20px);
            background-color: #f4f4f9;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-item i {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 10px;
        }

        .product-item h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #007bff;
        }

        .contact a {
            color: #007bff;
            text-decoration: none;
        }

        .contact a:hover {
            text-decoration: underline;
        }

        .whatsapp-link {
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }

        .whatsapp-link i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="hero-section">
        <div class="hero-content">
            <h1>Bienvenue chez Mario Digital Store (M.D.S.)</h1>
            <p>Votre plateforme de vente en ligne multi-services !</p>
        </div>
    </div>
    <div class="container">
        <section class="about">
            <h2>À propos de nous</h2>
            <p>Chez M.D.S., nous sommes spécialisés dans la vente d'appareils électroniques, d'accessoires de décoration et de produits technologiques de pointe. Découvrez notre vaste gamme de produits et trouvez exactement ce que vous cherchez !</p>
        </section>
        <section class="products">
            <h2>Nos Produits</h2>
            <div class="product-list">
                <div class="product-item">
                    <i class="fas fa-tv"></i>
                    <h3>Électronique</h3>
                    <p>Des télévisions, enceintes, climatiseurs et machines à laver de haute qualité.</p>
                </div>
                <div class="product-item">
                    <i class="fas fa-couch"></i>
                    <h3>Décoration</h3>
                    <p>Accessoires de décoration tendance pour sublimer votre intérieur.</p>
                </div>
                <div class="product-item">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>Smartphones</h3>
                    <p>Les meilleurs smartphones de marques renommées comme Google, iPhone, Samsung, Huawei.</p>
                </div>
                <div class="product-item">
                    <i class="fas fa-headphones-alt"></i>
                    <h3>Accessoires</h3>
                    <p>Coques, écouteurs, power banks, chargeurs et plus encore.</p>
                </div>
                <div class="product-item">
                    <i class="fas fa-laptop"></i>
                    <h3>Informatique</h3>
                    <p>Modems, disques durs, clés USB, imprimantes de haute performance.</p>
                </div>
                <div class="product-item">
                    <i class="fas fa-gamepad"></i>
                    <h3>Jeux</h3>
                    <p>Jeux éducatifs et ludiques pour toute la famille, tels que Scrabble et Monopoly.</p>
                </div>
            </div>
        </section>
        <section class="contact">
            <h2>Contactez-nous</h2>
            <p>Chez M.D.S., le client est au cœur de nos préoccupations. Nous mettons tout en œuvre pour mériter votre confiance et vous offrir la meilleure expérience d'achat possible.</p>
            <p>Contactez-nous sur WhatsApp : 
                <a href="https://wa.me/237696262000" class="whatsapp-link" id="contact">
                    <i class="fab fa-whatsapp"></i> +237696262000
                </a>
            </p>
            <p>Rejoignez notre groupe WhatsApp : 
                <a href="https://chat.whatsapp.com/EEfbd1rGTlZ5uwirsqjV8X" class="whatsapp-link"> 
                    <i class="fab fa-whatsapp"></i> Groupe WhatsApp 
                </a> 
            </p>
        </section>
    </div>
</body>
</html>
