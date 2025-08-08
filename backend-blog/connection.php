<?php
$pdo = new PDO('mysql:host=127.0.0.1;port=3307;dbname=blog', 'blogAdmin', 'blogAdmin123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>