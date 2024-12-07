<?php include 'header.php'; 
    $host = 'localhost';
    $db = 'mds';
    $user = 'root';
    $pass = '';
    // Connexion à la base de données
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les téléphones Samsung depuis la base de données
        $stmt = $pdo->query("SELECT * FROM articles WHERE marque = 'playstation'");
        $samsung = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
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

    </style>
</head>
<body>
<h5></h5>
<div class="container">
    <div class="row">
    <?php foreach ($samsung as $telephone): ?>
    <div class="col-md-4">
    <div class="phone">
        <img src="uploads/<?php echo htmlspecialchars($telephone['image']); ?>" alt="<?php echo htmlspecialchars($telephone['modele']); ?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($telephone['modele']); ?></h5>
            <p class="card-text"><b><u>ESPACE:</u></b> <?php echo htmlspecialchars($telephone['description']); ?></p>
            <p class="card-text"><b><u>PRIX:</u></b> <?php echo htmlspecialchars(number_format($telephone['prix'], 0, ',', ' ')); ?> FCFA</p>
            <a href="commande.php?titre=<?php echo urlencode($telephone['modele']); ?>&prix=<?php echo urlencode(number_format($telephone['prix'], 0, ',', ' ')); ?>&image=<?php echo urlencode($telephone['image']); ?>  &id=<?php echo urlencode($telephone['id']); ?>" class="btn btn-custom">Acheter</a>
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
</body>
</html>
