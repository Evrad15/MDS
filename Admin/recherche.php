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
                            <p class="card-texT"><?php echo htmlspecialchars($article['description']); ?></p>
                            <p class="card-text"><strong>Marque : </strong><?php echo htmlspecialchars($article['marque']); ?></p>
                            <p class="card-text"><strong>Prix : </strong><?php echo htmlspecialchars($article['prix']); ?> FCFA</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $article['id']; ?>">
                                Modifier
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editModal-<?php echo $article['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel-<?php echo $article['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel-<?php echo $article['id']; ?>">Modifier l'article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="update_articles.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($article['id']); ?>">
                                <div class="form-group mb-3">
                                    <label for="modele-<?php echo $article['id']; ?>">Modèle :</label>
                                    <input type="text" id="modele-<?php echo $article['id']; ?>" name="modele" class="form-control" value="<?php echo htmlspecialchars($article['modele']); ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="marque-<?php echo $article['id']; ?>">Marque :</label>
                                    <input type="text" id="marque-<?php echo $article['id']; ?>" name="marque" class="form-control" value="<?php echo htmlspecialchars($article['marque']); ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description-<?php echo $article['id']; ?>">Description :</label>
                                    <input type="text" id="description-<?php echo $article['id']; ?>" name="description" class="form-control" value="<?php echo htmlspecialchars($article['description']); ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="prix-<?php echo $article['id']; ?>">Prix :</label>
                                    <input type="text" id="prix-<?php echo $article['id']; ?>" name="prix" class="form-control" value="<?php echo htmlspecialchars($article['prix']) ; ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image-<?php echo $article['id']; ?>">Image :</label>
                                    <input type="file" id="image-<?php echo $article['id']; ?>" name="image" class="form-control" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                            </form>
                        </div>
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
