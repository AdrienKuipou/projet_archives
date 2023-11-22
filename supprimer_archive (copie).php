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
  
?>
<?php
$requete =$base->query('SELECT* FROM archive,naturedocument,dossier,service WHERE archive.id_naturedoc=naturedocument.id_naturedoc 
and archive.id_dossier=dossier.id_dossier and archive.id_service=service.id_service ');
$requete -> execute ();
?>
<html>
    <head>
        <title>Supprimer une archive</title>
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
       <legend ><strong style="color: white;background-color: #4CCEE8;">Supprimer une archive</strong></legend>   <hr>
      <br>

      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <input type="text" name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="button" class="btn btn-danger btn-lg"><span>Search</span></button>
          </span> </div>
          <br>

       <div class="panel panel-info"  style="width: 900px" >
  
            <div class="panel-heading" style="font-size:1.4em">Liste des documents archivés</div>
           
                <div class="panel-body">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr  class="panel panel-info">
                            <th >ID</th>  <th >Document</th><th>Nom</th> <th >Date d'archivage</th><th>Date de création</th>
                              <th>Nature du document</th><th>Dossier</th><th>Service</th><th style="width: 10px" >Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                      
                                      <?php while($reponse=$requete->fetch()){ ?>
                                       <tr >
                                            <td ><?php echo $reponse['id_archive']?> </td>
                                            <td ><img src="<?php echo $reponse['chemin']?>" style="width: 50px;height: 50px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="<?php echo $reponse['chemin']?>" ><img src="loupe.png"width="30px" height="30px" ></a></td>
                                            <td ><?php echo $reponse['nom_archive']?> </td>
                                           <td ><?php echo $reponse['date_archivage']?> </td>
                                           <td ><?php echo $reponse['date_creation']?></td>
                                           <td ><?php echo $reponse['libelle_naturedoc']?></td>
                                           <td ><?php echo $reponse['nom_dossier']?></td>
                                           <td ><?php echo $reponse['libelle_service']?></td>

                                          
                                        
                                           <td>
                                           <a onclick="return confirm('Etes vous sur de vouloir supprimer cet archive ?');"  class='btn btn-danger'
                                                    href="enregistrer_supprimer_archive.php?id_archive=<?php echo $reponse['id_archive']?>">
                                                   Supprimer
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
