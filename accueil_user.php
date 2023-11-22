<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
  echo '<script>window.location.href = "index.php";</script>';
    exit();
}
/* include("nombre_connectes.php");*/

include("connecter_base.php");

 $idService = $_SESSION['s_service'];
$requeteS = $base->query("SELECT * FROM service WHERE id_service = $idService");
$requeteS->execute();
$reponseS = $requeteS->fetch(); 
?>
<html>
     <head>
         <title>consulter archive</title>
         <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style_accueil_user.css">
       <style>
          .wrapper .header
{
    z-index: 1;
    background: #22242A;
    position: fixed;
    width: calc(100% - 0%);
    height: 70px;
    display: flex;
    top: 0;
}
.wrapper .sidebar
{
    z-index: 1;
    background: #1e2025;
    position: fixed;
    top: 70px;
    width: 225px;
    height: calc(100% - 0%);
    transition-property: width;
    overflow-y: auto;
}
          </style>

     </head>
 <body>


 <table>
      <tr>
      

       <td>
          <div id="bloc2"  >
                <div class="panel panel-primary" style="height:200px;margin-left:450px;margin-top:190px;width:400px"  >
                  <div class="panel-heading" > </div>
                    <div class="panel-body" >
                   
               </div>   
            
                    </div>
 
          </div>
       </td> 
     </tr>
  </table>
       
  <?php 
  include("title_site_user.php");
 ?>
    
 </body>
</html>
