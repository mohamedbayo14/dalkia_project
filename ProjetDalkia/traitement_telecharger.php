<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->prepare('SELECT janvier,fevrier,mars,avril,mai,juin,juillet,aout,septembre,octobre,novembre,decembre FROM conso_mensuelle WHERE entreprise=?');
$reponse->execute(array($_POST['nom_entreprise']));
while ($donnees = $reponse->fetch())
{
    $janvier= strval($donnees["janvier"]);   
    $fevrier=strval($donnees["fevrier"]);
    $mars= strval($donnees["mars"]);
    $avril= strval($donnees["avril"]);
    $mai= strval($donnees["mai"]);
    $juin= strval($donnees["juin"]); 
    $juillet= strval($donnees["juillet"]); 
    $aout= strval($donnees["aout"]);
    $septembre= strval($donnees["septembre"]);
    $octobre= strval($donnees["octobre"]);   
    $novembre= strval($donnees["novembre"]);   
    $decembre= strval($donnees["decembre"]);
};
$lignes[] = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
$lignes[] = array($janvier,$fevrier,$mars,$avril,$mai,$juin,$juillet,$aout,$septembre,$octobre,$novembre,$decembre );

// Paramétrage de l'écriture du futur fichier CSV
$chemin = 'C:/Users/bayo1/Desktop/data.csv';
$delimiteur = ';'; // Pour une tabulation, utiliser $delimiteur = "t";

// Création du fichier csv (le fichier est vide pour le moment)
// w+ : consulter http://php.net/manual/fr/function.fopen.php
$fichier_csv = fopen($chemin, 'w+');

// Si votre fichier a vocation a être importé dans Excel,
// vous devez impérativement utiliser la ligne ci-dessous pour corriger
// les problèmes d'affichage des caractères internationaux (les accents par exemple)
fprintf($fichier_csv, chr(0xEF).chr(0xBB).chr(0xBF));

// Boucle foreach sur chaque ligne du tableau
foreach($lignes as $ligne){
	// chaque ligne en cours de lecture est insérée dans le fichier
	// les valeurs présentes dans chaque ligne seront séparées par $delimiteur
	fputcsv($fichier_csv, $ligne, $delimiteur);
}
echo $janvier;
// fermeture du fichier csv
fclose($fichier_csv);
//alerte si erreur lors de la saisie ou la personne n'a pas de drois d'accès
    echo "<script type='text/javascript'>alert('Données bien enregistrées')</script>";
?>