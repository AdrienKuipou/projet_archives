<?php

include("connecter_base.php");
$r=3;
$retour=$base -> prepare('SELECT count(*) AS nbre_entrees FROM connectes WHERE ip=:servere');
$retour -> execute (array(':servere'=>$_SERVER['REMOTE_ADDR']));
$donnees=$retour -> fetch();
if($donnees['nbre_entrees']==0)
{
    $retour=$base->prepare('INSERT into connectes values(?,?,?)');
    $retour->execute(array($_SERVER['REMOTE_ADDR'],time(),$_SESSION['id_user']));
}
else
{
    $retour=$base->prepare('UPDATE connectes SET timestamp=:temps WHERE ip=:servere');
    $retour->execute(array(':temps'=>time(),':servere'=>$_SERVER['REMOTE_ADDR']));
}
$timestamp_5min=time()-(60*5); // 60*5=nombres de secondes ecoulées en 5 minutes
$retour=$base->prepare('DELETE FROM connectes  WHERE timestamp < :temps5');
$retour->execute(array(':temps5'=>$timestamp_5min));

$retour=$base->query('SELECT count(*) AS nbre_entrees ,nom_user,prenom_user from connectes,utilisateur WHERE utilisateur.id_user=connectes.id_user');
$donnees=$retour->fetch();

?>
