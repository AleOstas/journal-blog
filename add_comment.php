<?php 
function setComments($conn) {
    if(isset($_POST['add_com'])) {

        $user = $_POST['user'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO comments(user, comment, date) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user, $comment, $date]);

    }
}
