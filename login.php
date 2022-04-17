<?php  session_start(); ?>
<?php include('fonction_debug.php');?>
<?php
    $base = new PDO('mysql:host=localhost;dbname=ista','root','madrida2',
                                       array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION));

 if(isset($_POST['envoyer'] ))
                      {
                        $error=array();
                         $nom_utilisateur=$_POST['nom_utilisateur'];
                         
                         $requete = $base ->prepare('SELECT*  FROM utilisateur WHERE nom_user=:nom_user');
                         $requete -> execute(array(':nom_user'=>$nom_utilisateur));
                         $reponse= $requete -> fetch();
                         
                       
                         if(!$reponse)
                         {
                                 
                                 $error['nom_utilisateur']="nom d'utilisateur incorrecte" ;    
                         }
                         else
                         {
                              if($_POST['password'] == $reponse['mot_de_passe'])
                              {
                              
                                $_SESSION['nom_user']=$reponse['nom_user'];
                                $_SESSION['mot_de_passe']=$reponse['mot_de_passe'];
                                header('location:accueil_administrateur.php');
                           }
                              else
                              {
                               
                                $error['mot de passe']="mot de passe incorrecte" ;
                              }
                         }
                      }
                    
?>
  <?php if(!empty($error)):?>
                        <div class="alert">
                                  
                        <?php foreach($error as $erroné): ?>
                          <ul>
                                   <li><?=$erroné;  ?></li>
                          <?php endforeach; ?>
                           </ul>
                          </div>
                          <?php endif;?>
<html>
     <head>
        <title>login</title>
        <style>
        *{
            margin: 0;
            border: 0;
        }
        body{
            background : rgb(0,146,146);
        }
        .form{
            background: rgba(255,255,255,0.37);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            backdrop-filter: blur(3.0px);
            -webkit-backdrop-filter: blur(3.0px);
            border-radius:10px;
            border: 1px solid rgba(255,255,255,0.18);
            width:300px;
            height: 400px;
            padding:20px;
            position: absolute;
            top: 24%;
            left: 50%;
            transform: translate(-50%, -50px);
            

        }
        .form h3{
            color:white;
            font-size: 35px;
            position: absolute;
            left: 50%;
             width:100%;
             text-align: center;
             transform: translate(-50%,-0%);
             outline: none;
        }
        .form input{
            color:white;
            width:80%;
            position: relative;
            left:50%;
            top: 15%;
            transform: translate(-50%,-0%);
            margin-top: 20px;
            padding: 10px;
            outline: none;
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.17);
            backdrop-filter: blur(3.0px);
            -webkit-backgrop-filter: blur(255,255,0.18);
            border-radius:10px;
            border:1px solid rgba(255,255,255,0.18);
        }
        
        .form button{
            color:white;
            width:80%;
            position: relative;
            left:50%;
            top: 56%;
            transform: translate(-50%,-0%);
            margin-top: 20px;
            padding: 10px;
            outline: none;
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.17);
            backdrop-filter: blur(3.0px);
            -webkit-backgrop-filter: blur(255,255,0.18);
            border-radius:10px;
            border:1px solid rgba(255,255,255,0.18);
            cursor:pointer;
        }
        .cube0
        {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            backdrop-filter: blur(3.0px);
            -webkit-backgrop-filter: blur(255,255,0.18);
            border-radius:10px;
            border:1px solid rgba(255,255,255,0.18);
            cursor:pointer;
            width:150px;
            height:150px;
            position:absolute;
            top:55%;
            left:70% ;
            transform: rotate(30deg);
            z-index: 9999;
        }
        .cube1
        {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            backdrop-filter: blur(3.0px);
            -webkit-backgrop-filter: blur(255,255,0.18);
            border-radius:10px;
            border:1px solid rgba(255,255,255,0.18);
            cursor:pointer;
            width:150px;
            height:150px;
            position:absolute;
            top:54%;
            left:1% ;
            transform: rotate(27deg);
        
        }

        .cube2
        {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            backdrop-filter: blur(3.0px);
            -webkit-backgrop-filter: blur(255,255,0.18);
            border-radius:10px;
            border:1px solid rgba(255,255,255,0.18);
            cursor:pointer;
            width:150px;
            height:150px;
            position:absolute;
            top:8%;
            left:70% ;
            transform: rotate(-35deg);
           
        }

        .cube3
        {
            background: rgba(255,255,255,0.15);
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
            backdrop-filter: blur(3.0px);
            -webkit-backgrop-filter: blur(255,255,0.18);
            border-radius:10px;
            border:1px solid rgba(255,255,255,0.18);
            cursor:pointer;
            width:150px;
            height:150px;
            position:absolute;
            top:0%;
            left:0% ;
            transform: rotate(-35deg);
            z-index: 999;
        }
        
        <?php
          bask
         ?>
        
        </style>


     </head>
     <body>
     <form action="login.php" method="post">
     <div class="form">
       <h3>Welcome Back!</h3>
       <input type="text" name="nom_utilisateur" placeholder="Username..." />
       <input type="password" name="password" placeholder="Password..." />
     <button> <input type="submit" class="button" name="envoyer"value="Submit"></button>
     <div class="cube0"></div>
     
     <div class="cube1"></div>
     <div class="cube2"></div>
     <div class="cube3"></div>
   
    </form>
     </body>
</html>
