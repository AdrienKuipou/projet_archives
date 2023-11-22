<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   echo '<script>window.location.href = "index.php";</script>';
    exit();

}

?>
<?php
  include("connecter_base.php");
  $requete =$base-> prepare('SELECT* FROM dossier WHERE id_dossier=:id_dossier ');
      $requete -> execute (array(':id_dossier'=>$_GET['id_dossier']));
      $donnees=$requete->fetch();
  
?>

<?php

if(isset($_POST['modifier']) and  !empty( $_POST['modifier']))
{
             
             
           $nom=$_POST['nom'];
           $description=$_POST['description'];
       
           $requete = $base -> prepare('UPDATE dossier SET nom_dossier=:nom_dossier,description=:description WHERE id_dossier=:id ');
           $requete -> execute(array(':nom_dossier'=>$nom,':description'=> $description, ':id'=>$_GET['id_dossier'] ));
           echo'<script>  confirm("le dossier à été modifier avec succès"); </script>';
}
?>

<html>
    <head>
        <title>Modifier dossier</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        
        
    </head>
<body  style="background-image:url(do.jpg)">
       <div class="contenaire_body">
       <center>
             <a href="ajouter_dossier.php" class="btn btn-primary">Ajouter </a>
             <a href="modifier_dossier.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_dossier.php" class="btn btn-primary">Supprimer </a>
           </center>
         
            <legend><strong style="color: white;background-color: rgb(0,0,0);">Modifier le dossier</legend>  </strong> 
         <div class="container"  >
                <div class="panel panel-primary" >
                  <div class="panel-heading" >Remplir les champs </div>
                    <div class="panel-body" >
                    <div class="formulaire">
                  
                          
                    <br>

<div class="formulaire">
      <form method="post" action="modification_dossier.php?id_dossier=<?php echo $donnees['id_dossier']?>" >
             
              
                 
                              <div class="dt">
                                         <label for="nom">Nom du dossier:</label><br>
                                        <input type="text" class="form-control" value="<?php echo $donnees['nom_dossier'] ?>"name="nom"   style="width:600px" />
                              </div>
                              <br>
                               <div class="dt">
                                         <label for="description">Description:</label><br>
                                         <textarea  name="description" placeholder="<?php echo $donnees['description'] ?>" class="form-control" style="width:600px"></textarea>
                              </div>
                              
                             
                              <br>
                              <div class="dt">
                      
                              <center> <input type="submit" name="modifier" class="btn btn-primary" 
                                  style="width:250px;height:50px;font-size:1.4em;border-radius:20px" value="modifier">
                              </center>
                 
                              </div>
                   
              
                               
                                 
                                         
     </form>
             
               </div>   
            
                    </div>
                     </div>
                       </div>
                         </div>
        
  <br>

           
          
       </div> 
<div class="wrapper">
     <div class="header">
        <div class="header-menu">
          <div class="title">IUG <span>ARCHIVES</span></div>
          
            <div class="sidebar-btn">
                <i class="fas fa-bars"><a href="accueil_admin.php" class="accueil"> Accueil</a></i>
            </div>
            <p class="aaa"  ><a href="deconnection.php" class="btn btn-primary" >DECONNEXION</a></p>
        </div>
     </div>
      <div class="sidebar">
        <div class="sidebar-menu">
           <center class="profile">
             <img src='logo_iug.jpg'>
             <p> <?php echo $_SESSION['login'];?></p>
           </center>
           <li class="item">
              <a href="gerer_archive.php" class="menu-btn">
              <i class="fas fa-desktop"></i><img src="logo_archive.png" width="30px" height="30px">&nbsp<span>Gestion des archives</span>
              </a>
           </li>
           <li class="item" id="messages">
              <a href="gerer_utilisateur.php" class="menu-btn">
                 <i class="fas fa-envelope"></i><img src="logo_user.png" width="30px" height="30px">&nbsp<span>Gestion des utilisateurs <i class="fas fa-chevron-down drop-down"></i></span>
              </a>
              
           </li>
           <li class="item" id="settings">
              <a href="gerer_service.php" class="menu-btn">
              <i class="fas fa-envelope"></i> <img src="logo_service.png" width="25px" height="25px">  <span> Gestion des services</span>
              </a>
              
           </li>
             
           
           <li class="item">
              <a href="gerer_dossier.php" class="menu-btn">
              <i class="fas fa-info-circle"></i><img src="logo_dossiers.png" width="30px" height="30px" style="color:white" >&nbsp<span>Gestion des dossiers</span>
              </a>
           </li>
        </div>
      </div>

        <div class="main-container-ajoutuser">
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <center >
        
        <center>
        
        <center>
        </div>
 </div>

    
</body>
</html>
