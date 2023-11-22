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
  $requete =$base->query('SELECT* FROM utilisateur,service,typeutilisateur WHERE service.id_service=utilisateur.id_service AND utilisateur.id_typeutilisateur=typeutilisateur.id_typeutilisateur ORDER BY id_user DESC');
 $requete -> execute ();
?>
<html>
    <head>
        <title>List utilisateur</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        
    </head>
<body  style="background-image:url(u.jpg)">
   <div class="contenaire_body">
       <center>
         <a href="listuser.php" class="btn btn-primary">Liste </a>
          <a href="ajouter_user.php" class="btn btn-primary">Ajouter </a>
             <a href="modifier_user.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_user.php" class="btn btn-primary">Supprimer </a>
       </center>
       <legend><strong style="color: white;background-color: rgb(0,0,0);">List utilisateurs</legend></strong>   
      <br><br>

      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <input type="text" name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />
          <span class="input-group-btn">
          <button type="button" class="btn btn-primary btn-lg"><span>Search</span></button>
          </span> </div>
          <br>
      
       <div class="panel panel-success table-responsive"  style="width: 1200px" >
  
            <div class="panel-heading" style="font-size:1.7em">Liste des utilisateurs</div>
           
                <div class="panel-body" >
                    <table class="table table-hover table-striped table-dark  table-bordered table-condensed" >
                    <thead >
                    
                            <tr  class="panel panel-info">
                           
                           <th><center>Nom</center></th>  <th><center>Prenom</center></th> <th><center>Email</center></th><th><center>Téléphone</center></th><th><center>Service</center></th><th><center>Poste</center></th> <th><center>Login</center></th> <th><center>User type</center></th>  <th><center>Autorisation</center></th> <th><center>Action</center></th>
                           
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
                                            <td ><?php echo $reponse['libelle_typeutilisateur']?> </td>
                                           <td ><?php echo $reponse['autorisation']?> </td>
                                      
                                          
                                    <td> <?php if ($reponse['autorisation'] == "" || $reponse['autorisation'] == "refused") { ?> <center> <a onclick="return confirm('Are you sure you want to give him permission to connect?');" href="modification_listuser.php?id_user=<?php echo $reponse['id_user'] ?>" class="btn btn-primary"> Authorize </a> </center> <?php } else { ?> <center> <a onclick="return confirm('Are you sure you want to block access?');" href="modification_listuser.php?id_user=<?php echo $reponse['id_user'] ?>" class="btn btn-danger"> Block access </a> </center> <?php } ?> </td>
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
