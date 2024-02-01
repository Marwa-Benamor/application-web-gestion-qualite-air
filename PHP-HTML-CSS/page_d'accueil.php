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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
           
        }

        .titre {
            color: #FFFFFF;
        }
        .main-content {
            margin-top: 500px; 
            margin-left: 15px;

       
         }

         .polluants-results {
         text-align: left;
            color: white;
            margin-top: 500px; 
            margin-left: 75px;
            }



    </style>
</head>
<body>
 
<nav class="navbar navbar-dark bg-dark navbar-custom">
        <div class= 'container-fluid'>
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
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.atmo-france.org/article/france">Réglementation</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content">
            <h5 class="titre">Sélectionner</h5>
            <form action="page_d'accueil.php" method="post">

                <div class="mb-3">
                    <select class="form-select" id="departement" name="departement" onchange="this.form.submit()">
                        <?php
                        $departements_json = file_get_contents('http://localhost:8082/api/departements');
                        $departements_data = json_decode($departements_json, true);

                        // Vérifier si la récupération des départements a réussi
                        if ($departements_data !== null && is_array($departements_data)) {
                            // Afficher les options pour chaque département
                            foreach ($departements_data as $departement) {
                                $selected = isset($_POST['departement']) && $_POST['departement'] == $departement['nomDepartement'] ? 'selected' : '';
                                echo "<option value='" . $departement['nomDepartement'] . "' $selected>" . $departement['nomDepartement'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>Erreur lors de la récupération des départements</option>";
                        }
                        ?>
                    </select>
                </div>

                <?php
                // Si le département est sélectionné, récupérer les communes correspondantes
                $communes = [];
                if (isset($_POST['departement'])) {
                    $departementChoisi = $_POST['departement'];
                    $commune_url = 'http://localhost:8082/api/communes/by-dep-name/' . rawurlencode($departementChoisi);
                    $communes_json = file_get_contents($commune_url);
                    $communes = json_decode($communes_json, true);
                }
                ?>

                <div class="mb-3">
                    <select class="form-select" id="commune" name="commune" onchange="this.form.submit()">
                        <option value='' <?php echo empty($_POST['commune']) ? 'selected' : ''; ?>>Commune</option>

                        <?php
                        // Afficher les options pour chaque commune
                        foreach ($communes as $commune) {
                            $selectedCommune = isset($_POST['commune']) && $_POST['commune'] == $commune['nomCommune'] ? 'selected' : '';
                            echo "<option value='" . htmlentities($commune['nomCommune'], ENT_QUOTES, 'UTF-8') . "' $selectedCommune>" . htmlentities($commune['nomCommune'], ENT_QUOTES, 'UTF-8') . "</option>";
                        }
                        ?>
                    </select>
                </div>


                <?php
                // Si la commune est sélectionnée, récupérer les stations correspondantes
                $stations = [];
                if (isset($_POST['commune'])) {
                    $communeChoisie = rawurlencode($_POST['commune']); // Encodez le nom de la commune
                    $station_url = 'http://localhost:8082/api/stations/by-commune-name/' . $communeChoisie;
                    $stations_json = file_get_contents($station_url);
                    $stations = json_decode($stations_json, true);
                }
                ?>


<div class="mb-3">
    <select class="form-select" id="station" name="station">
    <option value='' <?php echo empty($_POST['station']) ? 'selected' : ''; ?>>Station</option>

        <?php
        // Afficher les options pour chaque station
        foreach ($stations as $station) {
            $selectedStation = isset($_POST['station']) && $_POST['station'] == $station['nomStation'] ? 'selected' : '';
            echo "<option value='" . $station['nomStation'] . "' $selectedStation>" . $station['nomStation'] . "</option>";
        }
        ?>
    </select>
</div>

                <?php
                // Si la station est sélectionnée, récupérer les polluants correspondants
                $polluants = [];
                if (isset($_POST['station'])) {
                    $stationChoisie = $_POST['station'];
                    $polluant_url = 'http://localhost:8082/api/polluants/by-station-name/' . rawurlencode($stationChoisie);
                    $polluants_json = file_get_contents($polluant_url);
                    $polluants = json_decode($polluants_json, true);
                }
                ?>
                 </div>
                <button type="submit" class="btn btn-primary">Afficher les polluants</button>
            </form>
            </main>
           
            <div class="polluants-results">
            
    <?php
    // Afficher les polluants sélectionnés
    if (!empty($polluants)) {
        echo "<h5>Polluants pour la station $stationChoisie :</h5>";
        echo "<ul>";
        foreach ($polluants as $polluant) {
            echo "<li>" . $polluant['nomPolluant'] . "</li>";
        }
        echo "</ul>";
    }
    ?>
</div>

         
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
