<?php

require '../bootloader.php';

$nav_array = nav();

$db_array = new FileDB(DB_FILE);
$db_array->load();
$brick_array = $db_array->getData()['wall'];

$user_id = $_COOKIE['user_id'] ?? uniqid();
$visits = ($_COOKIE['visits'] ?? 0) + 1;

setcookie('user_id', $user_id, time() + 3600, '/');
setcookie('visits', $visits, time() + 3600, '/');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/media/style.css">
    <title>Home</title>
</head>

<body>
    <h1>WELCOME TO THE GREAT POOP-WALL</h1>
    <header>
        <?php require ROOT . '/core/templates/nav.tpl.php'; ?>
    </header>
    <main>
        <section class="poop_box">
            <div class="POOP-WALL">
                <?php for ($i = 0; $i < 50 * 50; $i++) : ?>
                    <div class="border_brick"></div>
                <?php endfor; ?>
                <?php foreach ($brick_array as $brick) : ?>
                    <div>
                        <span <?php print pixel_attr($brick); ?>></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>

</html>