<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'Utilisateur</title>
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
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo ATMO -->
            <a class="navbar-brand" href="page_d'accueil.php">
                <img src="Logo.png" alt="Logo ATMO">
                Votre observatoire de la qualité de l'air à Bordeaux
            </a>  
            <div class="ms-auto d-flex">
                
                <a class="btn btn-light" href="#">Se déconnecter</a>
            </div>

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


    <div class="container">
    <h2>Profil de l'Utilisateur</h2>
    <form method="post" action="compte_particulier.html">          
            <ul>
                <li>
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $nom_actuel; ?>" required>
                </li>
                <li>
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $prenom_actuel; ?>" required>
                </li>
                <li>
                    <label for="email">Adresse e-mail :</label>
                    <input type="email" id="email" name="email" value="<?php echo $email_actuel; ?>" required>
                </li>
                <li>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" value="<?php echo $mdp_actuel; ?>" required>
                </li>
                <li>
                    <label for="mobile">Numéro de mobile :</label>
                    <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile_actuel; ?>" required>
                </li>
            </ul>       
        <h3>Préférences</h3>
        <ul>
                <label for="communes">Communes suivies :</label>
                <input type="text" id="com1" name="com1" value="<?php echo $com1_actuel; ?>" required>
        </ul>
        <ul>
        <label>Notifications :</label>
        <input type="checkbox" id="sms" name="sms" <?php echo ($notification_sms) ? 'checked' : ''; ?>>
        <label for="sms">SMS</label>
        <input type="checkbox" id="email" name="email" <?php echo ($notification_email) ? 'checked' : ''; ?>>
        <label for="email">E-mail</label>
        </ul>
        <button type="submit">Enregistrer les Modifications</button>
    </form>
</div>

</body>
</html>
