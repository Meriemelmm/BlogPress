<?php
include 'confg.php';
//  table erreurs :
$erreurs=[
    "username"=>"","password"=>""
];
print_r($erreurs);

 if(isset($_POST['connecter'])){
                 

 echo" helo";
 $sql='SELECT id, username,email,password FROM utilisateurs';
//  make query and get result 

$result=mysqli_query($connect,$sql);
//  fetch the reulting ro as array
 $utilisateurs=mysqli_fetch_all ($result,MYSQLI_ASSOC);
 
 
 
 print_r($utilisateurs); 
 $utilisateur_trouve = false;


$username_post =  mysqli_real_escape_string($connect,$_POST['username']);
$password_post =  mysqli_real_escape_string($connect, $_POST['password']);

foreach ($utilisateurs as $user) {
    

    if ($user['username'] === $username_post)
            { echo"hello";
                $utilisateur_trouve =true;
       
         if ($password_post=== $user['password']) {
           
           echo "Connexion réussie !"; 
           $utilisateur_trouve =true;
           header("location:index.php");
           exit();
           break;
        }
        else{
            $erreurs['password'] =" invqlid";
            $utilisateur_trouve =true;
           
            break;
       
        }
      
          
       }  
       if( !$utilisateur_trouve ){
        $erreurs['username']="n existe pas le username";
       }
 


       
     }}






   
    
    
    
    
    
    
    
    
    

 

 
  
  


 













































?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style> 
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
      body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        background-color: #f4f4f4;
    }
    
    .container {
        width: 80%;
        margin: 0 auto;
    }
    
    header {
        background-color:#121125;
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
    main {
            display: flex;
            justify-content: center;
            align-items: center;
            justify-items: center;
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
        }
        
        /* Style du footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }</style>
</head>
<body>
    <header>
        <div class="container">
            <h1>BlogPress</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="signup.php">Inscription</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="form-container">
            <h2>Connexion</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username">
                <div class="erruer" style="color:red"> <?php echo ($erreurs['username']) ?></div>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <div class="erreur" style="color:red"> <?php echo$erreurs['password']?></div>
                </div>
                <button type="submit" name="connecter">Se connecter</button>
            </form>
        </section>
    </main> 
</body>
</html>