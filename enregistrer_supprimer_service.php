<?php
  include("connecter_base.php");
  
?>

<?php
if(isset($_GET['id_service']) and $_GET['id_service'] !="" )
{
           $requete = $base ->prepare('DELETE  FROM service WHERE id_service=:id');
           $requete -> execute(array(':id'=>$_GET['id_service']));
           header('location:supprimer_service.php');
}

?>