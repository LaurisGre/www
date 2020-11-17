<?php

require '../bootloader.php';

$table = [
    'title' => 'USERS',
    'headers' => [
        'Username',
        'Password',
    ],
    'data' => file_to_array(DB_FILE),
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>USERS</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="users.php">Users</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>THIS IS THE USERS PAGE</h1>
        <?php require ROOT . '/core/templates/table.tpl.php'; ?>
    </main>
</body>

</html>