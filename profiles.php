<?php
require_once __DIR__ . '/db.php';
$db = getDbConnection();
$stmt = $db->query('SELECT username, email, bio, created_at FROM users ORDER BY created_at DESC');
$profiles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profiles</title>
</head>
<body>
<h1>User Profiles</h1>
<p><a href="add_profile.php">Add New Profile</a></p>
<table border="1" cellpadding="5">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Bio</th>
        <th>Created</th>
    </tr>
<?php foreach ($profiles as $p): ?>
    <tr>
        <td><?php echo htmlspecialchars($p['username']); ?></td>
        <td><?php echo htmlspecialchars($p['email']); ?></td>
        <td><?php echo nl2br(htmlspecialchars($p['bio'])); ?></td>
        <td><?php echo htmlspecialchars($p['created_at']); ?></td>
    </tr>
<?php endforeach; ?>
</table>
</body>
</html>
