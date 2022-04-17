<html>
<?php
 include("connecter_base.php");
 
include('fonction_debug.php');
?>

<?php
if(!empty($_POST))
{
         $error=array();
        
         
           $requete=$base -> prepare('SELECT libelle_service FROM service WHERE  libelle_service=:nom_service');
           $requete -> execute(array(':nom_service'=>$_POST['nom']));
           $reponse=$requete->fetch();
           if($reponse)
           {
                $error['nom']="un service à déja ce nom " ;                 
           }
       
}


if(empty($error))
{
    
        if(isset($_POST['ajouter']) )
         {
              
            $nom_service=$_POST['nom'];
            $description=$_POST['description'];

                
                          $requete =$base->prepare('INSERT INTO service( libelle_service,description)
                                VALUES(:nom_service,:description)');
                        
                        $requete -> execute (array(':nom_service' =>$nom_service,
                                                            ':description'=> $description
                                             
                                                             ));
                                             
      echo'<script>  confirm("le service à été creer avec succès"); </script>';
           
            }                               
}
?>
<?php if(!empty($error)):?>
<div class="alert">
           <p>vous n'avez pas rempli le formulaire correctement <br></p>
<?php foreach($error as $erroné): ?>
   
  <ul>
           <li><?=$erroné;  ?></li>
  <?php endforeach; ?>
   </ul>

  </div>
  <?php endif;?>
  
  
  
         </html>              
                     
                                 
                     