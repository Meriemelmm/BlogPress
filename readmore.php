<?php
include'confg.php';
$readArticle = $_GET['readmoreid'];
echo $readArticle;
$affiche="SELECT  articles.titre, articles.contenu, articles.likes, articles.views,  articles.date_creation,utilisateurs.username FROM articles JOIN utilisateurs ON articles.id=utilisateurs.id WHERE id_article='$readArticle'";
$afficheQuery=mysqli_query($connect,$affiche);


// views   --------------------------------------------------------------------------------------------------

$views="UPDATE   articles SET views=views+1 where id_article='$readArticle' ";
$viewsQuery=mysqli_query($connect,$views);
// likes----------------------------------------------------------------------------------------------------
if(isset($_POST['like'])){
   $likes="UPDATE articles SET  likes=likes+1 where id_article='$readArticle'";
   $likesQuery=mysqli_query($connect,$likes);
}


$affichefetch=mysqli_fetch_assoc($afficheQuery);
//  les commontaires ------------------------------------------------
if(isset($_POST['envoyer'])){
    $comment = $_POST['commentaire']; 
    $commentaire = "INSERT INTO commontaires (content, id_article) 
    VALUES ('$comment', '$readArticle')";

// Exécution de la requête
$commentaireQuery = mysqli_query($connect, $commentaire);

// Vérification si l'insertion a réussi
if ($commentaireQuery) {
echo "Commentaire ajouté avec succès !";
} else {
echo "Erreur lors de l'ajout du commentaire.";
}
}
$afichecommont = "
    SELECT commontaires.content, articles.id
    FROM commontaires 
    JOIN articles ON commontaires.id_article = articles.id 
    WHERE articles.id = '$readArticle'
";

// Exécuter la requête
$afichecommontQuery = mysqli_query($connect, $afichecommont);


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

.article-content{
    line-break: anywhere;
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
    line-break: anywhere;
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
.custom-button {
    background-color:  #121125; /* Couleur de fond */
    color: white; /* Couleur du texte */
    font-size: 16px; /* Taille du texte */
    padding: 12px 24px; /* Espacement intérieur du bouton */
    border: none; /* Retirer les bordures */
    border-radius: 8px; /* Coins arrondis */
    cursor: pointer; /* Changer le curseur en main quand on survole */
    /* margin:; */
  
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    unicode-bidi: isolate;
}




    </style>
</head>
<body>
<a href="index.php">
    <button class="custom-button">Retour</button>
</a>
 <?php
    

        echo" 
        <div class='article-container'>
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
        <div style='display:flex; gap:20px'>
    <p><strong>Likes :</strong>  " . $affichefetch['likes'] . " </p><form action='' method='POST'>
         <button class='like-button' style=' /* Couleur de fond */
  color: white; /* Couleur du texte */
  font-size: 20px;
  margin-top:5px;
 /* Taille du texte */
  /* Espacement autour du texte */
  border: none; /* Retirer les bordures */
  border-radius: 5px; /* Coins arrondis */
  cursor: pointer; /* Changer le curseur en main */
 /* Effet de transition */' name='like'>👍  </button>
    
    </form></div>
       
           
            <p><strong>Vues :</strong> " . $affichefetch['views'] . "</p>
        </div>";
        while($fetchcommnt=mysqli_fetch_assoc($afichecommontQuery)){ echo"    <!-- Section des commentaires -->
        <div class='comments-section'>
            <h3>Commentaires</h3>
            <div class='comment'>
                <p><strong>Marie L.</strong> 
                 " .$fetchcommnt ['content']. "
</p>
            </div>
            <div class='comment'>
                <p><strong>Paul G.</strong> : Je suis d'accord, mais il manque quelques informations.</p>
            </div> <form class='comment-form' method='POST'>
                <textarea placeholder='Ajouter un commentaire...'  name='commentaire'  required></textarea><br>
                <button type='submit' name='envoyer'>Envoyer</button>
            </form>
        </div>
    </div>";
}

   



        
     
    
    
    
    
    
    ?>
 
            
 
    

    
</body>
</html>

