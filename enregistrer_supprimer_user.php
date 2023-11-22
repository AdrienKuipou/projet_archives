<?php
include("connecter_base.php");

if(isset($_GET['id_user']) and $_GET['id_user'] !="")
{
   $requete = $base->prepare('DELETE FROM utilisateur WHERE id_user=:id');
   $requete->execute(array(':id'=>$_GET['id_user']));
   echo '<script>window.location.href = "supprimer_user.php";</script>';
   exit();
}
?>
