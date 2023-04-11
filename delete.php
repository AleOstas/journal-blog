<?php
include('../admin/connect.php');

$id = $_GET['id'];
$sql = $conn->prepare("DELETE FROM users WHERE id = ?");
$sql->execute([$id]);
    header ('location: users.php');

?>

