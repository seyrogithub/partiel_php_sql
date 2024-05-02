<?php
 // Afficher les erreurs à l'écran
 ini_set('display_errors', 1);
 // Afficher les erreurs et les avertissements
 error_reporting(E_ALL);
 $servername = "localhost"; // Nom du serveur
$username = "root"; // Nom d'utilisateur de la base de données
$password = "root"; // Mot de passe de la base de données
$dbname = "partiel_web"; // Nom de la base de données

try {
    $dbPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration de PDO pour générer des exceptions en cas d'erreur
    $dbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion réussie à la base de données"; 
} catch(PDOException $e) {
    echo "La connexion a échouée : " . $e->getMessage();
}
$id_film = $_GET['id_film'];

$resultat = $dbPDO->prepare("
SELECT date_de_sortie AS date, titre, g.libelle AS genre, r.prenom AS prenom, r.nom AS nom, duree, description FROM film f
INNER JOIN genre g ON  f.id_genre = g.id
INNER JOIN realisateur r ON f.id_réalisateur = r.id;
");
$resultat->execute();
$film = $resultat->fetchAll(PDO::FETCH_CLASS);

foreach ($film as $films) {
    echo "<h2> $films->titre </h2>";

    echo "<h3> $films->date en salle | $films->duree min | $films->genre </h3>";
    echo "<h3> De $films->prenom $films->nom </h3>";

    echo "<p> Synopsis : $films->description </p>";
}


?>

