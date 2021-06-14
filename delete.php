<?php
require ("db.php");
$pdo_statement = $pdo_conn->prepare("DELETE FROM posts WHERE id=".$_GET['id']);
$result = $pdo_statement->execute();
header('location:index.php');
?>