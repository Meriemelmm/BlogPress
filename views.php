<?php
// connect to database
$connect = mysqli_connect('localhost', 'root', '', 'blogpress');
if (!$connect) {
    echo 'Connection error: ' . mysqli_connect_error();
} else { 
   
}

// views   --------------------------------------------------------------------------------------------------
$readArticle = $_GET['readmoreid'];
$views = "UPDATE articles SET views = views + 1 WHERE id_article = '$readArticle'";
$viewsQuery = mysqli_query($connect, $views);

// Redirection correcte
header("Location: readmore.php?id=" . $readArticle);
exit();
?>