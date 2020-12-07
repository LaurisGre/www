<?php

use App\App;
use App\Views\BasePage;
use App\Views\Forms\GraphForm;
use Core\View;

require '../../bootloader.php';

$form = new GraphForm();

// // Print Axes
// for ($x = 0; $x < 50; $x++) {
//     $brick_X = print_bricks($x * 10, 250, 'black');
//     $brick_Y = print_bricks(250, $x * 10, 'black');

//     App::$db->insertRow('wall', $brick_X);
//     App::$db->insertRow('wall', $brick_Y);
// }

// // Prints blocks calculated from the given equation
// for ($x = -250; $x < 240; $x += 1) {
// $calculated_x = $x / 100;

//     // y = x**2 
// $calculated_y = $calculated_x ** 2;

//     // y = 1/x 
//     if ($calculated_x !== 0) {
//         $calculated_y = 1 / $calculated_x;
//     }

//     // y = sin(x) 
//     $calculated_y = 1 * sin(deg2rad($calculated_x) * 200);

//     $abs_y = 250 - $calculated_y * 100;
//     $abs_x = abs(-250 - $x);
//     if ($abs_y >= 0 && $abs_y <= 490) {
//         App::$db->insertRow('wall', print_bricks($abs_x, $abs_y, 'lawngreen'));
//     }
// }

//Prints bricks with given coords and color
function print_bricks(float $x, float $y, string $color)
{
    return [
        'coord_x' => $x,
        'coord_y' => round($y, 2),
        'color' => $color,
        'poster' => 'grapher'
    ];
}

$content = new View([
    'title' => 'Graph',
    'products' => App::$db->getRowsWhere('wall'),
]);

$page = new BasePage([
    'title' => 'Graph',
    'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php'),
]);

print $page->render();
