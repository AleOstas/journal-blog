<?php
include('../admin/connect.php');

$id = $_GET['id'];
$sql = $conn->prepare("DELETE FROM comments WHERE id = ?");
$sql->execute([$id]);
    header ('location: comments.php');

?>