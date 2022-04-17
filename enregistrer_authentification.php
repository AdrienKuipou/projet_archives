<?php include('fonction_debug.php');?>
<?php
      include("connecter_base.php");

                      if(isset($_POST['envoyer'] ))
                      {
                        $error=array();
                         $nom_utilisateur=$_POST['nom_utilisateur'];
                         
                         $requete = $base ->prepare('SELECT*  FROM utilisateur WHERE login_user=:login_user');
                         $requete -> execute(array(':login_user'=>$nom_utilisateur));
                         $reponse= $requete -> fetch();
                         
                        
                         if(!$reponse)
                         {
                                 
                                 $error['nom_utilisateur']="nom d'utilisateur incorrecte" ;    
                         }
                         else
                         {
                              if($_POST['password'] == $reponse['mot_de_passe'])
                              {
                              
                               session_start();
                               $_SESSION['id_user']=$reponse['id_user'];
                                $_SESSION['nom_user']=$reponse['nom_user'];
                                  $_SESSION['prenom_user']=$reponse['prenom_user'];
                                    $_SESSION['email']=$reponse['email'];
                                      $_SESSION['tel_user']=$reponse['tel_user'];
                                       $_SESSION['poste']=$reponse['poste_user'];
                                        $_SESSION['login']=$reponse['login_user'];
                                        $_SESSION['s_type_user']=$reponse['id_typeutilisateur'];
                                        $_SESSION['s_service']=$reponse['id_service'];
                                        $_SESSION['mot_de_passe']=$reponse['mot_de_passe'];
                                  if(($reponse['id_typeutilisateur']) == 1)
                                  {
                                     header('location:accueil_user.php');
                                  }
                                  else if(($reponse['id_typeutilisateur']) == 2)
                                  {
                                    header('location:accueil_admin.php');
                                  }
                                  else
                                  {
                                    header('location: index.php');
                                  }
                              }
                              else
                              {
                               
                                $error['mot de passe']="mot de passe incorrecte" ;
                              }
                         }
                      }
                    
?>
  <?php if(!empty($error)):?>
                        <div class="alert">
                                  
                        <?php foreach($error as $erroné): ?>
                          <ul>
                                   <li><?=$erroné;  ?></li>
                          <?php endforeach; ?>
                           </ul>
                          </div>
                          <?php endif;?>