<?php session_start(); ?>
<?php
 include("connecter_base.php");
?>
<?php
      $requete_ser =$base-> query('SELECT* FROM service ');
      $requete_user =$base-> query('SELECT* FROM typeutilisateur ');
?>
<html>


<head>
<title>Authentification</title>

<link rel="stylesheet" href="signup.css"/>
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
</style>

</head>

<body>
  <div class="sign">
   <span> <button class="signin_button"><a href="index.php" style="color: white; font-weight: bold;">Login</a></button> 
    <button class="signup_button"><a href="signUp.php" style="color: white; font-weight: bold;">Sign up</a></button></span>
  </div>

<table cellspacing="0" cellpadding="0" border="0" width="88%" height="100%">
  <tbody>
    
      <td align="center">
        

        <form method="post" action="signUp.php">

          <div class="login">
            
            <table>
                      <tr>
                             
           
                       <h1 style="color:rgb(12, 205, 48)">  SignUp </h1>       
                      </tr>
             <tr>
                   <td class="login_label">
                  <label for="nom_utilisateur">
                    FistName:
                  </label>
                </td>    
             </tr>
             
             <tr>
               
                <td>
                  <input class="login_input" type="text" class="form-control"  name="nom_user" >        
                </td>
              </tr>
             
             <tr>
                <td class="login_label">
                  <label for="password">
                    LastName:
                  </label>
                </td>      
             </tr>
             <tr>
                <td>
                  <input class="login_input" type="text" class="form-control"  name="prenom_user" >
                </td>
             </tr>

             <tr>
              <td class="login_label">
                <label for="password">
                  Username:
                </label>
              </td>      
           </tr>
           <tr>
              <td>
                <input class="login_input" type="text" class="form-control"  name="login" required>
              </td>
           </tr>

           <tr>
            <td class="login_label">
              <label for="password">
                Email:
              </label>
            </td>      
         </tr>
         <tr>
            <td>
              <input class="login_input" type="email" class="form-control" name="email" >
            </td>
         </tr>

         <tr>
          <td class="login_label">
            <label for="password">
              Phone:
            </label>
          </td>      
       </tr>
       <tr>
          <td>
            <input class="login_input" type="text" class="form-control" name="tel_user" >
          </td>
       </tr>

       <tr>
        <td class="login_label">
          <label for="password">
            Poste:
          </label>
        </td>      
     </tr>
     <tr>
        <td>
          <input class="login_input" type="text" class="form-control" name="poste" >
        </td>
     </tr>

     <tr>
      <td class="login_label">
        <label for="password">
          Service:
        </label>
      </td>      
   </tr>
   <tr>
      <td>
        <select name="s_service" class="form-control" class="selection login_label" required>
          <?php
          while($donnees_ser=$requete_ser->fetch()) 
          {

           ?>
           <option value="<?= $donnees_ser['id_service'] ?>"><?php echo $donnees_ser['libelle_service']; ?></option>
           <?php }?>
          </select>
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
      <input class="login_input" type="password" class="form-control" name="mot_de_passe"  required>
    </td>
   </tr>

   <tr>
    <td class="login_label">
      <label for="password">
        Confirm password
      </label>
    </td>      
   </tr>
   <tr>
    <td>
      <input class="login_input" type="password" class="form-control" name="cf_mot_de_passe" required>
    </td>
   </tr>

              <tr>
               
              </tr>
              
              <tr>
                <td>
                      <br>
               <center>
                      <input class="login_button" type="submit" name="ajouter" class="btn btn-success" value="Create an account">
               </center>
                </td>
              </tr>
              
          </table>
           <?php
              include('enregistrer_signup.php');
           ?>
        </form>
      </td>
     
    </tr>
  </tbody>
</table>



</body>
</html>
