
<?php
session_start();
if(!$_SESSION['mot_de_passe'])
{
   header('location: index.php');
}
?>
<?php include("nombre_connectes.php");?>
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
               <img src="logo_accueill.png" width="30px" height="30px">&nbsp<span>Accueil</span>
              </a>
           </li>
           <li class="item" id="messages">
              <a href="consulter_doc.php" class="menu-btn">
               <img src="logo_consulter.png" width="30px" height="30px">&nbsp<span>Consulter document <i class="fas fa-chevron-down drop-down"></i></span>
              </a>
              
           </li>
         
           
           
        </div>
      </div>
        <div class="main-container">
        
     
 </div>
 </body>
</html>
