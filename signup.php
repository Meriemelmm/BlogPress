<?php
 $username="";
 $email="";
 $password="";
 $erreurs=[
   "username"=>"","email"=>"","password"=>""];


 print_r($erreurs);
    
// connect to database
// $connect = mysqli_connect('localhost', 'root', 'meriem04042003', 'blogpress');
// if (!$connect) {
//     echo 'Connection error: ' . mysqli_connect_error();
// } else { 
//     echo 'hellodddddddddddddddd';
// }
  //  htmlspecialchars():
  //explode ; string to array with splite somthing comme ,
// :   endforeach;
// :  endif;
//  saving data to database :
 
  
 
$isAlpha=true;
   
  
if (isset($_POST['submit'])) { 

    // Affiche l'email soumis
    echo "Formulaire soumis. L'email est : ";
    echo htmlspecialchars($_POST['email']);
    echo htmlspecialchars($_POST['username']);
    echo htmlspecialchars($_POST['password']);
    if(empty($_POST['email'])){
        echo" it's vide bro";
    }
    else{
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo " invalid";
        } else {
            echo " Email valide.";
            $email=$_POST['email'];
        }

    }


   if(empty($_POST['username'])){
     echo" userame is vide ";
   }
   else{
    for ($i = 0; $i < strlen($_POST['username']); $i++) {
    
        if (!(($_POST['username'][$i] >= 'a' && $_POST['username'][$i] <= 'z') || ($_POST['username'][$i] >= 'A' && $_POST['username'][$i] <= 'Z'))) {
            
            $isAlpha = false;
            break;  
        }
    }

  
    if ($isAlpha) {
        echo " alphabet"; 
        $username=$_POST['username'] ;
    } else {
        echo " not alphabet"; 
    }
   
   }

 if(empty($_POST['password'])){
    
 }
 else{
    if(strlen($_POST['password'])<8){
      $erreurs['password'] = 'ki wlo ';

    }
    else {
        echo" amo _sen" ;
        $password=$_POST['password'];
    }
  
 }
}
?>

    
   










    




































<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>* {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    /* Style du body */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        color: #333;
    }
    
    .container {
        width: 80%;
        margin: 0 auto;
    }
    
    header {
        background-color: #121125;
        color: white;
        padding: 20px 0;
    }
    
    header h1 {
        display: inline;
        margin-left: 20px;
    }
    
    nav ul {
        list-style-type: none;
        float: right;
        margin-right: 20px;
    }
    
    nav ul li {
        display: inline;
        margin-left: 15px;
    }
    
    nav ul li a {
        color: white;
        text-decoration: none;
    }
      
        /* Style du main */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }
        
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        
        .form-container h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .input-group {
            margin-bottom: 15px;
        }
        
        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .input-group input:focus {
            border-color: #f39c12;
            outline: none;
        }
        
        button {
            width: 100%;
            padding: 12px;
            background-color:#121125;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: #f39c12;
        }</style>
</head>
<body>
    <!-- <header>
        <div class="container">
            <h1>BlogPress</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="login.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header> -->
    <main>
        <section class="form-container">
            <h2>Inscription</h2>
            <form action="signup.php" method="POST">
                <div class="input-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" value="<?php   echo $username  ?>" >
                    <div class="erreur" style="color:red"><?php   echo $erreurs['username']?></div>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" value="<?php   echo $email?>">
                    <div class="erreur" style=" color:red"><?php   echo $erreurs['email']?></div>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="<?php echo $password?>" >
                    <div class="erreur" style="color:red"><?php   echo $erreurs['password']?></div>
                </div>
                <button type="submit" name="submit">S'inscrire</button>
            </form>
        </section>
    </main>



</body>
</html>