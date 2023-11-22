 <div class="wrapper">
     <div class="header">
        <div class="header-menu">
          <div class="title">UTR <span>ARCHIVES</span></div>
          
            <div class="sidebar-btn">
                <i class="fas fa-bars"><a href="accueil_user.php" class="accueil"> Accueil</a></i>
            </div>
            <p class="aaa"  ><a href="deconnection.php" class="btn btn-primary" >DECONNEXION</a></p>
        </div>
     </div>
      <div class="sidebar">
        <div class="sidebar-menu">
           <center class="profile">
             <img src='archives-logo-2.jpg'>
            <p> <?php echo $_SESSION['login'];?></p>
            <br>
            <p> <?php echo $requeteS['libelle_service'];?></p>
           
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
