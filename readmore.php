<?php
include'confg.php';
$readArticle = $_GET['readmoreid'];
echo $readArticle;
$affiche="SELECT  articles.titre, articles.contenu, articles.likes, articles.views,  articles.date_creation,utilisateurs.username FROM articles JOIN utilisateurs ON articles.id=utilisateurs.id WHERE id_article='$readArticle'";
$afficheQuery=mysqli_query($connect,$affiche);




$views="UPDATE   articles SET views=views+1 where id_article='$readArticle' ";
$viewsQuery=mysqli_query($connect,$views);
echo "hello views:".$viewsQuery;

$affichefetch=mysqli_fetch_assoc($afficheQuery)

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Article</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.article-container {
    max-width: 800px;
    margin: 50px auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.article-title {
    font-size: 2em;
    margin-bottom: 20px;
}

.author-info p {
    font-size: 0.9em;
    color: #555;
}

.article-content {
    font-size: 1.1em;
    margin-bottom: 30px;
}

.interactions {
    margin-bottom: 20px;
}

.comments-section {
    margin-top: 40px;
}

.comments-section h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.comment {
    background-color: #f9f9f9;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

.comment-form textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
}

.comment-form button {
    padding: 10px 15px;
    background-color: #121125;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.comment-form button:hover {
    background-color: #121125;
}

    </style>
</head>
<body>
    <?php
    

        echo"  <div class='article-container'>
        <!-- Titre de l'article -->
        <h1 class='article-title'>" . $affichefetch['titre'] . "</h1>
        
        <!-- Informations sur l'auteur et la date -->
        <div class='author-info'>
            <p><strong>Auteur :</strong> " . $affichefetch['username'] . "</p>
            <p><strong>Publié le :</strong> " . $affichefetch['date_creation'] . "</p>
        </div>
        
        <!-- Contenu de l'article -->
        <div class='article-content'>
            <p>
                " . $affichefetch['contenu'] . "
            </p>
          
        </div>
        
        <!-- Informations sur les interactions -->
        <div class='interactions'>
            <p><strong>Likes :</strong> " . $affichefetch['likes'] . "</p>
            <p><strong>Vues :</strong> " . $affichefetch['views'] . "</p>
        </div>

        <!-- Section des commentaires -->
        <div class='comments-section'>
            <h3>Commentaires</h3>
            <div class='comment'>
                <p><strong>Marie L.</strong> : Très bon article, j'ai appris beaucoup de choses !</p>
            </div>
            <div class='comment'>
                <p><strong>Paul G.</strong> : Je suis d'accord, mais il manque quelques informations.</p>
            </div>
            <form class='comment-form'>
                <textarea placeholder='Ajouter un commentaire...' ></textarea><br>
                <button type='submit'>Envoyer</button>
            </form>
        </div>
    </div>";
        
     
    
    
    
    
    
    ?>
    
</body>
</html>

