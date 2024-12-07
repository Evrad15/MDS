<?php
$host = 'localhost';
$db = 'mds';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $modele = $_POST['modele'];
        $marque = $_POST['marque'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];

        // Si une nouvelle image est téléchargée
        if (!empty($_FILES['image']['name'])) {
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

            // Vérifiez si le fichier existe déjà
            if (file_exists($target_file)) {
                echo "Désolé, le fichier existe déjà.";
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
                    // Requête de mise à jour avec une nouvelle image
                    $sql = "UPDATE articles SET modele = :modele, marque = :marque, description = :description, prix = :prix, image = :image WHERE id = :id";
                    $stmt = $pdo->prepare($sql);

                    // Lier les paramètres
                    $stmt->bindParam(':modele', $modele);
                    $stmt->bindParam(':marque', $marque);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':prix', $prix);
                    $stmt->bindParam(':image', $image);
                    $stmt->bindParam(':id', $id);

                    $stmt->execute();
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
            }
        } else {
            // Requête de mise à jour sans changer l'image
            $sql = "UPDATE articles SET modele = :modele, marque = :marque, description = :description, prix = :prix WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            // Lier les paramètres
            $stmt->bindParam(':modele', $modele);
            $stmt->bindParam(':marque', $marque);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
        }

        header('Location: articles.php');
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
