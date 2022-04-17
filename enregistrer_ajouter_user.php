<html>
 
<?php
 include("connecter_base.php");
 
include('fonction_debug.php');
?>

<?php
if(!empty($_POST))
{
         $error=array();
         if ( empty($_POST['mot_de_passe']) || $_POST['mot_de_passe'] != $_POST['cf_mot_de_passe'])
         {
            $error['mot de passe']="vous d'evez entrer un mot de passe valide";
         }
         else
         {
           $requete=$base -> prepare('SELECT login_user FROM utilisateur WHERE login_user=:login_user');
           $requete -> execute(array(':login_user'=>$_POST['login']));
           $reponse=$requete->fetch();
           if($reponse)
           {
                $error['logins']="ce login est déja pris " ;                 
           }
         }
         if(!empty($_POST['email']))
         {
           $requete=$base -> prepare('SELECT email FROM utilisateur WHERE email=:email');
           $requete -> execute(array(':email'=>$_POST['email']));
           $reponse=$requete->fetch();
           if($reponse)
           {
                $error['email']="cet email est déja utilisé par un autre utilisateur " ;                 
           }
          
         }
         
}


if(empty($error))
{
    
        if(isset($_POST['ajouter']) )
         {
              
            $nom_user=$_POST['nom_user'];
            $prenom_user=$_POST['prenom_user'];

            $email=$_POST['email'];
            $tel_user=$_POST['tel_user'];
            $poste_user=$_POST['poste'];
            $login_user=$_POST['login'];
      
            $cf_mot_de_passe=$_POST['cf_mot_de_passe'];
        
            $s_type_user=$_POST['s_type_user'];
            $s_service=$_POST['s_service'];
           
               

                
                          $requete =$base->prepare('INSERT INTO utilisateur(nom_user,prenom_user,email,tel_user,poste_user,login_user,mot_de_passe,id_typeutilisateur,id_service)
                                VALUES(:nom_user,:prenom_user,:email,:telephone,:poste,:login_user,:cf_mot_de_passe,:s_type_user,:s_service)');
                        
                        $requete -> execute (array(':nom_user' =>$nom_user,
                                                            ':prenom_user'=> $prenom_user,
                                                            ':email'=>$email,
                                                            ':telephone'=>$tel_user,
                                                            ':poste'=>$poste_user,
                                                            ':login_user'=>$login_user,
                                                            ':cf_mot_de_passe'=>$cf_mot_de_passe,
                                                            ':s_type_user'=>$s_type_user,
                                                            ':s_service'=>$s_service   ));
                                             
      echo'<script>  confirm("l utilisateur à été ajouter avec succès"); </script>';
           
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
                     
                                 
                     