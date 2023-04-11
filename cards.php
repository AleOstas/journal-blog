<?php
function commentsCount($conn)
{
    $sql = $conn->prepare('SELECT id FROM comments ORDER BY id');
    $sql->execute();
    $count = $sql->rowCount();
    echo $count;
}

function articlesCount($conn)
{
    $sql = $conn->prepare('SELECT article_id FROM articles ORDER BY article_id');
    $sql->execute();
    $count = $sql->rowCount();
    echo $count;
}

function usersCount($conn)
 {
    $sql = $conn->prepare('SELECT id FROM users ORDER BY id');
    $sql->execute(); 
    $count = $sql->rowCount();
    echo $count;
}

