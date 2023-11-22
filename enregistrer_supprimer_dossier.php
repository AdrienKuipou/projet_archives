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
        $message = "You can't delete it because this folder is already associated with several documents. ";
        $htmlErrorMessage = "<h1>Error occurred during deletion</h1>
                            <p>$message</p>
                            <a href='supprimer_dossier.php'><button style='background-color: #f44336; color: white; padding: 10px 20px; border: none; text-decoration: none; cursor: pointer; font-size: 16px; border-radius: 4px;'>Go Back</button></a>";
        echo $htmlErrorMessage;
    }
}


?>
