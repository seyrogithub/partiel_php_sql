<?php
require("pdo.php");


echo "<h2> Liste des meilleurs films des années 2010 : </h2>";

$resultat = $dbPDO->prepare("
SELECT YEAR(date_de_sortie) AS date, titre, g.libelle AS genre, r.prenom AS prenom, r.nom AS nom, f.id AS id, r.id AS r_id FROM film f
INNER JOIN genre g ON  f.id_genre = g.id
INNER JOIN realisateur r ON f.id_réalisateur = r.id;
");
$resultat->execute();
$film = $resultat->fetchAll(PDO::FETCH_CLASS);

foreach ($film as $films) {
    echo "<ul><li><a href='film.php?id_film=$films->id'>$films->titre</a> ($films->genre de <a href='filmmaker.php?id_film=$films->r_id'>$films->prenom $films->nom</a>, $films->date)</li></ul>";
}



?>

