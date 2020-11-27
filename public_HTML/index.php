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
            <div class="poop_wall">
                <?php require ROOT . '/core/templates/wall.tpl.php'; ?>
                <?php foreach ($brick_array as $brick) : ?>
                    <div <?php print pixel_attr($brick); ?>>
                        <div class="brick_tooltip">
                            <?php print pixel_hint_text($brick); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>

</html>