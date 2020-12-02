<?php

use App\App;

require '../../bootloader.php';

$nav_array = nav();

$axis_lines = [];

// Print Axis
// for ($x = 0; $x < 50; $x++) {
//     $brick_X = [
//         'coord_x' => "{$x}0",
//         'coord_y' => 250,
//         'color' => 'black',
//         'poster' => 'axis'
//     ];

//     $brick_Y = [
//         'coord_x' => 250,
//         'coord_y' => "{$x}0",
//         'color' => 'black',
//         'poster' => 'axis'
//     ];

//     App::$db->insertRow('wall', $brick_X);
//     App::$db->insertRow('wall', $brick_Y);
// }

// y = x**2 
//print blocks according to the given equation

// for ($x = -250; $x < 240; $x += 1) {

//     $calculated_x = $x / 100;
//     $calculated_y = $calculated_x ** 2;

//     $abs_y = 250 - $calculated_y * 100;
//     $abs_x = abs(-250 - $x);
//     if ($abs_y >= 0 && $abs_y <= 490) {
//         $brick = [
//             'coord_x' => $abs_x,
//             'coord_y' => $abs_y,
//             'color' => 'gold',
//             'poster' => 'grapher'
//         ];
//         App::$db->insertRow('wall', $brick);
//     }
// }

// y = 1/x 
// print blocks according to the given equation
// for ($x = -250; $x < 250; $x += 1) {

//     $calculated_x = $x / 100;
//     if ($calculated_x !== 0) {
//         $calculated_y = 1 / $calculated_x;
//     }

//     $abs_y = 250 - $calculated_y * 100;
//     $abs_x = abs(-250 - $x);
//     if ($abs_y >= 0 && $abs_y <= 490) {
//         $brick = [
//             'coord_x' => $abs_x,
//             'coord_y' => round($abs_y, 2),
//             'color' => 'red',
//             'poster' => 'grapher'
//         ];
//         App::$db->insertRow('wall', $brick);
//     }
// }

// y = sin(x) 
//print blocks according to the given equation
// for ($x = -250; $x < 240; $x += 1) {

//     $calculated_x = $x / 100;

//     $calculated_y = 1.5 * sin(deg2rad($calculated_x) * 200);

//     $abs_y = 250 - $calculated_y * 100;
//     $abs_x = abs(-250 - $x);
//     if ($abs_y >= 0 && $abs_y <= 490) {
//         $brick = [
//             'coord_x' => $abs_x,
//             'coord_y' => round($abs_y, 2),
//             'color' => 'lawngreen',
//             'poster' => 'grapher'
//         ];
//         App::$db->insertRow('wall', $brick);
//     }
// }

// $brick_array = App::$db->getRowsWhere('wall');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../media/style.css">
    <title>Grapher</title>
</head>

<body>
    <h1>WELCOME TO THE GREAT POOP-GRAPHER</h1>
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