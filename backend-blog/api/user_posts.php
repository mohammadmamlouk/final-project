<?php

global $pdo;

require_once '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$user_id = $data['user_id'];

$stmt = $pdo->prepare('
    SELECT * FROM posts
    WHERE user_id = ?
    ORDER BY id DESC
    LIMIT 10
');
$stmt->execute([$user_id]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>