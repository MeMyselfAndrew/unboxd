<?php
require_once __DIR__ . '/db.php';
$db = getDbConnection();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $bio = trim($_POST['bio'] ?? '');

    if ($username !== '' && $email !== '') {
        $stmt = $db->prepare('INSERT INTO users (username, email, bio) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $bio]);
        $message = 'Profile saved.';
    } else {
        $message = 'Username and email are required.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Profile</title>
</head>
<body>
<h1>Add Profile</h1>
<?php if ($message): ?>
<p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>
<form method="post">
    <label>Username: <input type="text" name="username" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Bio:<br><textarea name="bio" rows="4" cols="40"></textarea></label><br>
    <button type="submit">Save</button>
</form>
<p><a href="profiles.php">View Profiles</a></p>
</body>
</html>
