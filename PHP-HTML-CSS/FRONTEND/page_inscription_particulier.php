<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

      <link rel="stylesheet" href="styles.css"> 

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('image2.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        form {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 600px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input, select {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        fieldset {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 16px;
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
        }

        .btn-check {
            display: none;
        }

        .btn {
            margin: 5px;
            text-align: left;
        }

        .btn-outline-primary {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-check:checked + .btn-outline-primary {
            background-color: #0056b3;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
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
              <!-- Boutons fixes à droite -->
             

  <div class="ms-auto d-flex">
    <a class="btn btn-light" href="page_connexion_gestionnaire.php">Vous êtes gestionnaire ?</a>
    <a class="btn btn-success" href="page_connexion_particulier.php">Se connecter / Gérer mes alertes</a>
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
    

    <form action="formul.php" method="post">
        
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>


        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <label for="mobile">Numéro de mobile :</label>
        <input type="tel" id="mobile" name="mobile" required>

 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <!-- Formulaire de sélection de commune et de stations -->
 <div class="container">
 <div class="row">
 <div class="col">
 <label for="commune">Sélectionnez une commune pour suivre la qualité de l'air:</label>
 <select name="commune" id="commune" class="form-select" required>

 <?php

 $communes_json = file_get_contents('http://localhost:8082/api/communes');
 $communes_data = json_decode($communes_json, true);

 // Vérifier si la récupération des communes a réussi
 if ($communes_data !== null && is_array($communes_data)) {
 // Afficher les options pour chaque commune
 foreach ($communes_data as $commune) {
 echo "<option value='" . $commune['nomCommune'] . "'>" . $commune['nomCommune'] . "</option>";
 }
 } else {
 echo "<option value=''> Erreur lors de la récupération des communes </option>"; }
 ?>            
              
              </select>
              </form>

        <label for="notification">Notification :</label><br/>
        
            <input type="checkbox" id="sms" name="sms"> <label for="sms">SMS</label><br />
            <input type="checkbox" id="mail" name="mail"> <label for="mail">E-mail</label>
      

        <label for="indice">Recevoir un e-mail quotidien leur indiquant l’indice de qualité de l’air :</label>
        <input type="checkbox" id="indice" name="indice"> <label for="indice"></label><br />

        <label for="pollinique">Indice pollinique :</label>
        <select id="pollinique" name="pollinique">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>

        <button type="submit">S'inscrire</button>
    </form>

</body>
</html>
