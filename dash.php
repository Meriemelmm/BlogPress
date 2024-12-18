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
                <button class="btn">Ajouter un nouvel article</button>
                <button>  modifier</button>
                <button> supprimier</button>
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Vues</th>
                            <th>Commentaires</th>
                            <th>Likes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                <!-- Les lignes de tableau seront ajoutées ici dynamiquement -->
            </tbody>
                </table>
            </section>
        </main>

    </div>
    <table>
  <!-- En-tête du tableau -->
  <thead>
    <tr>
      <th>En-tête 1</th>
      <th>En-tête 2</th>
      <th>En-tête 3</th>
    </tr>
  </thead>
  
  <!-- Corps du tableau -->
  <tbody>
    <tr>
      <td>Cellule 1,1</td>
      <td>Cellule 1,2</td>
      <td>Cellule 1,3</td>
    </tr>
    <tr>
      <td>Cellule 2,1</td>
      <td>Cellule 2,2</td>
      <td>Cellule 2,3</td>
    </tr>
    <tr>
      <td>Cellule 3,1</td>
      <td>Cellule 3,2</td>
      <td>Cellule 3,3</td>
    </tr>
  </tbody>
  
  <!-- Pied de page du tableau (facultatif) -->
  <tfoot>
    <tr>
      <td>Footer 1</td>
      <td>Footer 2</td>
      <td>Footer 3</td>
    </tr>
  </tfoot>
</table>


   
</body>
</html>

   