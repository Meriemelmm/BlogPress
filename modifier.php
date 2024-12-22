<?php
$connect = mysqli_connect('localhost', 'root', '', 'blogpress');

session_start();

$editedArticle = $_GET['editedid'];

$editedQuery = "SELECT *  FROM articles where id_article = $editedArticle";
$EditResult = mysqli_query($connect, $editedQuery);

$editfetch = mysqli_fetch_assoc($EditResult);


if (isset($_POST['Update'])) {
    $E_title = $_POST['title'];
    $E_content = $_POST['content'];
    $updateQuery = "UPDATE articles SET titre ='$E_title' , contenu = '$E_content'where id_article = $editedArticle";
    $updated = mysqli_query($connect, $updateQuery);
    header("Location: newarticle.php?id=" . $_SESSION['id']);
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Article</title>
    <style>
        /* Add some basic styling for the form */
        .form-container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        .form-container input,
        .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-container textarea {
            height: 200px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #121125;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #121125;
        }

        .form-container .back-link {
            text-align: center;
            margin-top: 10px;
        }

        .form-container .back-link a {
            color: #121125;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Modify Article</h2>

        <!-- Article Modify Form -->
        <form method="POST"  action="modifier.php?editedid=<?php echo $editedArticle?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($editfetch['titre']); ?>" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required><?php echo htmlspecialchars($editfetch['contenu']); ?></textarea>

            <button type="submit" name="Update">Update Article</button>
        </form>

        <div class="back-link">
            <a href="newarticle.php?id=<?php echo $_SESSION['id']; ?>">Back to Article</a>
        </div>
    </div>

</body>

</html>