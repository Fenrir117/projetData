<?php
include('view/layout.html');
?>
<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=tourismehandi;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer




$monTableauToutBeau = array();
$req = "SELECT LONGITUDE FROM infos";
foreach  ($bdd->query($req) as $row) {
    $monTableauToutBeau[] = $row['LONGITUDE'];
}
 
// print_r($monTableauToutBeau);
 
$monTableauToutBeauEnJson = json_encode($monTableauToutBeau);

echo $monTableauToutBeauEnJson;



// On récupère tout le contenu de la table
// $reponse = $bdd->query('SELECT * FROM infos');

?>

<!-- //Code JavaScript
var requete = new XMLHttpRequest();
requete.onload = function() {
 //La variable à passer est alors contenue dans l'objet response et l'attribut responseText.
 var variableARecuperee = this.responseText;
};
requete.open(get, script.php, true); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
requete.send(); -->
