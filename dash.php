<!-- #region -->
 
<?php 

//     <!-- CREATE TABLE Articles (
//     id INT AUTO_INCREMENT PRIMARY KEY,          -- ID unique de l'article, incrémenté automatiquement
//     titre VARCHAR(255) NOT NULL,                 -- Titre de l'article, chaîne de caractères avec une longueur maximale de 255
//     contenu TEXT NOT NULL,                       -- Contenu de l'article
//     likes INT DEFAULT 0,                         -- Nombre de likes, valeur par défaut de 0
//     views INT DEFAULT 0,                         -- Nombre de vues, valeur par défaut de 0
//     date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date de création, avec la date et l'heure actuelles par défaut
// ); -->

?>




















<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BlogPress</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>/* styles.css */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f9;
    color: #333;
}

/* DASHBOARD */
.dashboard {
    display: flex;
    flex-direction: column;
    height: 100vh;
}

/* HEADER */
header {
    background-color: #333;
    color: white;
    display: flex;
    justify-content: space-between;
    padding: 15px 30px;
    align-items: center;
}

header .logo h1 {
    font-size: 24px;
}

header nav ul {
    list-style-type: none;
    display: flex;
}

header nav ul li {
    margin-left: 30px;
}

header nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    padding: 20px;
    color: white;
    flex-shrink: 0;
}

.sidebar h3 {
    font-size: 20px;
    margin-bottom: 15px;
}

.sidebar ul {
    list-style-type: none;
}

.sidebar ul li {
    margin: 10px 0;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
}

.sidebar ul li a:hover {
    text-decoration: underline;
}

/* MAIN CONTENT */
main {
    flex-grow: 1;
    padding: 20px;
    display: flex;
    flex-direction: column;
}

/* OVERVIEW */
.overview h2 {
    margin-bottom: 20px;
    font-size: 24px;
}

.stats-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.stat-card {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.stat-card h3 {
    font-size: 18px;
    color: #555;
}

.stat-card p {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

/* CHART */
.charts {
    margin-top: 40px;
    text-align: center;
}

.charts canvas {
    max-width: 800px;
    margin: 0 auto;
}

/* ARTICLE MANAGEMENT */
.article-management {
    margin-top: 40px;
}

.article-management table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.article-management th, .article-management td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
}

.article-management th {
    background-color: #333;
    color: white;
}

.article-management td {
    background-color: #fff;
}

.article-management button {
    padding: 8px 16px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.article-management button:hover {
    background-color: #2980b9;
}
</style>
</head>
<body>
    <div class="dashboard">
        <!-- HEADER -->
        <header>
            <div class="logo">
                <h1>BlogPress</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Gestion des articles</a></li>
                    <li><a href="#">Déconnexion</a></li>
                </ul>
            </nav>
        </header>

       

            <!-- Article Management Section -->
            <section class="article-management">
    <h2>Gestion des Articles</h2>
    <div>
        <button class="btn" id="add">Ajouter un nouvel article</button>
        <form action="ajouter_article.php" id="form" method="POST" style="display:none">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" required><br><br>

            <label for="contenu">Contenu :</label>
            <textarea id="contenu" name="contenu" required></textarea><br><br>

            <label for="auteur">Auteur :</label>
            <input type="text" id="auteur" name="auteur" required><br><br>

            <input type="submit" value="Ajouter l'article">
        </form>
    </div> 

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Vues</th>
                <th>Commentaires</th>
                <th>Likes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cellule 1,1</td>
                <td>Cellule 1,2</td>
                <td>Cellule 1,3</td>
                <td>Cellule 1,2</td>
            </tr>
        </tbody>
    </table>
</section>

<script>
    // Récupérer les éléments du DOM
    const form = document.getElementById('form');
    const add = document.getElementById('add');
    const table = document.getElementsByTagName('table'); // collection, donc on cible le premier avec table[0]

    // Ajouter l'événement au bouton "Ajouter"
    add.addEventListener('click', () => {
        form.style.display = "block";  // Afficher le formulaire
        table[0].style.display = "none";  // Cacher le tableau
    });
</script>


