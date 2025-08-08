<?php

global $pdo;
require_once '../connection.php';

$stmt = $pdo->query('
    SELECT posts.*, COUNT(comments.id) AS comment_count
    FROM posts
    LEFT JOIN comments ON posts.id = comments.post_id
    GROUP BY posts.id
    ORDER BY posts.id DESC
');
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>