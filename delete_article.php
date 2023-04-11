<?php
include('../admin/connect.php');

$id = $_GET['article_id'];
$sql = $conn->prepare("DELETE FROM articles WHERE article_id = ?");
$sql->execute([$id]);
    header ('location: articles.php');

?>