<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   header('location: index.php');
}
?>
<?php
 include("connecter_base.php");
?>
<?php 
      $requete_ser =$base-> query('SELECT* FROM service ');
      $requete_user =$base-> query('SELECT* FROM typeutilisateur ');
?>
<html>
    <head>
        <title>Ajouter utilisateur</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        
        <style>
.alert {
  background-color: #f8d7da;
  color: #721c24;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #f5c6cb;
}

.alert ul {
  margin: 0;
  padding-left: 20px;
}

.alert li {
  list-style-type: disc;
}
</style>
    </head>
<body style="background-image:url(u.jpg)">
       <div class="contenaire_body">
     <center>
          <a href="listuser.php" class="btn btn-primary">Liste </a>
          <a href="ajouter_user.php" class="btn btn-primary">Ajouter </a>
             <a href="modifier_user.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_user.php" class="btn btn-primary">Supprimer </a>
      </center>
            <legend><strong style="color: white;background-color: rgb(0,0,0);">Ajout d'un utilisateur</strong></legend> 
            <?php
               include('enregistrer_ajouter_user.php');
            ?>
         <div class="container"  >
                <div class="panel panel-primary" >
                  <div class="panel-heading" >Remplir les champs </div>
                    <div class="panel-body" >
                    <div class="formulaire">
                   

<div class="formulaire">
      <form method="post" action="ajouter_user.php" >
             
              
                 
                              <div class="dt">
                                         <label for="nom">Nom:</label><br>
                                         <input type="text" class="form-control" name="nom_user"  style="width:600px" />
                              </div>
                              <br>
                               <div class="dt">
                                         <label for="prenom">Prenom:</label><br>
                                         <input type="text" class="form-control" name="prenom_user" style="width:600px" />
                              </div>
                              
                              <br>
                             <div  class="dt">
                                         <label for="login">Login:</label><br>
                                        <input type="text" class="form-control" name="login" style="width:600px" />
                              </div>

                              <br>
                             
                             <div  class="dt">
                                         <label for="Email">Email:</label><br>
                                        <input type="email" class="form-control" name="email" style="width:600px" />
                              </div>
                              <br>

                              <div  class="dt">
                                         <label for="tel">Téléphone:</label><br>
                                        <input type="text" class="form-control" name="tel_user" style="width:600px" />
                              </div>
                              <br>

                              
                              <div  class="dt">
                                       <label for="poste"> Poste:</label><br>
                                         <input type="text" class="form-control" name="poste"  style="width:600px" />
                      
                              </div>

                              <br>
                              <div  class="dt">
                                 <label for="type_user">Type Utilisateur:</label>
                                  <select name="s_type_user" class="form-control" class="selection">
                                  <?php
                                  while($donnees_user=$requete_user->fetch()) 
                                  {

                                   ?>
                                   <option value="<?= $donnees_user['id_typeutilisateur'] ?>"><?php echo $donnees_user['libelle_typeutilisateur']; ?></option>
                                   <?php }?>
                                  </select>
                              </div>

                              <br>
                              <div  class="dt">
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
                             <div  class="dt">
                                         <label for="mot_de_passe">Mot de passe:</label>
                                        <br><input type="password" class="form-control" name="mot_de_passe" style="width:600px" />
                              </div>
                              <br>

                              <div  class="dt">
                                         <label for="cf_mot_de_passe">Confirmer mot de passe:</label>
                                        <br><input type="password" class="form-control" name="cf_mot_de_passe" style="width:600px" />
                              </div>
                              <br>
                              <div class="dt">
                      
                      <center> <input type="submit" name="ajouter" class="btn btn-primary" style="width:250px;height:50px;font-size:1.4em;border-radius:20px" value="ajouter"></center>
                 
                 
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
      
        </div>
 </div>

    
</body>
</html>
