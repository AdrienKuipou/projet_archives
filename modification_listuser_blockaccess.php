<?php
include("connecter_base.php");

if(isset($_GET['id_user']) and $_GET['id_user'] !="")
{
      $autorisation = "refused";
       $requete =$base->prepare('UPDATE utilisateur SET autorisation=:autorisation WHERE id_user=:id_useree');
       $requete -> execute (array(':autorisation' =>$autorisation, ':id_useree'=>$_GET['id_user'] ));
       echo'<script> window.location.href = "listuser.php"; </script>';
       exit();
}      
   
?>
