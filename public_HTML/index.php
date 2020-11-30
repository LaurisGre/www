<?php

require '../bootloader.php';
use App\App;

$nav_array = nav();

$brick_array = App::$db->getRowsWhere('wall');

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
                <?php foreach ($brick_array ?? [] as $brick) : ?>
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