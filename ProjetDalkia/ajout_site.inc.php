<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=dalkia_database;charset=utf8', 'root','');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}

/** Initialisation des variables pour la partie Informations**/
$entreprise='';
if (isset($_POST['Entreprise'])) {
	$entreprise = $_POST['Entreprise'];
}

$site='';
if (isset($_POST['Site'])) {
	$site = $_POST['Site'];
}

$habitat='';
if (isset($_POST['Habitat'])) {
	$habitat = $_POST['Habitat'];
}

/** Initialisation des variables pour la partie Puissance souscrite**/
$num_sous_station='';
if (isset($_POST['num_sous_station'])) {
	$num_sous_station = $_POST['num_sous_station'];
}

$ps2015='';
if (isset($_POST['ps2015'])) {
	$ps2015 = $_POST['ps2015'];
}

$ps2016='';
if (isset($_POST['ps2016'])) {
	$ps2016 = $_POST['ps2016'];
}

$ps2017='';
if (isset($_POST['ps2017'])) {
	$ps2017 = $_POST['ps2017'];
}

/** Initialisation des variables pour la partie Consommation **/
$cs2011='';
if (isset($_POST['cs2011'])) {
	$cs2011 = $_POST['cs2011'];
}

$cs2012='';
if (isset($_POST['cs2012'])) {
	$cs2012 = $_POST['cs2012'];
}

$cs2013='';
if (isset($_POST['cs2013'])) {
	$cs2013 = $_POST['cs2013'];
}

$cs2014='';
if (isset($_POST['cs2014'])) {
	$cs2014 = $_POST['cs2014'];
}

$cs2015='';
if (isset($_POST['cs2015'])) {
	$cs2015 = $_POST['cs2015'];
}

$cs2016='';
if (isset($_POST['cs2016'])) {
	$cs2016 = $_POST['cs2016'];
}

$cs2017='';
if (isset($_POST['cs2017'])) {
	$cs2017 = $_POST['cs2017'];
}

/** Initialisation des variables pour la partie R1 et R2 **/

/* Début 2012 */
$R1_2012='';
if (isset($_POST['R1_2012'])) {
	$R1_2012 = $_POST['R1_2012'];
}

$R2_2012='';
if (isset($_POST['R2_2012'])) {
	$R2_2012 = $_POST['R2_2012'];
}

$R1R2_2012='';
if (isset($_POST['R1R2_2012'])) {
	$R1R2_2012 = $_POST['R1R2_2012'];
}

/* Fin 2012*/

/*Début 2013 */
$R1_2013='';
if (isset($_POST['R1_2013'])) {
	$R1_2013 = $_POST['R1_2013'];
}

$R2_2013='';
if (isset($_POST['R2_2013'])) {
	$R2_2013 = $_POST['R2_2013'];
}

$R1R2_2013='';
if (isset($_POST['R1R2_2013'])) {
	$R1R2_2013 = $_POST['R1R2_2013'];
}
/*Fin 2013*/

/*Début 2014 */
$R1_2014='';
if (isset($_POST['R1_2014'])) {
	$R1_2014 = $_POST['R1_2014'];
}

$R2_2014='';
if (isset($_POST['R2_2014'])) {
	$R2_2014 = $_POST['R2_2014'];
}

$R1R2_2014='';
if (isset($_POST['R1R2_2014'])) {
	$R1R2_2014 = $_POST['R1R2_2014'];
}
/* Fin 2014 */

/*Début 2015 */

//1st periode
$R1_2015_1st='';
if (isset($_POST['R1_2015_1st'])) {
	$R1_2015_1st = $_POST['R1_2015_1st'];
}

$R2_2015_1st='';
if (isset($_POST['R2_2015_1st'])) {
	$R2_2015_1st = $_POST['R2_2015_1st'];
}

$R1R2_2015_1st='';
if (isset($_POST['R1R2_2015_1st'])) {
	$R1R2_2015_1st = $_POST['R1R2_2015_1st'];
}

