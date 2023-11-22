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
 $requete =$base->query('SELECT* FROM dossier ');
 $requete -> execute ();
 ?>
<html>
    <head>
        <title>Modifier un dossier</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        
    </head>
<body  style="background-image:url(do.jpg);">
   <div class="contenaire_body">
         <center>
             <a href="ajouter_dossier.php" class="btn btn-primary">Ajouter </a>
             <a href="modifier_dossier.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_dossier.php" class="btn btn-primary">Supprimer </a>
           </center>
       <legend><strong style="color: white;background-color: rgb(0,0,0);">Modifier un dossier</strong></legend><hr> 
      <br><br>
    
      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <input type="text" name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="button"  class="btn btn-warning btn-lg" ><span>Search</span></button>
          </span> </div>
          <br>
      

       <div class="panel panel-info"  style="width: 900px" >
  
            <div class="panel-heading" style="font-size:1.4em">Liste des dossiers</div>
           
                <div class="panel-body">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr  class="panel panel-info">
                            <th>ID</th>  <th >nom_dossier</th>  <th >date_création</th> <th >description</th><th style="width: 10px" >Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                      
                                      <?php while($reponse=$requete->fetch()){ ?>
                                       <tr >
                                            <td ><?php echo $reponse['id_dossier']?> </td>
                                           <td ><?php echo $reponse['nom_dossier']?> </td>
                                           <td ><?php echo $reponse['date_creation']?></td>
                                           <td ><?php echo $reponse['description']?></td>
                                       
                                           <td>
                                           <a href="modification_dossier.php?id_dossier=<?php echo $reponse['id_dossier']?>" class="btn btn-warning">
                                                  Modifier
                                           </td>
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
     <?php 
  include("title_site.php");
 ?>
    
</body>
</html>
