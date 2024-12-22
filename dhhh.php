
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
 <style>
    /* General Body and Font Settings */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
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
    border-radius: 8px;
}

/* Button Styling */
.btn-back, .btn {
    background-color: #121125;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-back:hover, .btn:hover {
    background-color:;
}

.btnss {
    display: flex;
    justify-content: space-between;
    padding: 20px;
}

/* Form Styling */
form {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

form input, form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

form button {
    background-color: #121125;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
}

form button:hover {
    background-color: #121125;
}

.erreurs {
    color: red;
    font-size: 12px;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}

.comment-management {
    margin-top: 40px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .btnss {
        flex-direction: column;
        align-items: flex-start;
    }

    form {
        width: 100%;
    }

    table, th, td {
        font-size: 14px;
    }
}
button {
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 20px;

            cursor: pointer;
            position: center;
        }

 </style>
</head>

    







<body>

    <h2 class="dashboard-header">DASHBOARD</h2>

    <div class="btnss">
        <a href="index.php"><button class="btn-back">Retour</button></a>

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

                <button name="submit">Ajouter l'article</button>
                <button id="cancel">Annuler</button>
            </form>
        </div>
    </div>

   

    <script>
        const form = document.getElementById('form');
        const add = document.getElementById('add');
        const cancel = document.getElementById('cancel');

        add.addEventListener('click', () => {
            form.style.display = "block";
        });

        cancel.addEventListener('click', () => {
            form.style.display = "none";
        });
    </script>

</body>
</html>


