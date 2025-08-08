<?php
require_once '../connection.php';

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

$stmt = $pdo->prepare('SELECT * FROM posts WHERE id = ?');
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if ($post) {
    $stmt = $pdo->prepare('
        SELECT * FROM comments
        WHERE post_id = ?
        ORDER BY id DESC
        LIMIT 15
    ');
    $stmt->execute([$id]);
    $post['comments'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($post);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'no post found ']);
}
?>