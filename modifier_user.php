<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   header('location: index.php');
?>
<?php
 include("connecter_base.php");
?>
<?php
 $requete =$base->query('SELECT* FROM utilisateur,service WHERE utilisateur.id_service=service.id_service ');
 $requete -> execute ();
?>
<html>
    <head>
        <title>Modifier utilisateur</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        
    </head>
<body  style="background-image:url(u.jpg)">
   <div class="contenaire_body">
       <center>
          <a href="ajouter_user.php" class="btn btn-primary">Ajouter </a>
             <a href="modifier_user.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_user.php" class="btn btn-primary">Supprimer </a>
       </center>
       <legend><strong style="color: white;background-color: rgb(0,0,0);">Modifier un utilisateur</legend></strong>   
      <br><br>

      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <input type="text" name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="button" class="btn btn-primary btn-lg"><span>Search</span></button>
          </span> </div>
          <br>
      
       <div class="panel panel-info"  style="width: 1000px" >
  
            <div class="panel-heading" style="font-size:1.7em">Listes des utilisateurs</div>
           
                <div class="panel-body" >
                    <table class="table table-hover table-striped table-dark  table-bordered" >
                    <thead >
                    
                            <tr  class="panel panel-info">
                           
                           <th><center>Nom</center></th>  <th><center>Prenom</center></th> <th><center>Email</center></th><th><center>Téléphone</center></th><th><center>Service</center></th><th><center>Poste</center></th>  <th><center>Login</center></th> <th><center>Action</center></th>
                           
                            </tr>
                           
                        </thead>
                        
                        <tbody style="font-style: italic;" >
                      
                                      <?php while($reponse=$requete->fetch()){ ?>
                                       <tr >
                                            <td ><?php echo $reponse['nom_user']?> </td>
                                           <td ><?php echo $reponse['prenom_user']?> </td>
                                           <td ><?php echo $reponse['email']?></td>
                                           <td ><?php echo $reponse['tel_user']?> </td>
                                           <td ><?php echo $reponse['libelle_service']?> </td>
                                           <td ><?php echo $reponse['poste_user']?> </td>
                                           <td ><?php echo $reponse['login_user']?> </td>
                                      
                                          
                                           <td>
                                           <a href="modification_user.php?id_user=<?php echo $reponse['id_user']?>" class="btn btn-primary">
                                                  Modifier
                                              </a>
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