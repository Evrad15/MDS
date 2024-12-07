<?php include 'header.php'; ?>

<?php
$host = 'localhost';
$db = 'mds';
$user = 'root';
$pass = '';

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifiez si le terme de recherche est défini
    $searchTerm = '';
    $articles = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search = $_POST['search'];

        // Requête de recherche
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE modele LIKE :search OR prix LIKE :search OR description LIKE :search OR marque LIKE :search");
        $searchTerm = "%" . $search . "%";
        $stmt->bindParam(':search', $searchTerm);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
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
<div class="container">
    <h2 class="mt-5">Résultats de la recherche pour "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
    <div class="row">
        <?php if (!empty($articles)) { ?>
            <?php foreach ($articles as $article) { ?>
                <div class="col-md-4">
                    <div class="phone">
                        <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" class="card-img-top" alt="Image de l'article">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($article['modele']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($article['description']); ?></p>
                            <p class="card-text"><strong>Marque : </strong><?php echo htmlspecialchars($article['marque']); ?></p>
                            <p class="card-text"><strong>Prix : </strong><?php echo htmlspecialchars($article['prix']); ?> FCFA</p>
                            <a href="commande.php?titre=<?php echo urlencode($article['modele']); ?>&prix=<?php echo urlencode(number_format($article['prix'], 0, ',', ' ')); ?>&image=<?php echo urlencode($article['image']); ?>&id=<?php echo urlencode($article['id']); ?>" class="btn btn-custom">Acheter</a>
                        </div>
                    </div>
                </div>            
            <?php } ?>
        <?php } else { ?>
            <p>Aucun résultat trouvé pour votre recherche.</p>
        <?php } ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>   
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
