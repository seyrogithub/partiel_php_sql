<?php
require("pdo.php");

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

