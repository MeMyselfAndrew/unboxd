<?php
function getDbConnection(): PDO {
    $db = new PDO('sqlite:' . __DIR__ . '/profiles.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        email TEXT NOT NULL,
        bio TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    return $db;
}
?>
