<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
 echo '<script>window.location.href = "index.php";</script>';
    exit();
}
 include("connecter_base.php");
?>
<?php include("nombre_connectes.php");?>
<?php
 $requete =$base->prepare("SELECT* FROM archive,naturedocument WHERE archive.id_naturedoc=naturedocument.id_naturedoc and id_service=:id_archive ");
 $requete -> execute (array(':id_archive'=> $_SESSION['s_service']));

  $idService = $_SESSION['s_service'];
$requeteS = $base->query("SELECT * FROM service WHERE id_service = $idService");
$requeteS->execute();
$reponseS = $requeteS->fetch(); 
 ?>
<html>
     <head>
         <title>consulter archive</title>

        <link rel="stylesheet" href="bootstrap.css">

         <link rel="stylesheet" href="style_consulter_doc.css">

      
     </head>
 <body style="background-image:url(f.jpg)">
    <br><br><br><br><br>
    
    <div class="legend"><legend>Consulter un document</legend></div><hr><br>
      <div class="formul" >
        <form action="consulter_doc.php" method="post" style="font-size:1.2em ;background-image:url(f.jpg);">
    
        
        <div style="margin-left:230px" class="col-sm-9 col-xs-9 header-right">
        <div id="search" class="input-group">
          <input type="search"  name="search" value="" placeholder="Enter your keyword ..." class="form-control input-lg" />
          <span class="input-group-btn">
          <input type="submit" name="recherche" class="btn btn-primary btn-lg"  value="Search"/>
          </span> </div>
          </div>
      <br>   <br><br>
  
                           
            Choisir le critère de recherche:
          <select name="selection" class="selection">
          <option value="nom_doc">nom du document</option>
            <option value="nature_du_doc">nature du document</option>
           
          </select>
      </form>
          <br><br>
          
      <?php
     
      if(isset($_POST['recherche']) && isset($_POST['search']) && $_POST['search'] != "" )
      { 
                 $cherche=preg_replace("#[^a-zA-Z ?0-9]#","",$_POST['search']);
               
                 if($_POST['selection']="nom du document")
                 { 
                  
                  
                         $requetee= $base ->  prepare(" SELECT *  FROM archive,naturedocument WHERE archive.id_naturedoc=naturedocument.id_naturedoc and  id_service= ? and  nom_archive LIKE ? ");
                         $requetee-> execute(array($_SESSION['s_service'],'%'.$cherche.'%'));
                         $count=$requetee->rowCount();
                
      
                         
    
       if($count>=1)
       {
                  echo '<hr><div class="result" style="font-size: 1.3em; text-align: left;"><strong style="font-size: 1.5em; color: green;">'.$count.'</strong> <strong>résultat trouvé pour</strong> <strong style="color: black; font-size: 1.5em;">' .$cherche. '</strong></div></hr>';
                       ?>
                       
                         <div class="result">
                         <div class="panel panel-primary"  style="width: 1000px" >
                    
                              <div class="panel-heading" style="font-size:1.4em; text-align: left">Resultat</div>
                             
                                  <div class="panel-body">
                                      <table class="table table-hover table-striped table-bordered">
                                          <thead>
                                              <tr  class="panel panel-info">
                                              <th >Document</th><th>Nom</th> <th >Date d'archivage</th><th>Date de création</th>
                                                 <th>Nature du document</th>
                                              </tr>
                                          </thead>
                                          
                                          <tbody >
                                        
                                                        <?php while($donnees=$requetee->fetch() ){ ?>
                                                         <tr class="panel panel-primary" >
                                                             
                                      
                                                               <td ><img src="<?php echo $donnees['chemin']?>" style="width: 80px;height: 80px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="<?php echo $donnees['chemin']?>" ><img src="tel.png"width="40px" height="40px" ></a></td>
                                                               <td ><?php echo $donnees['nom_archive']?> </td>
                                                              <td ><?php echo $donnees['date_archivage']?> </td>
                                                              <td ><?php echo $donnees['date_creation']?></td>
                                                              <td ><?php echo $donnees['libelle_naturedoc']?></td>
                                                              
                                                            
                                                            
                                                         </tr>
                                                  <?php } ?> 
                                          </tbody>
                                         
                                      </table>
                                 
                                    
                                    
                                 </div>
                              </div>
                        </div>
                       </div>
                     </div>
                      <?php  
                      } 
                      else
                      {
                             echo '<hr><div class="result" style="font-size: 1.3em; text-align: left;"><strong style="font-size: 1.5em; color: red;">0</strong> <strong>résultat trouvé pour</strong> <strong style="color: black; font-size: 1.5em;">' .$cherche. '</strong></div></hr>';
                                 ?>
                             <div class="result">
                         <div class="panel panel-primary"  style="width: 900px" >
                    
                              <div class="panel-heading" style="font-size:1.4em; text-align: left">No result</div>
                             
                                  <div class="panel-body">
                                         <table class="table table-hover table-striped table-bordered">
                                          <thead>
                                              <tr  class="panel panel-info">
                                              <th >Document</th><th>Nom</th> <th >Date d'archivage</th><th>Date de création</th>
                                                 <th>Nature du document</th>
                                              </tr>
                                          </thead>
                                          
                                          <tbody >
                                        
                                                       
                                                         <tr class="panel panel-primary" >
                                                             
                                      
                                                               <td ></td>
                                                               <td ></td>
                                                              <td > </td>
                                                              <td ></td>
                                                              <td ></td>
                                                              
                                                            
                                                            
                                                         </tr>
                                               
                                          </tbody>
                                         
                                      </table>
                                 
                                    
                                    
                                 </div>
                              </div>
                        </div>
                       </div>
                     </div>     
                                 
                             
                      <?php } ?>
                      ?>
               <?php
               
        }
     
      
     }
    else{
      ?>
           <div class="result">
      <div class="panel panel-primary"  style="width: 1000px" >
 
           <div class="panel-heading" style="font-size:1.4em">Resultat</div>
          
               <div class="panel-body">
                   <table class="table table-hover table-striped table-bordered">
                       <thead>
                           <tr  class="panel panel-info">
                           <th >Document</th><th>Nom</th> <th >Date d'archivage</th><th>Date de création</th>
                              <th>Nature du document</th>
                           </tr>
                       </thead>
                       
                       <tbody>
                     
                                     <?php while($reponse=$requete->fetch() ){ ?>
                                      <tr class="panel panel-primary" >
                                          
                   
                                            <td ><img src="<?php echo $reponse['chemin']?>" style="width: 80px;height: 80px">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="<?php echo $reponse['chemin']?>" ><img src="tel.png"width="40px" height="40px" ></a></td>
                                            <td ><?php echo $reponse['nom_archive']?> </td>
                                           <td ><?php echo $reponse['date_archivage']?> </td>
                                           <td ><?php echo $reponse['date_creation']?></td>
                                           <td ><?php echo $reponse['libelle_naturedoc']?></td>
                                           
                                          
                                         
                                      </tr>
                               <?php } ?> 
                       </tbody>
                      
                   </table>
              
                 
             
              </div>
           </div>
     </div>
    </div>
   </div>
 
      <?php

    }
      ?>
    
   
 <?php 
  include("title_site_user.php");
 ?>
    
 </body>
</html>

