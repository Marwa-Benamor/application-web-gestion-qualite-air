<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Traitement du Formulaire</title>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

    .result-container {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        width: 100%;
        box-sizing: border-box;
    }

    h2 {
    margin-bottom: 16px;
    }
 </style>
</head>

<body>
 <div class="result-container">
 <h2>Récapitulatif des données du formulaire :</h2>

 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 echo "<p><strong>Nom :</strong> " . htmlspecialchars($_POST["nom"]) . "</p>";
 echo "<p><strong>Prénom :</strong> " . htmlspecialchars($_POST["prenom"]) . "</p>";
 echo "<p><strong>Adresse e-mail :</strong> " . htmlspecialchars($_POST["email"]) . "</p>";
 echo "<p><strong>Mot de passe :</strong> " . htmlspecialchars($_POST["password"]) . "</p>";
 echo "<p><strong>Numéro de mobile :</strong> " . htmlspecialchars($_POST["mobile"]) . "</p>";


 // Récupération de la commune choisie depuis le formulaire
 $communeChoisie = $_POST["commune"];

 // Affichage de la commune choisie dans le formulaire récapitulatif
 echo "<p><strong>Commune choisie :</strong> " . htmlspecialchars($communeChoisie) . "</p>";


// Appel de l'API pour récupérer les stations de la commune
$communeChoisie = $_POST["commune"];
$stations_url = 'http://localhost:8082/api/stations/by-commune-name/' . urlencode($communeChoisie);
$stations_json = file_get_contents($stations_url);
$stations_data = json_decode($stations_json, true);

if ($stations_data !== null && is_array($stations_data)) {
 echo "<p><strong>Stations de la commune " . htmlspecialchars($communeChoisie) . " :</strong></p>";
 echo "<ul>";
 foreach ($stations_data as $station) {
 echo "<li>" . htmlspecialchars($station['nomStation']) . "</li>";
 }
 echo "</ul>";
} else {
 echo "<p>Aucune station n'a été trouvée pour la commune " . htmlspecialchars($communeChoisie) . ".</p>";
}


 echo "<p><strong>Notification :</strong> ";
 if (isset($_POST["sms"])) echo "SMS, ";
 if (isset($_POST["mail"])) echo "E-mail";
 echo "</p>";

 echo "<p><strong>Recevoir un e-mail quotidien :</strong> ";
 echo isset($_POST["indice"]) ? "Oui" : "Non";
 echo "</p>";

 echo "<p><strong>Indice pollinique :</strong> " . htmlspecialchars($_POST["pollinique"]) . "</p>";
 } else {
 echo "<p>Aucune donnée n'a été soumise.</p>";
 }
 ?>

<button class="btn btn-outline-warning" ><a href="page_connexion_particulier.php" >Se connecter</a></button>
 </div>

</body>

</html>