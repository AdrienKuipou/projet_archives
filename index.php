
<html>


<head>
<title>Authentification</title>

<link rel="stylesheet" href="css_authentification.css"/>
<style>
.alert{
  background:#4CCEE8;
  width:250px;
  height:20px;
  border-radius:50%;
  color:black;
}
</style>

</head>

<body>

<table cellspacing="0" cellpadding="0" border="0" width="88%" height="100%">
  <tbody>
    
      <td align="center">
        

        <form method="post" action="index.php">

          <div class="login">
            
            <table>
                      <tr>
                               <div class="login_logo_iug">  <img src="logo_iug.JPG" width="220px" height="120px"></div>
           
                  <br><br><br><br><br><br><br>
                       <h1 style="color:blue">  CONNEXION </h1>       
                      </tr>
             <tr>
                   <td class="login_label">
                  <label for="nom_utilisateur">
                    Nom d'utilisateur
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
                    Mot de passe
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
                  
                  <a href="#" style="text-decoration:none;font-size:0.9em;">mot de passe oublié</a>
                  
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
