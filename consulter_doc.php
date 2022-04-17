
<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
  header('location: index.php');
}
 include("connecter_base.php");
?>
<?php include("nombre_connectes.php");?>
<?php
 $requete =$base->prepare("SELECT* FROM archive,naturedocument WHERE archive.id_naturedoc=naturedocument.id_naturedoc and id_service=:id_archive ");
 $requete -> execute (array(':id_archive'=> $_SESSION['s_service']));

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
                   echo'<center><hr> <strong> '.$count.'</strong> résultat trouvé pour <strong>'.$cherche.'</strong></hr></center><br><br>';
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
                                 echo'<hr> <strong> 0</strong> résultat trouvé pour <strong>'.$cherche.'</strong></hr>';
                             
                      }
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
              
                 </center>
             
              </div>
           </div>
     </div>
    </div>
   </div>
 
      <?php

    }
      ?>
    
   
        
 <div class="wrapper">
     <div class="header">
        <div class="header-menu">
          <div class="title">IUG <span>ARCHIVES</span></div>
          
            <div class="sidebar-btn">
                <i class="fas fa-bars"><a href="accueil_user.php" class="accueil"> Accueil</a></i>
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
              <a href="accueil_user.php" class="menu-btn">
               <img src="ho.png" width="30px" height="30px">&nbsp<span>Accueil</span>
              </a>
           </li>
           <li class="item" id="messages">
              <a href="consulter_doc.php" class="menu-btn">
               <img src="loupe.png" width="30px" height="30px">&nbsp<span>Consulter document <i class="fas fa-chevron-down drop-down"></i></span>
              </a>
              
           </li>
         
           
           
        </div>
      </div>
        <div class="main-container">
        
        </div>
        
 </div>
 </body>
</html>

