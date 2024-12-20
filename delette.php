<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'blogpress');

$deletedid = $_GET['deletedid'];

$deletedarticle = "DELETE FROM articles WHERE id_article = $deletedid";
$resultdelete = mysqli_query($connect, $deletedarticle);
header("Location: newarticle.php?id=" . $_SESSION['id']);
exit();
?>
