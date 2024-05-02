<?php
require("pdo.php");


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