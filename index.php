<?php
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

echo "<h2> Liste des meilleurs films des années 2010 : </h2>";

$resultat = $dbPDO->prepare("
SELECT YEAR(date_de_sortie) AS date, titre, g.libelle AS genre, r.prenom AS prenom, r.nom AS nom  FROM film f
INNER JOIN genre g ON  f.id_genre = g.id
INNER JOIN realisateur r ON f.id_réalisateur = r.id;
");
$resultat->execute();
$film = $resultat->fetchAll(PDO::FETCH_CLASS);

foreach ($film as $films) {
    echo "<ul><li>$films->titre ($films->genre de $films->prenom $films->nom, $films->date)</li></ul>";
}

?>

