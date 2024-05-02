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

$resultat = $dbPDO->prepare("
SELECT YEAR(date_de_sortie) AS date, titre, r.naionalite AS nationnalite, r.prenom AS prenom, r.nom AS nom, f.id AS id FROM film f
INNER JOIN genre g ON  f.id_genre = g.id
INNER JOIN realisateur r ON f.id_réalisateur = r.id;
");
$resultat->execute();
$realisateur = $resultat->fetchAll(PDO::FETCH_CLASS);

foreach ($realisateur as $realisateurs) {
    echo "<h2> $realisateurs->prenom $realisateurs->nom : </h2>";

    echo "<h4>Nationnalité : $realisateurs->nationnalite</h4>";
    echo "<h4>Filmographie : <ul><li><a href='film.php?id_film=$realisateurs->id'>$realisateurs->titre</a>, $realisateurs->date</li></ul></h4>";

}


?>