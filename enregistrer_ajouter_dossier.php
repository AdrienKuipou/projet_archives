<html>
<?php
 include("connecter_base.php");
 
include('fonction_debug.php');
?>

<?php
if(!empty($_POST))
{
         $error=array();
        
         
           $requete=$base -> prepare('SELECT nom_dossier FROM dossier WHERE nom_dossier=:nom_dossier');
           $requete -> execute(array(':nom_dossier'=>$_POST['nom']));
           $reponse=$requete->fetch();
           if($reponse)
           {
                $error['nom']="un dossier à déja ce nom " ;                 
           }
       
}


if(empty($error))
{
    
        if(isset($_POST['ajouter']) )
         {
              
            $nom_dossier=$_POST['nom'];
            $description=$_POST['description'];

                
                          $requete =$base->prepare('INSERT INTO dossier(nom_dossier,description)
                                VALUES(:nom_dossier,:description)');
                                
                        
                        $requete -> execute (array(':nom_dossier' =>$nom_dossier,
                                                            ':description'=> $description
                                             
                                                             ));
                                $dossier="archive/".$nom_dossier.'/';
                                if(!is_dir($dossier) )
                                {
                                 mkdir($dossier);
                                }
                                else{
                                  echo'<script>  alert("ce dossier existe déja"); </script>';
                                }
                                             
      echo'<script>  confirm("le dossier à été creer avec succès"); </script>';
           
            }                               
}
?>
<?php if(!empty($error)):?>
<div class="alert">
           <p>vous n'avez pas rempli le formulaire correctement</p>
<?php foreach($error as $erroné): ?>
  <ul>
           <li><?=$erroné;  ?></li>
  <?php endforeach; ?>
   </ul>
  </div>
  <?php endif;?>
  
  
  
         </html>              
                     
                                 
                     
