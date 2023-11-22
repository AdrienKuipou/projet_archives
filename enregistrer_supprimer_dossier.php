<?php
  include("connecter_base.php");
  $requete = $base ->prepare('SELECT*  FROM dossier WHERE id_dossier=:id');
  $requete -> execute(array(':id'=>$_GET['id_dossier']));
  $reponse =$requete->fetch();
 ?>
<?php 
     function deleteTree($dir)
     {
       foreach(glob($dir . "/*") as $element)
       {
         if(is_dir($element))
         {
           deleteTree($element);
           rmdir($element);
         }
         else
         {
           unlink($element);
         }
       }
     }
 ?>
<?php
if(isset($_GET['id_dossier']) and $_GET['id_dossier'] !="" )
{   
    		try {
        $requete = $base ->prepare('DELETE  FROM dossier WHERE id_dossier=:id');
           $requete -> execute(array(':id'=>$_GET['id_dossier']));
           deleteTree($reponse['nom_dossier']);
	   /*           rmdir('tata'); */
          
            echo '<script>window.location.href = "supprimer_dossier.php";</script>';
    		exit();
    } catch (PDOException $e) {
          $message = "You can't delete it because this service is already associated with several users. ";
        echo "<script>alert('$message');</script>";
    }
}

?>
