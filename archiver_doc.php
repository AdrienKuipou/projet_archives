<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   header('location: index.php');
}
?>

<?php
 include("connecter_base.php");
include("enregistrer_archiver_doc.php");
?>
<?php 
      $requete_ser =$base-> query('SELECT* FROM service ');
      $requete_user =$base-> query('SELECT* FROM typeutilisateur ');
      $requete_dos =$base-> query('SELECT* FROM dossier ');
      $requete_natdoc =$base-> query('SELECT* FROM naturedocument ');
?>

     
<html>
    <head>
        <title>archiver un document</title>
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_ajouter_user.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    </head>
<body style="background-image:url(f.jpg)">
      <?php 
  include("title_site.php");
 ?>
       <div class="contenaire_body" style="padding-top: 0;">
       
            <center>
             <a href="archiver_doc.php" class="btn btn-primary">Archiver un document </a>
             <a href="modifier_archive.php" class="btn btn-primary">Modifier </a>
             <a href="supprimer_archive.php" class="btn btn-primary">Supprimer </a>
           </center>
        
            <legend><strong style="color: white;background-color: #4CCEE8;">Archiver un document</strong>  </legend>   
           
         <div class="container"  >
                <div class="panel panel-primary" >
                  <div class="panel-heading" >Remplir les champs </div>
                    <div class="panel-body" >
                    <div class="formulaire">
                  
                          
                    <br>

<div class="formulaire">
      <form method="post" action="archiver_doc.php" enctype="multipart/form-data" >
             
              
                 
                              <div class="dt">
                                         <label for="nom">Nom:</label><br>
                                         <input type="text" class="form-control" name="nom"  style="width:600px" />
                              </div>
                              <br>
                               <div class="dt">
                                         <label for="date_archivage">Date d'archivage:</label><br>
                                         <input type="date" class="form-control" name="date_archivage" style="width:600px"/>
                              </div>
                              
                              <br>
                             <div  class="dt">
                                         <label for="date_creation">Date de création:</label><br>
                                        <input type="date" class="form-control" name="date_creation" style="width:600px" />
                              </div>
                              <br>
        
                              <div  class="dt">
                                       <label for="chemin">Choisir un document:</label><br>
                                         <input type="file" class="form-control-file" name="photos"  style="width:600px"/>
                      
                              </div>
                              <br>
                              <div class="dt">
                                <label for="service">Service:</label>
                                 <select name="s_service" class="form-control" class="selection">
                                 <?php
                                 while($donnees_ser=$requete_ser->fetch()) 
                                  {

                                   ?>
                                   <option value="<?= $donnees_ser['id_service'] ?>"><?php echo $donnees_ser['libelle_service']; ?></option>
                                   <?php }?>
                                 </select>
                                         
                              </div>
                              <br>
                               <div class="dt">
                                         <label for="dossier">Dossier:</label><br>
                                         <select name="s_dossier" class="form-control" class="selection">
                                         <?php
                                  while($donnees_dos=$requete_dos->fetch()) 
                                  {

                                   ?>
                                   <option value="<?= $donnees_dos['id_dossier'] ?>"><?php echo $donnees_dos['nom_dossier']; ?></option>
                                   <?php }?>
                                         </select>
                              </div>
                              
                              <br>
                             <div  class="dt">
                             <label for="nature_doc">Nature du document:</label><br>
                                         <select name="s_nature_doc" class="form-control" class="selection">
                                         <?php
                                  while($donnees_natdoc=$requete_natdoc->fetch()) 
                                  {

                                   ?>
                                   <option value="<?= $donnees_natdoc['id_naturedoc'] ?>"><?php echo $donnees_natdoc['libelle_naturedoc']; ?></option>
                                   <?php }?>
                                       
                                         </select>
                              </div>
                              <br>
                              <div class="dt">
                       
                                 <center> <input type="submit" name="envoyer" class="btn btn-primary" style="width:250px;height:50px;font-size:1.4em;border-radius:20px" value="ajouter"></center>
                              </div>
                   
              
                               
                                 
                                         
     </form>
             
               </div>   
            
                    </div>
                     </div>
                       </div>
                         </div>
        
  

           
  
      
<script type="text/javascript">
 $(document).ready(function(){
    $(".sidebar-btn").click(function(){});
    $(".wrapper").toggleclass("collapse");
 })
   </script>
    
</body>
</html>
