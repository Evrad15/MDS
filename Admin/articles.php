<?php
$host = 'localhost';
$db = 'mds';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si les données sont envoyées via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $modele = $_POST['modele'];
        $marque = $_POST['marque'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifiez si le fichier est une image réelle ou une fausse image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "Le fichier n'est pas une image.";
            $uploadOk = 0;
        }


        // Vérifiez la taille du fichier
        if ($_FILES['image']['size'] > 500000) {
            echo "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        }

        // Autoriser certains formats de fichiers
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            $uploadOk = 0;
        }

        // Vérifiez si $uploadOk est défini sur 0 par une erreur
        if ($uploadOk == 0) {
            echo "Désolé, votre fichier n'a pas été téléchargé.";
        } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                // Requête d'insertion
                $sql = "INSERT INTO articles (modele, marque, description, prix, image) VALUES (:modele, :marque, :description, :prix, :image)";
                $stmt = $pdo->prepare($sql);

                // Lier les paramètres
                $stmt->bindParam(':modele', $modele);
                $stmt->bindParam(':marque', $marque);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':prix', $prix);
                $stmt->bindParam(':image', $image);

                $stmt->execute();
                
                
                // Rediriger pour afficher l'article nouvellement créé
                header("Location: articles.php");
                exit();
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
        }
    }

    // Récupérer tous les articles ou l'article récemment ajouté
    $articles = [];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $stmt = $pdo->prepare("SELECT * FROM articles");
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
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

    </style>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <h2 class="mt-5">Articles</h2>
    <div class="row">
        <?php foreach ($articles as $article) { ?>
            <div class="col-md-4">
                <div class="phone">
                    <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" class="card-img-top" alt="Image de l'article">
                    <div class="card-body">
                        <h5 class="card-title"><b><u><?php echo htmlspecialchars($article['modele']); ?></u></b></h5>
                        <p class="card-text"><?php echo htmlspecialchars($article['description']); ?></p>
                        <p class="card-text"><strong>Marque : </strong><?php echo htmlspecialchars($article['marque']); ?></p>
                        <p class="card-text"><strong>Prix : </strong><?php echo htmlspecialchars($article['prix']); ?> FCFA</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo $article['id']; ?>">
                            Modifier
                        </button>
                    </div>
                </div>
            </div>
            <!-- Modal -->
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
    </div>
</div>
<br>
<br>
<br>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>   
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
