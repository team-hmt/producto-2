<!DOCTYPE html>
<html lang="en">
<head>
    <title>User List</title>
</head>
<body>
    <h1>List of Users</h1>

    <?php foreach($users as $user) : ?>
        <div>
            <h2><?php echo htmlspecialchars($user['name']); ?></h2>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>