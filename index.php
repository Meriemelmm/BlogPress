<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>   * {
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
    .articles-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px 0;
        }
        
        .article-card {
            background-color: white;
            margin: 10px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }
        
        .article-card:hover {
            transform: scale(1.05);
        }
        
        .article-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .article-content {
            padding: 15px;
        }
        
        .article-content h2 {
            font-size: 1.5rem;
            color: #333;
        }
        
        .article-excerpt {
            font-size: 1rem;
            color: #777;
            margin: 10px 0;
        }
        
        .article-stats {
            font-size: 0.9rem;
            color: #555;
        }
        
        .read-more {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: #121125;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .read-more:hover {
            background-color:#121125;
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
                    <li><a href="signup.php">Inscription</a></li>
                </ul>
            </nav>
        </div>
    </header> 
    <section class="articles-list">
        <article class="article-card">
            <img src="https://via.placeholder.com/300x200" alt="Image de l'article">
            <div class="article-content">
                <h2>Titre de l'article</h2>
                <p class="article-excerpt">Ceci est un extrait de l'article pour donner un aperçu du contenu...</p>
                <div class="article-stats">
                    <span>Vues: 120</span> | <span>Commentaires: 5</span>
                </div>
                <a href="article.html" class="read-more">Lire plus</a>
            </div>
        </article>
        <article class="article-card">
            <img src="https://via.placeholder.com/300x200" alt="Image de l'article">
            <div class="article-content">
                <h2>Titre de l'article 2</h2>
                <p class="article-excerpt">Extrait de l'article pour donner un aperçu intéressant...</p>
                <div class="article-stats">
                    <span>Vues: 90</span> | <span>Commentaires: 3</span>
                </div>
                <a href="article.html" class="read-more">Lire plus</a>
            </div>
        </article>
        <article class="article-card">
            <img src="https://via.placeholder.com/300x200" alt="Image de l'article">
            <div class="article-content">
                <h2>Titre de l'article 2</h2>
                <p class="article-excerpt">Extrait de l'article pour donner un aperçu intéressant...</p>
                <div class="article-stats">
                    <span>Vues: 90</span> | <span>Commentaires: 3</span>
                </div>
                <a href="article.html" class="read-more">Lire plus</a>
            </div>
        </article>
        <article class="article-card">
            <img src="https://via.placeholder.com/300x200" alt="Image de l'article">
            <div class="article-content">
                <h2>Titre de l'article 2</h2>
                <p class="article-excerpt">Extrait de l'article pour donner un aperçu intéressant...</p>
                <div class="article-stats">
                    <span>Vues: 90</span> | <span>Commentaires: 3</span>
                </div>
                <a href="article.html" class="read-more">Lire plus</a>
            </div>
        </article>
       
       
      

    </section>
</body>
</html>