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
 $requete =$base->query('SELECT* FROM service ');
 $requete -> execute ();
 ?>
<html>
    <head>
        <title>Modifier un service</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        
    </head>
<body style="background-image:url(se.jpg)">
   <div class="contenaire_body">
          <center>
             <a href="ajouter_service.php" class="btn btn-primary">Ajouter </a>
             <a href="modifier_service.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_service.php" class="btn btn-primary">Supprimer </a>
           </center>
       <legend><strong style="color: white;background-color: rgb(0,0,0);">Modifier un service<strong></legend>  <hr> 
      <br><br><br>
      
       <div class="panel panel-info"  style="width: 900px" >
  
            <div class="panel-heading" style="font-size:1.4em">Liste des services</div>
           
                <div class="panel-body">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr  class="panel panel-info">
                            <th >id_service</th>  <th >libelle_service</th> <th >description</th><th style="width: 10px" >Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                      
                                      <?php while($reponse=$requete->fetch()){ ?>
                                       <tr >
                                            <td ><?php echo $reponse['id_service']?> </td>
                                           <td ><?php echo $reponse['libelle_service']?> </td>
                                           <td ><?php echo $reponse['description']?></td>
                                           <td>
                                           <a href="modification_service.php?id_service=<?php echo $reponse['id_service']?>" class="btn btn-primary">
                                                  Modifier
                                           </td>
                                       </tr>
                                <?php } ?> 
                        </tbody>
                       
                    </table>
               
                  </center>
           </div>
              </div>
                </div>
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
        
        
        <center>
        </div>
 </div>

    
</body>
</html>