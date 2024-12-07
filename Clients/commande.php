<?php include 'header.php';
// Récupérer les paramètres de l'URL
$article_id = $_GET['id'] ?? '';  // Assurez-vous que l'ID de l'article est passé
$titre = $_GET['titre'] ?? '';
$prix = $_GET['prix'] ?? '';
$image = $_GET['image'] ?? '';

?>
<br>
<br>
<br>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Détails de la Commande</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Détails de la Commande</h1>
        <div class="card" style="width: 18rem;">
            <img src="uploads/<?php echo htmlspecialchars($image); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($titre); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($titre); ?></h5>
                <p class="card-text"><strong>Prix :</strong> <?php echo htmlspecialchars($prix); ?> FCFA</p>
                <form action="javascript:void(0);" method="post" onsubmit="redirectToWhatsApp();">
                    <input type="hidden" name="article_id" value="<?php echo htmlspecialchars($article_id); ?>">
                    <input type="hidden" name="titre" value="<?php echo htmlspecialchars($titre); ?>">
                    <input type="hidden" name="prix" value="<?php echo htmlspecialchars($prix); ?>">
                    <input type="hidden" name="image" value="<?php echo htmlspecialchars($image); ?>">
                    <button type="submit" name="ajouter_au_panier" class="btn btn-primary">Passer la commande</button>
                </form>

                <script>
                    function redirectToWhatsApp() {
                        var article_id = "<?php echo htmlspecialchars($article_id); ?>";
                        var titre = "<?php echo htmlspecialchars($titre); ?>";
                        var prix = "<?php echo htmlspecialchars($prix); ?>";
                        var image = "<?php echo htmlspecialchars($image); ?>";

                        var message = "Détails de la commande:\n";
                        message += "ID de l'article: " + article_id + "\n";
                        message += "Titre: " + titre + "\n";
                        message += "Prix: " + prix + "\n";
                        message += "Image: " + image + "\n";

                        var phoneNumber = "+237696262000";
                        var whatsappURL = "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(message);

                        window.location.href = whatsappURL;
                    }
                </script>

            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <?php include 'footer.php'; ?>
</body>

</html>