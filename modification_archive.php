<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   header('location: index.php');
}
?>



<?php 
      include("connecter_base.php");
      $requete_dos =$base-> query('SELECT* FROM dossier ');
      $requete_ser =$base-> query('SELECT* FROM service ');
      $requete_natdoc =$base-> query('SELECT* FROM naturedocument ');
      $requete= $base -> query('SELECT* FROM archive,dossier,service,naturedocument WHERE archive.id_dossier=dossier.id_dossier
       and   archive.id_service=service.id_service and archive.id_naturedoc');
        $donnees=$requete->fetch();
?>
<html>
    <head>
        <title>modifier le document</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        
    </head>
<body style="background-image:url(f.jpg)">
       <div class="contenaire_body">
       
            <center>
             <a href="archiver_doc.php" class="btn btn-primary">Archiver un document </a>
             <a href="modifier_archive.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_archive.php" class="btn btn-primary">Supprimer </a>
           </center>
        
            <legend><strong style="color: white;background-color: #4CCEE8;">Modifier le document </strong> </legend>   
           
         <div class="container"  >
                <div class="panel panel-primary" >
                  <div class="panel-heading" >Remplir les champs </div>
                    <div class="panel-body" >
                    <div class="formulaire">
                
                          
                    <br>

<div class="formulaire">
      <form method="post" action="modification_archive.php?id_archive=<?php echo $_GET['id_archive']?>" >
             
              
                 
                              <div class="dt">
                                         <label for="nom">Nom:</label><br>
                                         <input type="text" class="form-control" name="nom" value="<?php echo $donnees['nom_archive'] ?>"  style="width:600px" />
                              </div>
                              <br>
                               <div class="dt">
                                         <label for="date_archivage">Date d'archivage:</label><br>
                                         <input type="date" class="form-control" name="date_archivage" value="<?php echo $donnees['date_archivage'] ?>" style="width:600px"/>
                              </div>
                              
                              <br>
                             <div  class="dt">
                                         <label for="date_creation">Date de création:</label><br>
                                        <input type="date" class="form-control" name="date_creation" value="<?php echo $donnees['date_creation'] ?>" style="width:600px" />
                              </div>
                              <br>
        
                              <div  class="dt">
                                       <label for="chemin">Choisir un document:</label><br>
                                         <input type="file" class="form-control" name="choix_doc" value="<?php echo $donnees['chemin'] ?>"  style="width:600px"/>
                      
                              </div>
                              <br>
                              <div class="dt">
                                <label for="service">Service:</label>
                                 <select name="s_service" class="form-control" class="selection">
                                 <?php
                                  while($donnees_ser=$requete_ser->fetch()) 
                                  {

                                   ?>
                                   <option value="<?= $donnees_ser['id_service'] ?>"><?php echo $donnees_ser['libelle_service']; ?></option>
                                   <?php }?>
                                 </select>
                                         
                              </div>
                              <br>
                               <div class="dt">
                                         <label for="dossier">Dossier:</label><br>
                                         <select name="dossier" class="form-control" class="selection">
                                         <?php
                                  while($donnees_dos=$requete_dos->fetch()) 
                                  {

                                   ?>
                                   <option value="<?= $donnees_dos['id_dossier'] ?>"><?php echo $donnees_dos['nom_dossier']; ?></option>
                                   <?php }?>
                                           
                                         </select>
                              </div>
                              
                              <br>
                             <div  class="dt">
                             <label for="nature_doc">Nature du document:</label><br>
                                         <select name="s_nature_doc" class="form-control" class="selection">
                                         <?php
                                  while($donnees_natdoc=$requete_natdoc->fetch()) 
                                  {

                                   ?>
                                   <option value="<?= $donnees_natdoc['id_naturedoc'] ?>"><?php echo $donnees_natdoc['libelle_naturedoc']; ?></option>
                                   <?php }?>
                                         </select>
                              </div>
                              <br>
                              <div class="dt">
                       
                                 <center> <input type="submit" name="modifier" class="btn btn-primary" style="width:250px;height:50px;font-size:1.4em;border-radius:20px" value="modifier"></center>
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