<?php
    include("connecter_base.php");

if(isset($_POST['envoyer']))
{

$requete_do=$base -> prepare('SELECT id_dossier, nom_dossier FROM dossier where id_dossier=:id_dossier');
$requete_do->execute(array(':id_dossier'=>$_POST['s_dossier']));
$reponse_do=$requete_do->fetch();

$id_dossier=$_POST['s_dossier'];
$nom_archive=$_POST['nom'];
$date_archivage=$_POST['date_archivage'];
$date_creation=$_POST['date_creation'];
$id_service=$_POST['s_service'];
$id_naturedoc=$_POST['s_nature_doc'];

{      
 if(isset($_FILES['photos']) and !empty($_FILES['photos']['name']) )
 {
           $taillemax= 2097152;
           $extention_valides= array('jpg','jpeg','gif','png','docx','pdf');
           if($_FILES['photos']['size'] <=  $taillemax )
           {
                      /* STRRCHR recupere lextention du fichier avec le point. SUBSTR recupere  STRRCHR en retirant
                             le premier caractere qui est le point. STRTOLOWER rucupere   SUBSTR et le met en miniscule*/
                      
                 $extention_recuperer=strtolower(substr(strrchr($_FILES['photos']['name'],'.'),1));
                 /* on verifie si $extention_recuperer (qui a recuperer lextention du fichier) est dans la liste
                        du tableau $extention_valides(qui est un tableau qui contient la liste des extention
                        a respeter)  */
              if(in_array($extention_recuperer,$extention_valides))
                 {
                 
                    if($_POST['s_dossier']=$reponse_do['nom_dossier'])
                   {
                     
                    $dossier="archive/".$reponse_do['nom_dossier'].'/';
                
                     $chemin_du_fichier=$dossier.$_FILES['photos']['name'];
                     $resultat=move_uploaded_file($_FILES['photos']['tmp_name'],$chemin_du_fichier);
                     if($resultat)
                     {
                      $requete = $base -> prepare('INSERT INTO archive(nom_archive,chemin,date_archivage,date_creation,id_dossier,id_service,id_naturedoc) VALUES(:nom_archive,:chemin_du_fichier,:date_archivage,:date_creation,:id_dossier,
                            :id_service,:id_naturedoc)');     

                      $requete -> execute(array(':nom_archive'=>$nom_archive,':chemin_du_fichier'=>$chemin_du_fichier,':date_archivage'=>$date_archivage,':date_creation'=>$date_creation,':id_dossier'=>$id_dossier,
                        ':id_service'=>$id_service,':id_naturedoc'=>$id_naturedoc   ));
                        echo'<script>  confirm("le fichier à été ajouter avec succès"); </script>';
                     }
                     else
                     {
                      echo"Erreur durant l'importation de votre fichier";
                     }

                   }

                      
                }
                 else
                 {
                      echo"votre fichier doit etre au format jpg, jpeg, gif, png, docx ou pdf";
                 }
           }
           else
           {
                      echo"votre fichier ne doit pas dépasser 2Mo";
           }
 }
}
}

?>