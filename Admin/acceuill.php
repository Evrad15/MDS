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

        // Vérification des informations de connexion
        $stmt = $conn->prepare("SELECT * FROM inscription WHERE mot_de_passe = :mot_de_passe");
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->execute();
        // echo "<script type='text/javascript'> alert('Connexion réussie 👌😁!!!');</script>";
        if ($stmt->rowCount() > 0) {
            // Redirection vers une autre page HTML en cas de succès
            header("Location: articles.php");
            exit();
        } else {
            echo "<script type='text/javascript'> alert('Données Incorrectes❌!!!');</script>";
        }
    } catch (PDOException $e) {
            echo "<script type='text/javascript'> alert('Erreurs de connection ❌!!!');</script>". $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNEXION</title>
    <link rel="stylesheet" href="connexion.css">
    <link rel="shortcut icon" href="images/IMG-20241127-WA0007-removebg-preview.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<h2>PAGE ADMINISTRATEUR</h2>
<body>
    <div id="ins"></div>
        <form method="post" action="acceuill.php">
            <h1>LOGIN <i class="bi bi-person-fill"></i></h1>
            <label for="mot_de_passe"><b>Mot de passe</b></label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required placeholder="Entrer le mot de passe" autocomplete="off">
            <br>
            <br>
            <button type="submit" id="btn"><b>Se connecter</b></button>
            <!-- <p><b>Pas inscrit , Inscrivez-vous </b><a href="../INSCRIPTION/inscription.php">ICI</a> !!</p> -->
        </form>
    </div>
    <style>
        body{
            background: url('images/cv.jpeg')  no-repeat fixed;
            background-size: cover;
            height: 100px;
        }
        h1{
            text-align: center;
            font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            margin-bottom: 20px;
        }
        h2{
            text-align: center;
            margin-top: 50px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        form{
            text-align: center;
            margin: 40px 0px 0px 400px;
            border-radius: 5%;
            box-shadow:9px 2px 20px 3px rgb(32, 78, 118);
            width: 500px;
            padding-bottom: 10px;
            background-color: transparent;
            backdrop-filter: blur(50px);
        }
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