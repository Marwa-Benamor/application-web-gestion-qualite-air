<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion de la Qualité de l'Air</title>
        <!-- Inclure Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <!-- Inclure le fichier CSS personnalisé -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('image2.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 20px;
        }

        h2 {
            color: #f2f2f2;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 600 px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        select, input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #3498db;
            border-radius: 4px;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
     <!-- Barre de Navigation avec Bootstrap -->
     <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo ATMO: image "logo.png" dans le meme dossier-->
            <a class="navbar-brand" href="page_d'accueil.php">
                <img src="Logo.png" alt="Logo ATMO">
                Votre observatoire de la qualité de l'air à Bordeaux
            </a>     <!-- Boutons fixes à droite -->
            <div class="ms-auto d-flex">                
                <a class="btn btn-light" href="page_d'accueil.php">Se déconnecter</a>
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
      <!-- Inclure Bootstrap -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

 

<h2>Modifier les Seuils de Polluants</h2>
<form method="post">
    <label for="polluant">Polluant :</label>
    <select name="polluant">
    <option value="" disabled selected>Choisissez un polluant</option>
    <?php
    $polluants = [
        "Particules fines (PM₁₀ et PM₂.₅)",
        "Oxydes d'azote (NOx)",
        "Dioxyde de soufre (SO₂)",
        "Ozone (O₃)",
        "Monoxyde de carbone (CO)",
        "Composés organiques volatils (COV)",
        "Hydrocarbures aromatiques polycycliques (HAP)",
        "Métaux",
        "Pollens et moisissures"
    ];

    foreach ($polluants as $polluant): ?>
        <option value="<?= $polluant ?>"><?= $polluant ?></option>
    <?php endforeach; ?>
</select>


    <label for="nouveau_seuil">Nouveau Seuil :</label>
    <input type="number" name="nouveau_seuil" required>
    <button type="submit" name="modifier_seuils">Modifier Seuil</button>
</form>

<h2>Ajouter un Décret</h2>
<form method="post">
    <label for="decret">Nom du Décret :</label>
    <input type="text" name="decret" required>
    <label for="date_decret">Date du Décret :</label>
    <input type="date" name="date_decret" required>
    <button type="submit" name="ajouter_decret">Ajouter Décret</button>
</form>

<h2>Implanter une Nouvelle Station</h2>
<form method="post">
    <label for="nom_station">Nom de la Station :</label>
    <input type="text" name="nom_station" required>
    <label for="emplacement">Emplacement :</label>
    <input type="text" name="emplacement" required>
    <button type="submit" name="ajouter_station">Ajouter Station</button>
</form>

</body>
</html>

