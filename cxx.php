<?php
// Initialisation des variables
$username = "";
$email = "";
$password = "";
$erreurs = [
    "username" => "",
    "email" => "",
    "password" => ""
];

$role="visiteur";
echo $role;


// Connexion à la base de données
$connect = mysqli_connect('localhost', 'root', 'meriem04042003', 'blog');
if (!$connect) {
    echo('Connection error: ' . mysqli_connect_error());
}

// Vérification de la soumission du formulaire
if (isset($_POST['submit'])) {
    // Validation et traitement des données

    // Validation de l'email
    if (empty($_POST['email'])) {
        $erreurs['email'] = "L'email est requis.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $erreurs['email'] = "Email invalide.";
    } else {
        $email = mysqli_real_escape_string($connect, $_POST['email']);
    }

    // Validation du nom d'utilisateur
    if (empty($_POST['username'])) {
        $erreurs['username'] = "Le nom d'utilisateur est requis.";
    } else {
        $username = $_POST['username'];
        $isAlpha = true;
        for ($i = 0; $i < strlen($username); $i++) {
            if (!(($username[$i] >= 'a' && $username[$i] <= 'z') || ($username[$i] >= 'A' && $username[$i] <= 'Z'))) {
                $isAlpha = false;
                break;
            }
        }

        if (!$isAlpha) {
            $erreurs['username'] = "Le nom d'utilisateur doit contenir uniquement des lettres.";
        } else {
            $username = mysqli_real_escape_string($connect, $username);
        }
    }

    // Validation du mot de passe
    if (empty($_POST['password'])) {
        $erreurs['password'] = "Le mot de passe est requis.";
    }
     else{ 
        if (strlen($_POST['password']) <= 8) {
        $erreurs['password'] = "Le mot de passe doit comporter au moins 8 caractères.";
    } 
    elseif(preg_match("#[0-9]+ #",$_POST['password'])){
        $erreurs['password'] ="<br/>  at least one digits ";

      
                      
    }
    elseif(preg_match("#[a-z]+ #",$_POST['password'])){
        $erreurs['password'] ="<br/>  at least onchar ";

                      
    }
    elseif(preg_match("#[A-Z]+ #",$_POST['password'])){
        $erreurs['password'] ="<br/>  at least one OUPPER ";

        
                    
    }
    else{ $password = mysqli_real_escape_string($connect, $_POST['password']); }
//  vaalidated rolessss;




if($_POST['role']=== "auteur"){
    $role=mysqli_real_escape_string($connect, "auteur");}
    else{


        $role=mysqli_real_escape_string($connect,"visiteur");
    }



   
    if (empty($erreurs['username']) && empty($erreurs['email']) && empty($erreurs['password'])) {
        $sql = "INSERT INTO utilisateurs ( username, email,password,role) VALUES ('$username', '$email','$password','$role')";

      
        if (mysqli_query($connect, $sql)) {
            echo "L'utilisateur a été ajouté avec succès.";
        } else {
            echo "Erreur : " . mysqli_error($connect);
        }
    }
 
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
    <header>
        <div class="container">
            <h1>BlogPress</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="login.php">Connexion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section class="form-container">
            <h2>Inscription</h2>
            <form action="cxx.php" method="POST">
                <div class="input-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>">
                    <div class="erreur" style="color:red"><?php echo $erreurs['username']; ?></div>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                    <div class="erreur" style="color:red"><?php echo $erreurs['email']; ?></div>
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>">
                    <div class="erreur" style="color:red"><?php echo $erreurs['password']; ?></div>
                </div>
                <div class="input-group">
                    <label for="password">role</label>
                    <input type="text" id="role" name="role" >

                    

                  
                </div>
                <button type="submit" name="submit">S'inscrire</button>
            </form>
        </section>
    </main>
</body>
</html>