//2nde Periode
$R1_2015_2nde='';
if (isset($_POST['R1_2015_2nde'])) {
	$R1_2015_2nde = $_POST['R1_2015_2nde'];
}

$R2_2015_2nde='';
if (isset($_POST['R2_2015_2nde'])) {
	$R2_2015_2nde = $_POST['R2_2015_2nde'];
}

$R1R2_2015_2nde='';
if (isset($_POST['R1R2_2015_2nde'])) {
	$R1R2_2015_2nde = $_POST['R1R2_2015_2nde'];
}

//R1R2
$R1R2_2015='';
if (isset($_POST['R1R2_2015'])) {
	$R1R2_2015 = $_POST['R1R2_2015'];
}
/* Fin 2015 */

/* Début 2016 */
$R1_2016='';
if (isset($_POST['R1_2016'])) {
	$R1_2016 = $_POST['R1_2016'];
}

$R2_2016='';
if (isset($_POST['R2_2016'])) {
	$R2_2016 = $_POST['R2_2016'];
}

$R1R2_2016='';
if (isset($_POST['R1R2_2016'])) {
	$R1R2_2016 = $_POST['R1R2_2016'];
}
/* Fin 2016 */

/* Début 2017 */
$R1_2017='';
if (isset($_POST['R1_2017'])) {
	$R1_2017 = $_POST['R1_2017'];
}

$R2_2017='';
if (isset($_POST['R2_2017'])) {
	$R2_2017 = $_POST['R2_2017'];
}

$R1R2_2017='';
if (isset($_POST['R1R2_2017'])) {
	$R1R2_2017 = $_POST['R1R2_2017'];
}
/*Fin 2017 */

//echo $R1_2012;
/** Insertion en base **/

/* Table conso_annuelle */
$response = $bdd->prepare('INSERT INTO  conso_annuelle(Entreprise, Habitat, Sites, a2011, a2012, a2013, a2014, a2015, a2016, a2017 ) VALUES (?,?,?,?,?,?,?,?,?,?)');
$response->execute(array($entreprise, $habitat, $site, $cs2011, $cs2012, $cs2013, $cs2014, $cs2015, $cs2016, $cs2017));

/* Table puis_souscrite */
$response = $bdd->prepare('INSERT INTO  puis_souscrite(num_sous_station, Sites, ps_2015, ps_2016, ps_2017) VALUES (?,?,?,?,?)');
$response->execute(array($num_sous_station, $site, $ps2015, $ps2016, $ps2017));

/* Table r1r2_sites */
$response = $bdd->prepare('INSERT INTO  r1r2_sites(Entreprise, Sites, R1_2012, R2_2012, R1R2_2012, R1_2013, R2_2013, R1R2_2013, R1_2014, R2_2014, R1R2_2014, R1_2015_1st_periode, R2_2015_1st_periode, R1R2_2015_1st_periode, R1_2015_2nde_periode, R2_2015_2nde_periode, R1R2_2015_2nde_periode, R1R2_2015, R1_2016, R2_2016, R1R2_2016, R1_2017, R2_2017, R1R2_2017) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
$response->execute(array($entreprise, $site, $R1_2012, $R2_2012, $R1R2_2012, $R1_2013, $R2_2013, $R1R2_2013, $R1_2014, $R2_2014, $R1R2_2014, $R1_2015_1st, $R2_2015_1st, $R1R2_2015_1st, $R1_2015_2nde, $R2_2015_2nde, $R1R2_2015_2nde, $R1R2_2015, $R1_2016, $R2_2016, $R1R2_2016, $R1_2017, $R2_2017, $R1R2_2017));


//affichage message de confirmation
echo "<script type='text/javascript'>alert('Le site a bien été enregistré')</script>";
//affichage de la page inscription
echo "<script type='text/javascript'>document.location.replace('ajout_site.php');</script>"
?>