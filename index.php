<?php session_start(); ?>
<html>


<head>
<title>Authentification</title>

<link rel="stylesheet" href="css_authentification.css"/>
<style>
.alert {
  background-color: #f8d7da;
  color: #721c24;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #f5c6cb;
}

.alert ul {
  margin: 0;
  padding-left: 20px;
}

.alert li {
  list-style-type: disc;
}
.sign {
  background: none repeat scroll 0 0 #fff;
  border-radius: 8px;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
  filter: alpha(opacity = 80);
  opacity: 0.8;
  padding: 1.5em 0 1em;
  width: 22em;
  float: right;
}
.signin_button {


  border: 1px solid #c9C9c9;
  border-radius: 6px;


  cursor: pointer;
  font-size: 1.7em;
  color: white  ;
  background-color:rgba(19, 19, 200, 0.684) ;
  font-weight: bold;

  width:125px;
  height: 50px
}
.signup_button {


  border: 1px solid #c9C9c9;
  border-radius: 6px;


  cursor: pointer;
  font-size: 1.7em;
  color: white  ;
  background-color:rgb(12, 205, 48) ;
  font-weight: bold;

  width:125px;
  height: 50px
}
</style>

</head>

<body>
  <div class="sign">
    <span> <button class="signin_button"><a href="index.php" style="color: white; font-weight: bold;">Login</a></button> 
     <button class="signup_button"><a href="signUp.php " style="color: white; font-weight: bold;">Sign up</a></button></span>
   </div>
<table cellspacing="0" cellpadding="0" border="0" width="88%" height="100%">
  <tbody>
    
      <td align="center">
        

        <form method="post" action="index.php">

          <div class="login">
            
            <table>
                      <tr>
                               <div class="login_logo_iug">  <img src="fond_dossier.jpg" width="220px" height="120px"></div>
           
                  <br><br><br><br><br><br><br>
                       <h1 style="color:blue">  CONNEXION </h1>       
                      </tr>
             <tr>
                   <td class="login_label">
                  <label for="nom_utilisateur">
                    Username
                  </label>
                </td>    
             </tr>
             
             <tr>
               
                <td>
                  <input class="login_input" type="text" class="form-control"  name="nom_utilisateur"  placeholder="Entrez le nom d'utilisateur" required>
                </td>
              </tr>
             
             <tr>
                <td class="login_label">
                  <label for="password">
                    Password
                  </label>
                </td>      
             </tr>
             
              <tr>
                <td>
                  <input class="login_input" type="password" class="form-control" name="password"  placeholder="Entrez le mot de passe"required>
                </td>
              </tr>
              <tr>
               
              </tr>
              
              <tr>
                <td>
                      <br>
               <center>
                      <input class="login_button" type="submit" name="envoyer"
                    value="Connexion" >
               </center>
                </td>
              </tr>
              
              <tr style="text-align:center;">
                <td colspan="2">
                  
                  <a href="#" style="text-decoration:none;font-size:0.9em;">Forgot password</a>
                  
                </td>
            </tr>
          </table>
          <?php 
              include('enregistrer_authentification.php')
           ?>
        </form>
      </td>
     
    </tr>
  </tbody>
</table>



</body>
</html>

