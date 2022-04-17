<?php
         
   if(isset($_POST['modifier']) and  !empty( $_POST['modifier']))
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

   
      
   
    $requete =$base->prepare('UPDATE utilisateur SET nom_user=:nom_user,prenom_user=:prenom_user,email=:email,tel_user=:telephone,poste_user=:poste,login_user=:login_user,mot_de_passe=:cf_mot_de_passe,id_typeutilisateur=:s_type_user,id_service=:s_service WHERE id_user=:id_useree');
                  
            
            $requete -> execute (array(':nom_user' =>$nom_user,
                                                ':prenom_user'=> $prenom_user,
                                                ':email'=> $email,
                                                ':telephone'=>$tel_user,
                                                ':poste'=>  $poste_user,
                                                ':login_user'=>$login_user,
                                                ':cf_mot_de_passe'=>$cf_mot_de_passe,
                                               
                                                ':id_user'=>$s_type_user,
                                                ':s_service'=>$s_service ,
                                                 ':id_useree'=>$_GET['id_user'] ));
                                 echo'<script>  confirm("l utilisateur à été modifier avec succès"); </script>';
                                


   }

    
?>