
<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   header('location: index.php');
}
?>
<?php include("nombre_connectes.php");?>
<html>
    <head>
        <title>gérer utilisateur</title>
     
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_gerer_utilisateur.css">
        
    </head>
<body  style="background-image:url(u.jpg)">

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
        <div class="main-containerE">
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <center >
        <div class="container" >
                <div class="panel panel-info margetop" style=" ">
                  <div class="panel-heading">Opération sur un utilisateur :</div>
                    <div class="panel-body" >
                   
             <a href="ajouter_user.php" class="btn btn-primary">Ajouter </a><br><br>
             <a href="modifier_user.php" class="btn btn-primary">Modifier </a><br><br>
             <a href="supprimer_user.php" class="btn btn-primary">Supprimer </a>
       

                    </div>
                     </div>
                       </div>
                         </div>
        <center>
        </div>
 </div>

    
</body>
</html>