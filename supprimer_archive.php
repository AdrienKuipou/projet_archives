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
 $requete =$base->query('SELECT* FROM archive,naturedocument,dossier,service WHERE archive.id_naturedoc=naturedocument.id_naturedoc 
     and archive.id_dossier=dossier.id_dossier and archive.id_service=service.id_service ');
 $requete -> execute ();
?>
<html>
    <head>
        <title>Modifier une archive</title>
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




    <form action="supprimer_archive.php" method="post"> 
      <div class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <input type="search" name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />   
       <span class="input-group-btn">
          <input type="submit" name="recherche" class="btn btn-primary btn-lg"  value="Search"/>
          </span>
          </div>
	</div>
    </form>
         <br><br><br><br><br>
                                
                                
                                
                                
                                <?php
     
      if(isset($_POST['recherche']) && isset($_POST['search']) && $_POST['search'] != "" )
      { 
                 $cherche=preg_replace("#[^a-zA-Z ?0-9]#","",$_POST['search']);
               
               
                  
                  
                         $requetee= $base ->  prepare(" SELECT *  FROM archive,naturedocument,dossier,service WHERE archive.id_naturedoc=naturedocument.id_naturedoc and archive.id_dossier=dossier.id_dossier and archive.id_service=service.id_service AND archive.nom_archive LIKE ?");
                         $requetee-> execute(array('%'.$cherche.'%'));
                         $count=$requetee->rowCount();
                
      
                         
    
       if($count>=1)
       {
       echo '<hr><span style="font-size: 1.3em;"><strong style="font-size: 1.5em; color: green;">'.$count.'</strong> <strong>résultat trouvé pour</strong> <strong style="color: black; font-size: 1.5em;">' .$cherche. '</strong></span></hr>';
                   
                       ?>
                       
                         <div class="result">
                         <div class="panel panel-primary"  style="width: 900px" >
                    
                              <div class="panel-heading" style="font-size:1.4em">Resultat</div>
                             
                                  <div class="panel-body">
                                      <table class="table table-hover table-striped table-bordered">
                                          <thead>
                                              <tr  class="panel panel-info">
                                               <th >ID</th> <th >Document</th><th>Nom</th> <th >Date d'archivage</th><th>Date de création</th>
                              <th>Nature du document</th><th>Dossier</th><th>Service</th><th style="width: 10px" >Action</th>
                                              </tr>
                                          </thead>
                                          
                                          <tbody >
                                        
                                                        <?php while($donnees=$requetee->fetch() ){ ?>
                                                         <tr class="panel panel-primary" >
                                                             
                                      				<td ><?php echo $donnees['id_archive']?> </td>
                                                               <td ><img src="<?php echo $donnees['chemin']?>" style="width: 80px;height: 80px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="<?php echo $donnees['chemin']?>" ><img src="loupe.png"width="40px" height="40px" ></a></td>
                                                                <td ><?php echo $donnees['nom_archive']?> </td>
						                   <td ><?php echo $donnees['date_archivage']?> </td>
						                   <td ><?php echo $donnees['date_creation']?></td>
						                   <td ><?php echo $donnees['libelle_naturedoc']?></td>
						                   <td ><?php echo $donnees['nom_dossier']?></td>
						                   <td ><?php echo $donnees['libelle_service']?></td>
                                                             <td>
                                           <a onclick="return confirm('Etes vous sur de vouloir supprimer cet archive ?');"  class='btn btn-danger'
                                                    href="enregistrer_supprimer_archive.php?id_archive=<?php echo $donnees['id_archive']?>">
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
                     </div>
                      <?php  
                      } 
                      else
                      {
                                echo '<hr><span style="font-size: 1.3em;"><strong style="font-size: 1.5em; color: red;">0</strong> <strong>résultat trouvé pour</strong> <strong style="color: black; font-size: 1.5em;">' .$cherche. '</strong></span></hr>';
                                 ?>
                             <div class="result">
                         <div class="panel panel-primary"  style="width: 900px" >
                    
                              <div class="panel-heading" style="font-size:1.4em">No result</div>
                             
                                  <div class="panel-body">
                                      <table class="table table-hover table-striped table-bordered">
                                          <thead>
                                              <tr  class="panel panel-info">
                                               <th >ID</th> <th >Document</th><th>Nom</th> <th >Date d'archivage</th><th>Date de création</th>
                              <th>Nature du document</th><th>Dossier</th><th>Service</th><th style="width: 10px" >Action</th>
                                              </tr>
                                          </thead>
                                          
                                          <tbody >
                                        
                                                        
                                                         <tr class="panel panel-primary" >
                                                             
                                      				<td > </td>
                                                               <td ></td>
                                                                <td ></td>
						                   <td ></td>
						                   <td ></td>
						                   <td ></td>
						                   <td ></td>
						                   <td ></td>
                                                            <td>
				                           
				                           </td>
                                                            
                                                         </tr>
                                                 
                                          </tbody>
                                         
                                      </table>
                                 
                                    </center>
                                    
                                 </div>
                              </div>
                        </div>
                       </div>
                     </div>     
                                 
                             
                      <?php } ?>
                      ?>
               <?php
               
        
     
      
     }
    else{
      ?>
           <div class="result">
      <div class="panel panel-primary"  style="width: 900px" >
 
           <div class="panel-heading" style="font-size:1.4em">Liste des documents archivés</div>
          
               <div class="panel-body">
                   <table class="table table-hover table-striped table-bordered">
                       <thead>
                           <tr  class="panel panel-info">
                            <th >ID</th> <th >Document</th><th>Nom</th> <th >Date d'archivage</th><th>Date de création</th>
                              <th>Nature du document</th><th>Dossier</th><th>Service</th><th style="width: 10px" >Action</th>
                           </tr>
                       </thead>
                       
                       <tbody>
                     
                                     <?php while($reponse=$requete->fetch() ){ ?>
                                      <tr class="panel panel-primary" >
                                          
                   						   <td ><?php echo $reponse['id_archive']?> </td>
                                            <td ><img src="<?php echo $reponse['chemin']?>" 
                                            style="width: 80px;height: 80px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="<?php echo $reponse['chemin']?>" ><img src="loupe.png"width="40px" height="40px" ></a></td>
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
   <?php } ?>

<?php 
  include("title_site.php");
 ?>
    
</body>
</html>
