<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   echo '<script>window.location.href = "index.php";</script>';
    exit();
}
?>
  
  <?php  include("nombre_connectes.php");

$retoure=$base->query('SELECT nom_user,prenom_user,libelle_service from connectes,utilisateur,service WHERE utilisateur.id_user=connectes.id_user and utilisateur.id_service=service.id_service');
   
?>
<html>
     <head>
         <title>consulter archive</title>
          <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_accueil_admin.css">
     </head>
 <body>


    <table>
      <tr>
        <td>
            <div id="bloc1"  >
                <div class="panel panel-primary"  style="height:260px,width:300px" >
                  <div class="panel-heading" ><strong style="color:white">Utilisateurs</strong><strong  style="color:#4CCEE8"> Connectés</strong> </div>
                    <div class="panel-body" >
                   <div style="font-size:3em"><center > <?php echo '<strong >'.$donnees['nbre_entrees'].'</strong>'; ?></center></div><br>
                   <p style="font-size:1.1em;"><strong  style="color:rgb(0,128,192);font-size:1.3em;">L</strong>istes des  <strong  style="color:rgb(0,128,192);font-size:1.1em;">U</strong>tilisateurs <strong style="color:rgb(0,128,192);font-size:1em;">C</strong>onnectés</p>
                   
                   
                    <?php while($donnee=$retoure->fetch()){?>
                   
                           
                      <ul><li><?php echo '<button class="navbar-toggler" style="background-color:green,width:1500px,height:70px" type="button" ></button><strong style="color:green">'
                          .$donnee['nom_user'].$donnee['prenom_user'].'</strong>&nbsp ( du &nbsp'.$donnee['libelle_service'].'&nbsp)';?></li></ul>
                    <?php }?>
                    
               </div>   
              
                    </div>
 
            </div >         
       </td>

       <td>
          <div id="bloc2"  >
                <div class="panel panel-primary" style="height:200px"  >
                  <div class="panel-heading" > </div>
                    <div class="panel-body" >
                   
               </div>   
            
                    </div>
 
          </div>
       </td> 
     </tr>
  </table>
  



  <table>
      <tr>
        <td>
            <div id="bloc1"  >
                <div class="panel panel-primary"  style="height:200px" >
                  <div class="panel-heading" > </div>
                    <div class="panel-body" >
                 
               </div>   
            
                    </div>
 
            </div >         
       </td>
       <td>
          <div id="bloc2"  >
                <div class="panel panel-primary" style="height:200px"  >
                  <div class="panel-heading" > </div>
                    <div class="panel-body" >
                   
               </div>   
            
                    </div>
 
          </div>
       </td> 
     </tr>
  </table>
  
  
       
     
        
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
            <strong> <p> <?php echo $_SESSION['login'];?></p></strong>
           </center>
           <li class="item">
              <a href="gerer_archive.php" class="menu-btn">
               <img src="logo_archive.png" width="30px" height="30px">&nbsp<span>Gestion des archives</span>
              </a>
           </li>
           <li class="item" id="messages">
            <a href="gerer_utilisateur.php" class="menu-btn">
            <i></i> <img src="logo_user.png" width="30px" height="30px">&nbsp<span>Gestion des utilisateurs <i class="fas fa-chevron-down drop-down"></i></span>
              </a>
              
           </li>
           <li class="item" id="settings">
              <a href="gerer_service.php" class="menu-btn">
                  <img src="logo_service.png" width="25px" height="25px">  <span> Gestion des services</span>
              </a>
              
           </li>
             
           
           <li class="item">
              <a href="gerer_dossier.php" class="menu-btn">
               <img src="logo_dossiers.png" width="30px" height="30px" style="color:white" >&nbsp<span>Gestion des dossiers</span>
              </a>
           </li>
        </div>
      </div>
        <div class="main-container">
        
        </div>
 </div>
 </body>
</html>
