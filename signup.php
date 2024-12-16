<?php

    
// connect to database
$connect = mysqli_connect('localhost', 'root', 'meriem04042003', 'blogpress');
if (!$connect) {
    echo 'Connection error: ' . mysqli_connect_error();
} else { 
    echo 'hellodddddddddddddddd';
}
//  htmlspecialchars():





    















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
            <form action="signup.php" method="POS'T">
                <div class="input-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" >
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input id="email" name="email">
                </div>
                <div class="input-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" >
                </div>
                <button type="submit" name="submit">S'inscrire</button>
            </form>
        </section>
    </main>
</body>
</html>