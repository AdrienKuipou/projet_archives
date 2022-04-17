<?php
  include("connecter_base.php");
  
?>

<?php
if(isset($_GET['id_user']) and $_GET['id_user'] !="" )
{
           $requete = $base ->prepare('DELETE  FROM utilisateur WHERE id_user=:id');
           $requete -> execute(array(':id'=>$_GET['id_user']));
           header('location:supprimer_user.php');
}

?>