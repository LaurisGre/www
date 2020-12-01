<?php

use App\App;

require '../bootloader.php';

$nav_array = nav();

$brick_array = App::$db->getRowsWhere('wall');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/media/style.css">
    <title>My bricks</title>
</head>

<body>
    <h1>THESE ARE MY BRICKS OF THE WALL</h1>
    <header>
        <?php require ROOT . '/core/templates/nav.tpl.php'; ?>
    </header>
    <main>
        <section class="poop_box">
            <div class="poop_wall">
                <?php require ROOT . '/core/templates/wall.tpl.php'; ?>
                <?php foreach ($brick_array as $brick) : ?>
                    <?php if ($brick['poster'] === $_SESSION['email']) : ?>
                        <div>
                            <span <?php print pixel_attr($brick); ?>>
                                <span class="brick_tooltip">
                                    <?php print pixel_hint_text($brick); ?>
                                </span>
                            </span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
</body>

</html>