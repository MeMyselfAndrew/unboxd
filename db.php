<?php
function get_db(){
    $db = new PDO('sqlite:' . __DIR__ . '/figurines.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("CREATE TABLE IF NOT EXISTS figurines (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        description TEXT,
        status TEXT CHECK(status IN ('trade','sell','buy')) NOT NULL,
        price REAL,
        user TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");
    return $db;
}
?>
