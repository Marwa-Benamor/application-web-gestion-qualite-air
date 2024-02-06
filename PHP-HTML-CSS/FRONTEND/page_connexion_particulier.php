<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Observatoire de la Qualité de l'Air</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            background-image: url('image2.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            color: #f8f4f4;
            margin: 20px;
        }
        
    </style>

</head>

    <!-- Barre de Navigation avec Bootstrap -->
    <nav class="navbar navbar-dark bg-dark">
        <div class= 'container-fluid'>
            <!-- Logo ATMO -->
            <a class="navbar-brand" href="page_d'accueil.php">
                <img src="Logo.png" alt="Logo ATMO">
                Votre observatoire de la qualité de l'air à Bordeaux
            </a> 


            <!-- Bouton de bascule pour les écrans plus petits -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Contenu du menu à gauche -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="https://www.atmo-france.org/article/les-missions-datmo-france">Missions</a>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.atmo-france.org/article/les-valeurs-datmo-france">Valeurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.atmo-france.org/article/le-fonctionnement-datmo-france">Fonctionnement</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <main class="main-content">
 <div class="container mt-5">
 <div class="row">
 <div class="col-md-6">
 <div class="card">
 <div class="card-body">
 <h5 class="card-title">J'ai déjà un compte Atmo</h5>
 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $email = $_POST["email"];
 $password = $_POST["password"];

 // Effectuer une requête à votre API pour obtenir le mot de passe
 $api_url = "http://localhost:8082/api/pwd/by-email/" . urlencode($email);
 $response_json = file_get_contents($api_url);

 // Traiter la réponse JSON
 $response_data = json_decode($response_json, true);

 // Vérifier si les données ont été récupérées avec succès et si le mot de passe correspond
 if ($response_data !== null && isset($response_data[0]['pwdParticulier']) && $response_data[0]['pwdParticulier'] === $password) {
 // Authentification réussie, rediriger l'utilisateur
 header("Location: compte_particulier.html");
 exit();
 } else {
 // Authentification échouée
 echo "Identifiants incorrects. Veuillez réessayer.";
 }
}
?>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Adresse email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Se souvenir de mon identifiant</label>
                                </div>
                                <button type="submit" class="btn btn-primary" >Se connecter</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nouveau sur Atmo?</h5>
                            <button class="btn btn-outline-info" ><a href="page_inscription_particulier.php" >S'inscrire</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
