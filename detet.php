<?php
session_start();
include'confg.php';
$removeid=$_GET['removedid'];
echo$removeid;

$deletedcommont = "DELETE FROM commontaires WHERE id_commontaire =$removeid ";
$resultdelete = mysqli_query($connect, $deletedcommont);
header("Location: newarticle.php?id=" . $_SESSION['id']);
exit();











?>