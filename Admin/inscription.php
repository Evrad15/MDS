<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mot_de_passe = $_POST['mot_de_passe'];

    // Connexion à la base de données
    $host = 'localhost';
    $dbname = 'mds';
    $db_username = 'root';
    $db_password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertion des informations d'inscription
        $stmt = $conn->prepare("INSERT INTO inscription (mot_de_passe) VALUES (:mot_de_passe)");
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->execute();
        echo "<script type='text/javascript'> alert('Inscription Réussie !!!');</script>";
        // Redirection vers une autre page HTML en cas de succès
        header("Location: connexion.php");
        exit();
    } catch (PDOException $e) {
        echo "<script type='text/javascript'> alert('Erreur d'inscription !!!');</script>". $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
    <link rel="shortcut icon" href="IMG-20241127-WA0007.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
</head>
<body> 
    <div id="ins">
        <form method="post" action="inscription.php">
            <h1>INSCRIPTION <i class="bi bi-person-plus-fill"></i></h1>
            <label for="mot_de_passe"><b>Mot de passe</b></label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required placeholder="Entrer un mot de passe" autocomplete="off">
            <br>
            <br>
            <button type="menu" id="btn"><b>Créer mon compte</b></button>
            <!-- <p><b>Déjà inscrit , connectez-vous</b> <a href="../CONNEXION/connexion.php">ICI</a> !!</p> -->
        </form>
    </div>
    <style>
        body{
            background: url(IMG-20241127-WA0007.jpg)no-repeat fixed;
            background-size: contain;
            height: 100px;
        }
        h1{
            text-align: center;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            margin-bottom: 20px;
        }
        form{
            text-align: center;
            margin: 100px 0px 0px 400px;
            border-radius: 5%;
            box-shadow:9px 2px 20px 3px rgb(32, 78, 118);
            width: 500px;
            padding-bottom: 10px;
            background-color: transparent;
            backdrop-filter: blur(50px);
        }
        /* #nom{
            margin-bottom: 20px;
            margin-top: 20px;
        } */
        #mot_de_passe{
            margin-bottom: 20px;
            padding-right: 20px;
            transform: translateX(-10%);
        }
        label{
            font-family:'Times New Roman', Times, serif;
            transform: translateX(-50%);
        }
        #btn{
            height: 50px;
            border-radius: 50px;
            width: 250px;
        }
        form input{
            height: 50px;
            border-radius: 50px;
            width: 250px;
            padding-left: 20px;
        }
        p a{
            text-decoration: none;
        }
        input:hover, #btn:hover{
            transition: 0.3s;
            opacity: 0.6;
        }
    </style>  
</body>
</html>