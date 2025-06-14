<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $status = $_POST['status'] ?? 'trade';
    $price = floatval($_POST['price'] ?? 0);
    $user = trim($_POST['user'] ?? 'anonymous');

    if ($name === '') {
        http_response_code(400);
        echo "Name is required";
        exit;
    }

    if (!in_array($status, ['trade','sell','buy'])) {
        http_response_code(400);
        echo "Invalid status";
        exit;
    }

    $db = get_db();
    $stmt = $db->prepare('INSERT INTO figurines (name, description, status, price, user) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$name, $description, $status, $price, $user]);
    echo "Figurine added";
} else {
    echo "Use POST";
}
?>
