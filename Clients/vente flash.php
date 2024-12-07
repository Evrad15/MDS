<?php include 'header.php'; 
    $host = 'localhost';
    $db = 'mds';
    $user = 'root';
    $pass = '';
    // Connexion à la base de données
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les téléphones Xiaomi depuis la base de données
        $stmt = $pdo->query("SELECT * FROM articles WHERE marque = 'xiaomi'");
        $xiaomi = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
        }

        .phone {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
            padding: 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .phone:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 20px rgba(0, 0, 0, 0.2);
        }

        .phone img {
            width: 150px;
            height: auto;
            border-radius: 15px;
            margin-right: 20px;
        }

        .phone-details {
            flex: 1;
        }

        .phone-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .phone-description {
            font-size: 1rem;
            color: #777;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            border: none;
            padding: 10px 30px;
            border-radius: 50px;
            transition: background-color 0.3s;
            color: white;
            text-transform: uppercase;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* Styles pour le compte à rebours */
        .countdown {
            text-align: center;
            font-size: 2rem;
            margin-top: 20px;
        }

    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="row">
            <?php foreach ($xiaomi as $telephone): ?>
            <div class="col-md-4">
                <div class="phone" id="phone-<?php echo $telephone['id']; ?>">
                    <img src="uploads/<?php echo htmlspecialchars($telephone['image']); ?>" alt="<?php echo htmlspecialchars($telephone['modele']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($telephone['modele']); ?></h5>
                        <p class="card-text"><b><u>ESPACE:</u></b> <?php echo htmlspecialchars($telephone['description']); ?></p>
                        <p class="card-text"><b><u>PRIX:</u></b> <?php echo htmlspecialchars(number_format($telephone['prix'], 0, ',', ' ')); ?> FCFA</p>
                        <a href="commande.php?titre=<?php echo urlencode($telephone['modele']); ?>&prix=<?php echo urlencode(number_format($telephone['prix'], 0, ',', ' ')); ?>&image=<?php echo urlencode($telephone['image']); ?>&id=<?php echo urlencode($telephone['id']); ?>" class="btn btn-custom">Acheter</a>
                        <!-- Compte à rebours pour chaque produit -->
                        <div class="countdown" id="countdown-<?php echo $telephone['id']; ?>">
                            Compte à rebours : <span id="timer-<?php echo $telephone['id']; ?>"></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <?php include 'footer.php'; ?>

    <!-- JavaScript pour les comptes à rebours -->
    <script>
        // Date de fin du compte à rebours pour chaque produit (à personnaliser pour chaque produit)
        var countdownDates = {
            <?php foreach ($xiaomi as $telephone): ?>
            "timer-<?php echo $telephone['id']; ?>": new Date("Dec 31, 2024 23:59:59").getTime(),
            <?php endforeach; ?>
        };

        // Mettre à jour les comptes à rebours toutes les secondes
        var countdownFunction = setInterval(function() {
            // Obtenir la date et l'heure actuelles
            var now = new Date().getTime();

            // Parcourir tous les comptes à rebours
            for (var id in countdownDates) {
                var countdownDate = countdownDates[id];
                var distance = countdownDate - now;

                // Calculer le temps restant en jours, heures, minutes et secondes
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Afficher le résultat dans l'élément avec l'ID correspondant
                document.getElementById(id).innerHTML = days + "j " + hours + "h " + minutes + "m " + seconds + "s ";

                // Si le compte à rebours est terminé, masquer le produit
                if (distance < 0) {
                    clearInterval(countdownFunction);
                    document.getElementById(id).innerHTML = "EXPIRED";
                    document.getElementById("phone-" + id.split("-")[1]).style.display = "none";
                }
            }
        }, 1000);
    </script>
</body>
</html>
