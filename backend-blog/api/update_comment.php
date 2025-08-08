<?php

global $pdo;

require_once '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$content = $data['content'];

$stmt = $pdo->prepare('UPDATE comments SET content = ? WHERE id = ?');
if ($stmt->execute([$content, $id])) {
    echo json_encode(['content' => $content]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to update comment']);
}
?>