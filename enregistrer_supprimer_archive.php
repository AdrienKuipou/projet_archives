<?php
  include("connecter_base.php");
 
?>

<?php
if(isset($_GET['id_archive']) and $_GET['id_archive'] !="" )
{
  $requete_arc =$base-> prepare('SELECT* FROM archive where id_archive=:id ');
  $requete_arc->execute(array(':id'=>$_GET['id_archive']));
 $reponse_arc=$requete_arc->fetch();

           $requete = $base ->prepare('DELETE  FROM archive WHERE id_archive=:id');
           $requete -> execute(array(':id'=>$_GET['id_archive']));
           $fichier=$reponse_arc['chemin'];
           if(file_exists($fichier))
           {
             unlink($fichier);
           }
          
           header('location:supprimer_archive.php');
}

?>