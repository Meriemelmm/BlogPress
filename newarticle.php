<?php
session_start();



$connect = mysqli_connect('localhost', 'root', '', 'blogpress');
if (!$connect) {
    echo ("Connection failed: " . mysqli_connect_error());
}

$titre = "";
$contenu = "";
$erreurs = ["titre" => "", "contenu" => ""];



if (isset($_POST['submit'])) {
    echo "hello";
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    echo  $titre;
    echo  $contenu;
    if (empty($titre)) {
        $erreurs['titre'] = " invalid ";
    } else {
        echo $titre;
    }

    if (empty($contenu)) {
        $erreurs['contenu'] = "yuk";
    } else {
        echo $contenu;
    }
    if (empty($erreurs['titre']) && empty($erreurs['contenu)'])) {
        $sql = "INSERT INTO articles(titre, contenu, id) VALUES ('$titre', '$contenu', {$_SESSION['id']})";

        // Exécution de la requête
        if (mysqli_query($connect, $sql)) {
            echo "L'article  été ajouté avec succès.";
            header("Location: newarticle.php?id=" . $_SESSION['id']);
            exit();
        } else {
            echo "Erreur : " . mysqli_error($connect);
        }
    }
}
//  les commontaires 
$showcomm="SELECT commontaires.content,commontaires.date_comment,articles.id_article,utilisateurs.id,
commontaires.id_commontaire 
FROM  commontaires JOIN articles ON commontaires.id_article=articles.id_article JOIn utilisateurs ON commontaires.id=utilisateurs.id WHERE utilisateurs.id={$_SESSION['id']}";
$showcommQuery=mysqli_query($connect,$showcomm);

































?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>*{
        box-sizing: border-box;
    }
        .btnss {

            display: flex;
    justify-content: space-between;
    padding: 20px;
        }

        /* Ajouter du style pour que le formulaire s'affiche proprement */
        form {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background-color:white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
           
            position: absolute;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #3498db;

        }

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








        /* ARTICLE MANAGEMENT */
        .article-management {
            margin-top: 40px;
        }

        .article-management table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .article-management th,
        .article-management td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .article-management th {
            background-color: #121125;
            color: white;
        }

        .article-management td {
            background-color: #fff;
        }

        button {
            padding: 8px 36px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px;

            cursor: pointer;
        }

        .dashboard-header {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    text-align: center;
    padding: 20px;
    background-color:  #121125;
    color: white;
    margin-top: 20px;
  
}
     

    </style>

</head>

<body>





<h2 class="dashboard-header">DASHBOARD</h2>


    <div class="btnss">

        <div>
       
         
            <button class="btn" id="add">Ajouter un nouvel article</button>

            <!-- Formulaire caché par défaut -->
            <form action="newarticle.php" id="form" method="POST" style="display:none; margin-top: 20px;">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required><br><br>
                <div class="erreurs"><?php echo $erreurs['titre'] ?></div>

                <label for="contenu">Contenu :</label>
                <textarea id="contenu" name="contenu" required></textarea><br><br>
                <div class="erreurs"><?php echo $erreurs['contenu'] ?></div>

                <button name="submit"> add your article</button>
                <button id="cancel"> cancel</button>
            </form>
        </div>

    <a href="index.php"> <button> retour</button></a>
    </div>




    <!-- Article Management Section -->
    <section class="article-management">
        <h2>Article Management</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Views</th>
                    <th>Likes</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM articles WHERE id = {$_SESSION['id']}";
                $result = mysqli_query($connect, $sql);

                if ($result) {
                    while ($fetched = mysqli_fetch_assoc($result)) {
                       
                        echo "
                            <tr>
                                <td>" . $fetched['id_article'] . "</td>
                                <td>" . $fetched['titre'] . "</td>
                                <td>" . substr($fetched['contenu'],0,100)  . "</td>
                                <td>" . $fetched['views'] . "</td>
                                <td>" . $fetched['likes'] . "</td>
                                <td>" . $fetched['date_creation'] . "</td>
                                <td>
                                    <a href='modifier.php?editedid={$fetched['id_article']}'><button>Modifier</button></a>
                                    <a href='delette.php?deletedid={$fetched['id_article']}'> <button>Supprimer</button></a>
                                </td>
                            </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </section>

<!-- Oui, cette version simplifiée de la blague est parfaitement adaptée pour LinkedIn ! Elle est légère, amusante et professionnelle, tout en étant facile à comprendre. Voici comment vous pourriez la présenter dans un post LinkedIn :
Pourquoi SQL est-il le meilleur ami des développeurs ?

Parce qu'il sait toujours comment "choisir" les bonnes réponses ! 😄 -->
    <!-- commontaire -->
    <section class="article-management">
        <h2>commentaire management</h2>

        <table>
            <thead>
                <tr>
                    <th>ID de commont</th>
                    <th>commontaire</th>
                    <th>id_article</th>
                     <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
               

              
                    while ($showcommfetch=mysqli_fetch_assoc($showcommQuery)) {
                        echo "
                            <tr>
                                <td>" . $showcommfetch['id_commontaire'] . "</td>
                              
                                <td>" . substr($showcommfetch['content'],0,100)  . "</td>
                                  <td>" .$showcommfetch['id_article'] . "</td>
                               <td>" . $showcommfetch['date_comment'] . "</td>
                                <td>
                         <a href='detet.php?removedid={$showcommfetch['id_commontaire']}'> <button>Supprimer</button></a>
                                </td>
                            </tr>";
                    }
                
                ?>
            </tbody>
        </table>
    </section>


    <script>
        // Récupérer les éléments du DOM
        const form = document.getElementById('form');
        const add = document.getElementById('add');
        const table = document.getElementById('article-table');
        const formule = document.getElementById('formule');


        // Ajouter l'événement au bouton "Ajouter"
        add.addEventListener('click', () => {

            form.style.display = "block";


        });
        cancel = document.getElementById('cancel');
        cancel.addEventListener('click', () =>
            form.style.display = "none"

        )
        modifier = document.getElementById('modifier');
        modifier.addEventListener('click', () => {

            formule.style.display = "block";


        });
    </script>



</body>

</html>