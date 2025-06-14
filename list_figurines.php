<?php
require_once 'db.php';

$db = get_db();
$status = $_GET['status'] ?? null;

if ($status && in_array($status, ['trade','sell','buy'])) {
    $stmt = $db->prepare('SELECT * FROM figurines WHERE status = ? ORDER BY created_at DESC');
    $stmt->execute([$status]);
} else {
    $stmt = $db->query('SELECT * FROM figurines ORDER BY created_at DESC');
}

$figurines = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($figurines);
?>
