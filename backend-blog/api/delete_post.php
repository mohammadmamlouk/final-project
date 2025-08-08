<?php

global $pdo;
require_once '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

$stmt = $pdo->prepare('DELETE FROM posts WHERE id = ?');
if ($stmt->execute([$id])) {
    echo json_encode(['success' => 'post deleted']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'failed to delete post']);
}
?>