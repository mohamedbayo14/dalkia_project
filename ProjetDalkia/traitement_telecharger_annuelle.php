<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->prepare('SELECT * FROM conso_annuelle WHERE Sites=?');
$reponse->execute(array($_POST['nom_entreprise']));
while ($donnees = $reponse->fetch())
{
    $a2011 = strval($donnees["a2011"]);
    $a2012 = strval($donnees["a2012"]);
    $a2013 = strval($donnees["a2013"]);
    $a2014 = strval($donnees["a2014"]);
    $a2015 = strval($donnees["a2015"]);
    $a2016 = strval($donnees["a2016"]);
    $a2017 = strval($donnees["a2017"]);
};


$lignes2[] = array('2011', '2012', '2013', '2014', '2015', '2016', '2017');
$lignes2[] = array($a2011, $a2012, $a2013, $a2014, $a2015, $a2016, $a2017);

// Paramétrage de l'écriture du futur fichier CSV
$chemin2 = 'C:/Users/bayo1/Desktop/data_anual.csv';
$delimiteur2 = ';'; // Pour une tabulation, utiliser $delimiteur = "t";

// Création du fichier csv (le fichier est vide pour le moment)
// w+ : consulter http://php.net/manual/fr/function.fopen.php
$fichier_csv2 = fopen($chemin2, 'w+');

// Si votre fichier a vocation a être importé dans Excel,
// vous devez impérativement utiliser la ligne ci-dessous pour corriger
// les problèmes d'affichage des caractères internationaux (les accents par exemple)
fprintf($fichier_csv2, chr(0xEF).chr(0xBB).chr(0xBF));

// Boucle foreach sur chaque ligne du tableau
foreach($lignes2 as $ligne){
	// chaque ligne en cours de lecture est insérée dans le fichier
	// les valeurs présentes dans chaque ligne seront séparées par $delimiteur
	fputcsv($fichier_csv2, $ligne, $delimiteur2);
}
// fermeture du fichier csv
fclose($fichier_csv2);
//alerte si erreur lors de la saisie ou la personne n'a pas de drois d'accès
    echo "<script type='text/javascript'>alert('Données bien enregistrées')</script>";

?>